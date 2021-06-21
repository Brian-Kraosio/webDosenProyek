<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class research_group extends CI_Controller {

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
        $data['title']='Data Research Group';
        $data['research_group']=$this->admin_model->getDataResearchGroup();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/research_group',$data);
        $this->load->view('template/footer');
    }

    public function dosenResearch()
    {
        $data['title']='Data Research Group';
        $data['research_group']=$this->admin_model->getDataDosenResearch();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/dosen_research',$data);
        $this->load->view('template/footer');
    }

    public function tambahResearchGroup()
        {   
            $data['title']='Adding Research Group Data';
            $data['research']=$this->admin_model->getDataResearch();
            $data['dosen']=$this->admin_model->getDataDosen();
            $this->form_validation->set_rules('Kode','KODE','required');
            $this->form_validation->set_rules('id_research', 'Research','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_research_group', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahResearchGroup();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/research_group','refresh');
                
            }
        }

        public function deleteResearchGroup($id_research_group)
        {
            $this->admin_model->deleteDataResearchGroup($id_research_group);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/research_group','refresh');
        }

        public function editResearchGroup($primary)
        {   
            $data['title']='Edit Research Group Data';
        $data['research_group']=$this->admin_model->getPrimaryDataResearchGroup($primary);
            $data['research']=$this->admin_model->getDataResearch();
            $this->form_validation->set_rules('Kode','KODE','required');
            $this->form_validation->set_rules('id_research', 'Research','required');
            $this->form_validation->set_rules('year', 'Year','required');
            $this->form_validation->set_rules('semester', 'Semester','required');
            $this->form_validation->set_rules('priority', 'Priority','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_research_group', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editResearchGroup();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/research_group','refresh');
                
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
                            $inserdata[$i]['id_research_group'] = $value['A'];
                            $inserdata[$i]['Kode'] = $value['B'];
                            $inserdata[$i]['id_research'] = $value['C'];
                            $inserdata[$i]['year'] = $value['D'];
                            $inserdata[$i]['semester'] = $value['E'];
                            $inserdata[$i]['priority'] = $value['F'];
                            $i++;
                          }               
                          $result = $this->import->importDataResearchGroup($inserdata);   
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
                    redirect('admin/research_group','refresh');
          }
            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Data Research Group.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportResearchGroup();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID Research Group');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kode');
          $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'ID Research');
          $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Year');
          $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Semester');       
          $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Priority');       
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_research_group);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Kode);
              $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->id_research);
              $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->year);
              $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->semester);
              $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->priority);
              $rowCount++;
          }
          $filename = "Data Research Group.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadResearchGroup()
      {
        force_download('assets/download/dataResearchGroupTemplate.csv',NULL);
      }
}

/* End of file jabatan.php */


?>