<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class status extends CI_Controller {

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
        $data['title']='Data Status';
        $data['status']=$this->admin_model->getDataStatus();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/status',$data);
        $this->load->view('template/footer');
        ;
    }

    public function tambahStatus()
        {   
            $data['title']='Adding Dosen Data';
            $this->form_validation->set_rules('status','Status Name','required');
            $this->form_validation->set_rules('kode_status', 'Status Kode','required');
            $this->form_validation->set_rules('id_status', 'ID Status','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_status', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahStatus();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/status','refresh');
                
            }
        }

        public function deleteStatus($id_status)
        {
            $this->admin_model->deleteDataStatus($id_status);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/status','refresh');
        }

        public function editStatus($primary)
        {   
            $data['title']='Edit Dosen Data';
        $data['status']=$this->admin_model->getPrimaryDataStatus($primary);
            $this->form_validation->set_rules('status','Status Name','required');
            $this->form_validation->set_rules('kode_status', 'Status Kode','required');
            $this->form_validation->set_rules('id_status', 'ID Status','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_status', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editStatus();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/status','refresh');
                
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
                            $inserdata[$i]['status'] = $value['A'];
                            $inserdata[$i]['kode_status'] = $value['B'];
                            $inserdata[$i]['id_status'] = $value['C'];
                            $i++;
                          }               
                          $result = $this->import->importDataStatus($inserdata);   
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
                    redirect('admin/status','refresh');
          }
            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Status Data.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportStatus();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Status');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kode Status');   
          $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'ID Status');   
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->status);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->kode_status);
              $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->id_status);
              $rowCount++;
          }
          $filename = "Data Status.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadStatus()
      {
        force_download('assets/download/dataStatusTemplate.csv',NULL);
      }
}

/* End of file status.php */


?>