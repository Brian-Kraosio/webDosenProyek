<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class kontrak_kuliah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','download');
        $this->load->helper('form');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Import_model', 'import');
        $this->load->model('Export_model', 'export');
        if($this->session->userdata('level')!="user"){
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $data['title']='Data Kontrak Kuliah';
        $data['kontrak']=$this->user_model->getDataKontrakKuliahDosen();
        $this->load->view('template/header_user',$data);
        $this->load->view('user/kontrak_kuliah',$data);
        $this->load->view('template/footer');
    }

    public function tambahKontrak($primary)
        {   
            $data = array();
        $data['mata_kuliah'] = $this->user_model->getDataMataKuliah();
        $data['kontrak']=$this->user_model->getPrimaryDataKontrak($primary);
            $data['title']='Upload File';
            $this->form_validation->set_rules('id_matkul','Kode Mata Kuliah','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header_user', $data);
                $this->load->view('user/tambah_kontrak_kuliah', $data);
                $this->load->view('template/footer');
            }
            else{
                $upload = $this->user_model->uploadKontrak();
                if ($upload['result'] == "success") {
                    $this->user_model->tambahKontrak($upload);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('user/kontrak_kuliah', 'refresh');
            }
        }
        }

        public function editKontrak($primary)
        {   
            $data['title']='Upload File';
            $data['kontrak']=$this->user_model->getPrimaryDataKontrak($primary);
            $this->form_validation->set_rules('id_matkul','Kode Mata Kuliah','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header_user', $data);
                $this->load->view('user/edit_kontrak_kuliah', $data);
                $this->load->view('template/footer');
            }
            else{
                $upload = $this->user_model->uploadKontrak();
                if ($upload['result'] == "success") {
                    $this->user_model->editKontrak($upload);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('user/kontrak_kuliah', 'refresh');
                
            }
            }
        }
  
      public function downloadKontrak($filename)
    {
        force_download('assets/uploads/kontrak/' . urldecode($filename), NULL);
    }
}

/* End of file jabatan.php */
