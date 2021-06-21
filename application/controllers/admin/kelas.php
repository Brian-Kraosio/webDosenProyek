<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class kelas extends CI_Controller {

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
        $data['title']='Data Kelas';
        $data['kelas']=$this->admin_model->getDataKelas();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/kelas',$data);
        $this->load->view('template/footer');
        ;
    }

    public function tambahKelas()
        {   
            $data['title']='Adding Class Data';
            $this->form_validation->set_rules('nama_kelas','Nama Kelas','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_kelas', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahKelas();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/kelas','refresh');
                
            }
        }

        public function deleteKelas($id_kelas)
        {
            $this->admin_model->deleteDataKelas($id_kelas);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/kelas','refresh');
        }

        public function editKelas($primary)
        {   
            $data['title']='Edit Class Data';
        $data['kelas']=$this->admin_model->getPrimaryDataKelas($primary);
            $this->form_validation->set_rules('nama_kelas','Nama Kelas','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_kelas', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editKelas();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/kelas','refresh');
                
            }
        }

        public function importFile(){
  
            if ($this->input->post('submit')) {
                       
                      $path = 'assets/uploads/';
                      require_once APPPATH . "/third_party/PHPExcel.php";
                      $config['upload_path'] = $path;
                      $config['allowed_types'] = 'xlsx|xls|csv';
                      $config['remove_spaces'] = TRUE;
                      $this->load->library('upload', $config);
                      $this->upload->initialize($config);            
                      if (!$this->upload->do_upload('uploadFile')) {
                          $error = array('error' => $this->upload->display_errors());
                      } else {
                          $data = array('upload_data' => $this->upload->data());
                      }
                      if(empty($error)){
                        if (!empty($data['upload_data']['file_name'])) {
                          $import_xls_file = $data['upload_data']['file_name'];
                      } else {
                          $import_xls_file = 0;
                      }
                      $inputFileName = $path . $import_xls_file;
                       
                      try {
                          $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                          $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                          $objPHPExcel = $objReader->load($inputFileName);
                          $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                          $flag = true;
                          $i=0;
                          foreach ($allDataInSheet as $value) {
                            if($flag){
                              $flag =false;
                              continue;
                            }
                            $inserdata[$i]['id_kelas'] = $value['A'];
                            $inserdata[$i]['nama_kelas'] = $value['B'];
                            $i++;
                          }               
                          $result = $this->import->importDataKelas($inserdata);   
                          if($result){
                            echo "Imported successfully";
                          }else{
                            echo "ERROR !";
                          }             
                          
                        } catch (Exception $e) {
                          die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                          . '": ' .$e->getMessage());
                        }
                      }else{
                        echo $error['error'];
                      }                 
                    }
                    unlink($inputFileName);
                    $this->session->set_flashdata('flash-data','Added');
                    redirect('admin/kelas','refresh');
          }
            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Kelas Data.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportKelas();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID Kelas');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nama Kelas');   
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_kelas);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->nama_kelas);
              $rowCount++;
          }
          $filename = "Data Kelas.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadKelas()
      {
        force_download('assets/download/dataKelasTemplate.csv',NULL);
      }
}

/* End of file kelas.php */


?>