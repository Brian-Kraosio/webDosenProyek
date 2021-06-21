<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class kontrak_kuliah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','download');
        $this->load->helper('form');
        $this->load->model('admin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Import_model', 'import');
        $this->load->model('Export_model', 'export');
        if($this->session->userdata('level')!="admin"){
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $data['title']='Data Kontrak Kuliah';
        $data['kontrak']=$this->admin_model->getDataKontrakKuliah();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/kontrak_kuliah',$data);
        $this->load->view('template/footer');
    }

    public function kontrak_kuliah_matkul()
    {
        $data['title']='Data Kontrak Kuliah';
        $data['kontrak']=$this->admin_model->getDataKontrakKuliahMatkul();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/kontrak_kuliah_matkul',$data);
        $this->load->view('template/footer');
    }

    public function tambahKontrak()
        {   
            $data = array();
            $data['mata_kuliah'] = $this->admin_model->getDataMataKuliah();
            $data['title']='Adding Kontrak Kuliah Data';
            $this->form_validation->set_rules('id_matkul','Kode Mata Kuliah','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_kontrak_kuliah', $data);
                $this->load->view('template/footer');
            }
            else{
                $upload = $this->admin_model->uploadKontrak();
                if ($upload['result'] == "success") {
                    $this->admin_model->tambahKontrak($upload);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('admin/kontrak_kuliah', 'refresh');
            }
        }
        }

        public function deleteKontrak($id_kontrak)
        {
            $this->admin_model->deleteDataKontrak($id_kontrak);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/kontrak_kuliah','refresh');
        }

        public function editKontrak($primary)
        {   
            $data['title']='edit Kontrak Data';
            $data['kontrak']=$this->admin_model->getPrimaryDataKontrak($primary);
            $this->form_validation->set_rules('id_matkul','Kode Mata Kuliah','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_kontrak_kuliah', $data);
                $this->load->view('template/footer');
            }
            else{
                $upload = $this->admin_model->uploadKontrak();
                if ($upload['result'] == "success") {
                    $this->admin_model->editKontrak($upload);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('admin/Kontrak', 'refresh');
                
            }
            }
        }

            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Kontrak Kuliah Data.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportKontrak();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID Kontrak');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kode Mata Kuliah');   
          $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Nama File');   
          $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'uploader');   
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_kontrak);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->id_matkul);
              $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->file);
              $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->uploader);
              $rowCount++;
          }
          $filename = "Data Kontrak Kuliah.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadKontrak($filename)
    {
        force_download('assets/uploads/kontrak/' . urldecode($filename), NULL);
    }
    public function downloadKontrakKuliah()
      {
        force_download('assets/download/dataKontrakKuliahTemplate.csv',NULL);
      }
}

/* End of file jabatan.php */
