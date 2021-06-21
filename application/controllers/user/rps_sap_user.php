<?php


defined('BASEPATH') or exit('No direct script access allowed');

class rps_sap_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'download');
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
        $data = array(
            'title' =>'Data RPS & SAP ',
            'rpssap' => $this->user_model->getDataRPSSAPDosen(),
        );

        $this->load->view('template/header_user', $data);
        $this->load->view('user/rps_sap_user', $data);
        $this->load->view('template/footer');
    }



    public function editRPS($primary)
    {
        $data = array();
        $data['title'] = 'Upload File';
        $data['rpssap'] = $this->user_model->getPrimaryDataRPS($primary);
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header_user', $data);
            $this->load->view('user/edit_rps', $data);
            $this->load->view('template/footer');
        } else {
                $RPS = $this->user_model->updateRPS();
                $SAP = $this->user_model->updateSAP();
                if ($RPS['result'] == "success"|| $SAP['result'] == "success") {
                    $this->user_model->editRPS($RPS, $SAP);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('user/rps_sap_user', 'refresh');
                }else{
                    $this->user_model->editRPS($RPS, $SAP);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('user/rps_sap_user', 'refresh');
                }
        }
    }
    
    public function editSAP($primary)
    {
        $data = array();
        $data['title'] = 'Upload File';
        $data['rpssap'] = $this->user_model->getPrimaryDataRPS($primary);
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header_user', $data);
            $this->load->view('user/edit_sap', $data);
            $this->load->view('template/footer');
        } else {
                $RPS = $this->user_model->updateRPS();
                $SAP = $this->user_model->updateSAP();
                if ($RPS['result'] == "success"|| $SAP['result'] == "success") {
                    $this->user_model->editRPS($RPS, $SAP);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('user/rps_sap_user', 'refresh');
                }else{
                    $this->user_model->editRPS($RPS, $SAP);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('user/rps_sap_user', 'refresh');
                }
        }
    }

    public function tambahRPS($primary)
    {
        $data = array();
        $data['rpssap'] = $this->user_model->getPrimaryDataRPS($primary);
        $data['title'] = 'Upload Files';
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('user/tambah_rps', $data);
            $this->load->view('template/footer');
        } else {
            $RPS = $this->user_model->uploadRPS();
            $SAP = $this->user_model->uploadSAP();
            if ($RPS['result'] == "success" || $SAP['result'] == "success") {
                    $this->user_model->tambahRPS($RPS,$SAP);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('user/rps_sap_user', 'refresh');
                }else{
                    $this->user_model->tambahRPS($RPS,$SAP);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('user/rps_sap_user', 'refresh');
                }
        }
    }
    public function tambahSAP($primary)
    {
        $data = array();
        $data['rpssap'] = $this->user_model->getPrimaryDataRPS($primary);
        $data['title'] = 'Upload Files';
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('user/tambah_sap', $data);
            $this->load->view('template/footer');
        } else {
            $RPS = $this->user_model->uploadRPS();
            $SAP = $this->user_model->uploadSAP();
            if ($RPS['result'] == "success" || $SAP['result'] == "success") {
                    $this->user_model->tambahRPS($RPS,$SAP);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('user/rps_sap_user', 'refresh');
                }else{
                    $this->user_model->tambahRPS($RPS,$SAP);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('user/rps_sap_user', 'refresh');
                }
        }
    }

    
    
    public function downloadRPS($filename)
    {
        force_download('assets/uploads/RPS/' . urldecode($filename), NULL);
    }
    public function downloadSAP($filename)
    {
        force_download('assets/uploads/SAP/' . urldecode($filename), NULL);
    }
}

/* End of file status.php */
