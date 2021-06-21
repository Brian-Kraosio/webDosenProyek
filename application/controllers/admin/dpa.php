<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class dpa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','download');
        $this->load->helper('form');
        $this->load->helper('file');
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
        $data['title']='Data DPA Dosen';
        $data['dpa']=$this->admin_model->getDataDPA();
        $data['export_dpa'] = $this->export->exportDpa();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/dpa',$data);
        $this->load->view('template/footer');
    }

    public function dosenDpa()
    {
        $data['title']='Data DPA Dosen';
        $data['dpa']=$this->admin_model->getDataDosenDpa();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/dosen_dpa',$data);
        $this->load->view('template/footer');
    }

    public function tambahDpa()
        {   
            $data['title']='Adding Homeroom Data';
            $this->form_validation->set_rules('KODE','KODE','required');
            $this->form_validation->set_rules('kelas_dpa','Class','required');
            $this->form_validation->set_rules('dpa_tahun','Homeroom Year','required');
            $this->form_validation->set_rules('semester','Homeroom Semester','required');
            $data['kelas']=$this->admin_model->getDataKelas();
            $data['dosen']=$this->admin_model->getDataDosen();
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_dpa', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahDpa();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/dpa','refresh');
                
            }
        }

        public function deleteDpa($id_DPA)
        {
            $this->admin_model->deleteDataDpa($id_DPA);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/dpa','refresh');
        }

        public function editDpa($id)
        {   
            $data['title']='Edit Homeroom Data';
            $this->form_validation->set_rules('KODE','KODE','required');
            $this->form_validation->set_rules('kelas_dpa','Class','required');
            $this->form_validation->set_rules('dpa_tahun','Homeroom Year','required');
            $this->form_validation->set_rules('semester','Homeroom Semester','required');
            $data['dpa']=$this->admin_model->getPrimaryDataDpa($id);
            $data['kelas']=$this->admin_model->getDataKelas();
            $data['dosen']=$this->admin_model->getDataDosen();
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_dpa', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editDpa();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/dpa','refresh');
                
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
                          $inserdata[$i]['id_DPA'] = $value['A'];
                          $inserdata[$i]['KODE'] = $value['B'];
                          $inserdata[$i]['kelas_dpa'] = $value['C'];
                          $inserdata[$i]['dpa_tahun'] = $value['D'];
                          $inserdata[$i]['semester'] = $value['E'];
                          $i++;
                        }               
                        $result = $this->import->importDataDpa($inserdata);   
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
                  redirect('admin/dpa','refresh');
        }
          // create xlsx
      public function generateXls() {
        // create file name
        $fileName = 'Dpa Data.xlsx';  
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->export->exportDpa();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID DPA');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kode');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Kelas Dpa');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DPA Tahun');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Semester');       
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_DPA);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->KODE);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->kelas_dpa);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dpa_tahun);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->semester);
            $rowCount++;
        }
        $filename = "Data DPA.xlsx";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
        $objWriter->save('php://output'); 
        
    }

    public function downloadDpa()
    {
      force_download('assets/download/dataDpaTemplate.csv',NULL);
    }
      }
/* End of file dpa.php */
