<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class dosen_menjabat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
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
        $data['title']='Data Dosen Menjabat';
        $data['dosen_menjabat']=$this->admin_model->getDataDosenMenjabat();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/dosen_menjabat',$data);
        $this->load->view('template/footer');
    }

    public function jabatanDosen()
    {
        $data['title']='Data Dosen Menjabat';
        $data['dosen_menjabat']=$this->admin_model->getDataJabatanDosen();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/jabatan_dosen',$data);
        $this->load->view('template/footer');
    }

    public function tambah_menjabat()
        {   
            $data['title']='Adding Lecturer Position';
            $data['jabatan']=$this->admin_model->getDataJabatan();
            $data['dosen']=$this->admin_model->getDataDosen();
            $this->form_validation->set_rules('Kode','KODE','required');
            $this->form_validation->set_rules('id_jabatan','ID Jabatan','required');
            $this->form_validation->set_rules('tahun_menjabat','Position Year','required');
            $this->form_validation->set_rules('semester_menjabat','Position Semester','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_menjabat', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahDosenMenjabat();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/dosen_menjabat','refresh');
                
            }
        }

        public function deleteDosenMenjabat($id_menjabat)
        {
            $this->admin_model->deleteDataDosenMenjabat($id_menjabat);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/dosen_menjabat','refresh');
        }

        public function editDosenMenjabat($primary)
        {   
            $data['title']='edit Lecturer Position';
            $data['menjabat']=$this->admin_model->getPrimaryDataDosenMenjabat($primary);
            $data['jabatan']=$this->admin_model->getDataJabatan();
            $data['dosen']=$this->admin_model->getDataDosen();
            $this->form_validation->set_rules('Kode','KODE','required');
            $this->form_validation->set_rules('id_jabatan','ID Jabatan','required');
            $this->form_validation->set_rules('tahun_menjabat','Position Year','required');
            $this->form_validation->set_rules('semester_menjabat','Position Semester','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_menjabat', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editDosenMenjabat();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/dosen_menjabat','refresh');
                
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
                            $inserdata[$i]['id_menjabat'] = $value['A'];
                            $inserdata[$i]['Kode'] = $value['B'];
                            $inserdata[$i]['id_jabatan'] = $value['C'];
                            $inserdata[$i]['tahun_menjabat'] = $value['D'];
                            $inserdata[$i]['semester_menjabat'] = $value['E'];
                            $i++;
                          }               
                          $result = $this->import->importDataDosenMenjabat($inserdata);   
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
                    redirect('admin/dosen_menjabat','refresh');
          }
            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Dosen_Menjabat_Data.csv';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportDosenMenjabat();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID Menjabat');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kode Dosen');
          $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'ID Jabatan');
          $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Tahun Menjabat');
          $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'semester_menjabat');       
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_menjabat);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Kode);
              $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->id_jabatan);
              $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->tahun_menjabat);
              $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->semester_menjabat);
              $rowCount++;
          }
          $filename = "Dosen Menjabat Data.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
          
      }
  
      public function downloadDosenMenjabat()
      {
        force_download('assets/download/dataDosenMenjabatTemplate.csv',NULL);
      }
}

/* End of file jabatan_dosen.php */


?>