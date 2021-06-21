<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class mengajar extends CI_Controller {

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
        $data['title']='Data Tipe Mengajar';
        $data['mengajar']=$this->admin_model->getDataMengajar();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/mengajar',$data);
        $this->load->view('template/footer');
        ;
    }

    public function tambahMengajar()
        {   
            $data['title']='Adding Mengajar Data';
            $this->form_validation->set_rules('id_mengajar','ID Mengajar','required');
            $this->form_validation->set_rules('tipe_pelajaran', 'Tipe Pelajaran','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_mengajar', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahMengajar();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/mengajar','refresh');
                
            }
        }

        public function deleteMengajar($id_mengajar)
        {
            $this->admin_model->deleteDataMengajar($id_mengajar);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/mengajar','refresh');
        }

        public function editMengajar($primary)
        {   
            $data['title']='Edit Mengajar Data';
        $data['mengajar']=$this->admin_model->getPrimaryDataMengajar($primary);
            $this->form_validation->set_rules('id_mengajar','ID Mengajar','required');
            $this->form_validation->set_rules('tipe_pelajaran', 'Tipe Pelajaran','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_mengajar', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editMengajar();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/mengajar','refresh');
                
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
                            $inserdata[$i]['id_mengajar'] = $value['A'];
                            $inserdata[$i]['tipe_pelajaran'] = $value['B'];
                            $i++;
                          }               
                          $result = $this->import->importDataMengajar($inserdata);   
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
                    redirect('admin/mengajar','refresh');
          }
            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Mengajar Data.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportMengajar();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID Mengajar');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tipe Pelajaran');   
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_mengajar);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->tipe_pelajaran);
              $rowCount++;
          }
          $filename = "Data Mengajar.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadMengajar()
      {
        force_download('assets/download/dataMengajarTemplate.csv',NULL);
      }

}

/* End of file mengajar.php */


?>