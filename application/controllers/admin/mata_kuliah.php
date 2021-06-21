<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class mata_kuliah extends CI_Controller {

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
        $data['title']='Data Mata Kuliah';
        $data['mata_kuliah']=$this->admin_model->getDataMataKuliah();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/mata_kuliah',$data);
        $this->load->view('template/footer');
        ;
    }

    public function tambahMataKuliah()
        {   
            $data['title']='Adding Course Data';
            $this->form_validation->set_rules('kode_mk','Course Code','required');
            $this->form_validation->set_rules('nama_mata_kuliah', 'Nama Mata Kuliah','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_mata_kuliah', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahMataKuliah();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/mata_kuliah','refresh');
            }
        }

        public function deleteMataKuliah($kode_mk)
        {
            $this->admin_model->deleteDataMataKuliah($kode_mk);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/mata_kuliah','refresh');
        }

        public function editMataKuliah($primary)
        {   
            $data['title']='Edit Course Data';
        $data['mata_kuliah']=$this->admin_model->getPrimaryDataMataKuliah($primary);
            $this->form_validation->set_rules('nama_mata_kuliah', 'Nama Mata Kuliah','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_mata_kuliah', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editMataKuliah();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/mata_kuliah','refresh');
                
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
                            $inserdata[$i]['kode_mk'] = $value['A'];
                            $inserdata[$i]['nama_mata_kuliah'] = $value['B'];
                            $inserdata[$i]['sks_mata_kuliah'] = $value['C'];
                            $inserdata[$i]['Jam_mata_kuliah'] = $value['D'];
                            $inserdata[$i]['tipe_mata_kuliah'] = $value['E'];
                            $i++;
                          }               
                          $result = $this->import->importDataMataKuliah($inserdata);   
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
                    redirect('admin/mata_kuliah','refresh');
          }
            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Data Mata Kuliah.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportMataKuliah();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Kode Mata Kuliah');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nama Mata Kuliah');
          $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'SKS Mata kuliah');
          $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Jam Mata Kuliah');
          $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Tipe Mata Kuliah');            
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->kode_mk);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->nama_mata_kuliah);
              $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->sks_mata_kuliah);
              $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->Jam_mata_kuliah);
              $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->tipe_mata_kuliah);
              $rowCount++;
          }
          $filename = "Data Mata Kuliah.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadMataKuliah()
      {
        force_download('assets/download/dataMataKuliahTemplate.csv',NULL);
      }

      public function downloadRPS($kode_mk)
      {
        $data['rps'] = $this->admin_model->getKodeMK($kode_mk);
        if(!empty($kode_mk)){
          
          $file = 'assets/uploads/RPS/'.$data['file_name'];
          force_download($file, NULL);
      }
      }

      public function downloadSAP($kode_mk)
      {
        $data['rps'] = $this->admin_model->getKodeMK($kode_mk);
        if(!empty($kode_mk)){
          
          $file = 'assets/uploads/SAP/'.$data['file_name'];
          force_download($file, NULL);
      }
      }


}

/* End of file mata_kuliah.php */


?>