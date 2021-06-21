<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_per_kelas extends CI_Controller {

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
        $data['title']='Data Jadwal Per Kelas';
        $data['jadwal_per_kelas']=$this->admin_model->getDataJadwalPerKelas();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/jadwal_per_kelas',$data);
        $this->load->view('template/footer');
    }

    public function jadwalKelas()
    {
        $data['title']='Data Jadwal Per Kelas';
        $data['jadwal_per_kelas']=$this->admin_model->getDataJadwalKelas();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/jadwal_kelas',$data);
        $this->load->view('template/footer');
    }

    public function jadwalDistribusi()
    {
        $data['title']='Data Jadwal Distribusi';
        $data['jadwal_per_kelas']=$this->admin_model->getDataJadwalKelasDistribusi();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/jadwal_kelas_distribusi',$data);
        $this->load->view('template/footer');
    }

    public function tambahJadwalPerKelas()
        {   
            $data['title']='Adding Jadwal Per Kelas Data';
            $data['dosen']= $this->admin_model->getDataDosen();
            $data['kelas']= $this->admin_model->getDataKelas();
            $data['matkul']= $this->admin_model->getDataMataKuliah();
            $this->form_validation->set_rules('kode','kode','required');
            $this->form_validation->set_rules('id_kelas', 'Class','required');
            $this->form_validation->set_rules('id_kelas', 'Course','required');
            $this->form_validation->set_rules('tahun_jadwal', 'Schedule Year','required');
            $this->form_validation->set_rules('semester_jadwal', 'Schedule Semester','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_jadwal_per_kelas', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahJadwalPerKelas();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/jadwal_per_kelas','refresh');
                
            }
        }

        public function deleteJadwalPerKelas($id_jadwal_per_kelas)
        {
            $this->admin_model->deleteDataDosen($id_jadwal_per_kelas);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/jadwal_per_kelas','refresh');
        }

        public function editJadwalPerKelas($primary)
        {   
            $data['title']='Edit Jadwal Per Kelas Data';
        $data['jadwal_per_kelas']=$this->admin_model->getPrimaryDataJadwalPerKelas($primary);
            $data['dosen']= $this->admin_model->getDataDosen();
            $data['kelas']= $this->admin_model->getDataKelas();
            $data['matkul']= $this->admin_model->getDataMataKuliah();
            $this->form_validation->set_rules('KODE','KODE','required');
            $this->form_validation->set_rules('id_kelas', 'Class','required');
            $this->form_validation->set_rules('id_kelas', 'Course','required');
            $this->form_validation->set_rules('tahun_jadwal', 'Schedule Year','required');
            $this->form_validation->set_rules('Semester Jadwal', 'Schedule Semester','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_jadwal_per_kelas', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editJadwalPerKelas();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/jadwal_per_kelas','refresh');
                
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
                            $inserdata[$i]['id_jadwal_per_kelas'] = $value['A'];
                            $inserdata[$i]['kode'] = $value['B'];
                            $inserdata[$i]['id_kelas'] = $value['C'];
                            $inserdata[$i]['id_matkul'] = $value['D'];
                            $inserdata[$i]['tahun_jadwal'] = $value['E'];
                            $inserdata[$i]['semester_jadwal'] = $value['F'];
                            $i++;
                          }               
                          $result = $this->import->importDataJadwalPerKelas($inserdata);   
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
          $fileName = 'Data Jadwal Perkelas.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportJadwalPerKelas();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Id Jadwal Perkelas');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kode Dosen');
          $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Id Kelas');
          $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ID Matkul');
          $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'tahun Jadwal');            
          $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Semester Jadwal');            
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_jadwal_per_kelas);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->kode);
              $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->id_kelas);
              $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->id_matkul);
              $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->tahun_jadwal);
              $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->semester_jadwal);
              $rowCount++;
          }
          $filename = "Data Jadwal Perkelas.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadJadwalPerKelas()
      {
        force_download('assets/download/dataJadwalPerKelasTemplate.csv',NULL);
      }
}

/* End of file jadwal_per_kelas.php */


?>