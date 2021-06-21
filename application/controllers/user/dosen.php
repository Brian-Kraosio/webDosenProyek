<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','download');
        $this->load->helper('form');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Import_model', 'import');
        $this->load->model('Export_model', 'export');
        $this->load->helper(array('url','html','form'));

        if($this->session->userdata('level')!="user"){
          redirect('login','refresh');
      }
    }

    public function index()
    {
      $code = $this->session->userdata('code');
      $pic = $this->session->userdata('pic');
        $data = array(
          'title' => 'Profile',
          'code' => $code,
          'pic' => $pic,
          'dosen' => $this->user_model->getDataDosen(),
          'position' => $this->user_model->getDataJabatanDosen(),
          'distribution' => $this->user_model->getDataDistribusiTipeMatkul(),
          'teach' => $this->user_model->getDataDosenMengajar(),
          'homeroom' => $this->user_model->getDataDosenDpa(),
          'homebase' => $this->user_model->getDataHomebaseDosen(),
          'homebaseakre' => $this->user_model->getDataHomebaseDosenAkre(),
          'schedule' => $this->user_model->getDataJadwalKelas(),
          'kontrak' => $this->user_model->getDataKontrakKuliahDosen(),
          'rps_sap' => $this->user_model->getDataRPSSAPDosen(),
          'status' => $this->user_model->getDataStatusDosen(),
          'research' => $this->user_model->getDataDosenResearch(),
        );
        $this->load->view('template/header_user',$data);
        $this->load->view('user/dosen',$data);
        $this->load->view('template/footer');
    }

    public function homebaseDosen()
    {
        $data['title']='Data Homebase Dosen';
        $data['dosen']=$this->admin_model->getDataHomebaseDosen();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/homebasedosen',$data);
        $this->load->view('template/footer');
    }

    public function statusDosen()
    {
        $data['title']='Data Status Dosen';
        $data['dosen']=$this->admin_model->getDataStatusDosen();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/statusdosen',$data);
        $this->load->view('template/footer');
    }

    public function mengajarDosen()
    {
        $data['title']='Data Dosen Mengajar';
        $data['dosen']=$this->admin_model->getDataDosenMengajar();
        $this->load->view('template/header',$data);
        $this->load->view('dosen/mengajardosen',$data);
        $this->load->view('template/footer');
    }
    

    public function tambahDosen()
        {   
            $data['title']='Adding Dosen Data';
            $data['homebase']=$this->admin_model->getDataHomebase();
            $data['status']=$this->admin_model->getDataStatus();
            $data['mengajar']=$this->admin_model->getDataMengajar();
            $this->form_validation->set_rules('KODE','KODE','required');
            $this->form_validation->set_rules('Nama', 'Nama','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('add_data/tambah_dosen', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->tambahDosen();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/dosen','refresh');
                
            }
        }

        public function deleteDosen($KODE)
        {
            $this->admin_model->deleteDataDosen($KODE);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/dosen','refresh');
        }

        public function editDosen($primary)
        {   
            $data['title']='Edit Dosen Data';
            $data['dosen']=$this->admin_model->getPrimaryDataDosen($primary);
            $data['homebase']=$this->admin_model->getDataHomebase();
            $data['status']=$this->admin_model->getDataStatus();
            $data['mengajar']=$this->admin_model->getDataMengajar();
            $this->form_validation->set_rules('KODE','KODE','required');
            $this->form_validation->set_rules('Nama', 'Nama','required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('edit_data/edit_dosen', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->admin_model->editDosen();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/dosen','refresh');
                
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
                            $inserdata[$i]['NIP'] = $value['A'];
                            $inserdata[$i]['NIDN'] = $value['B'];
                            $inserdata[$i]['KODE'] = $value['C'];
                            $inserdata[$i]['Nama'] = $value['D'];
                            $inserdata[$i]['kuota_ngajar'] = $value['E'];
                            $inserdata[$i]['jam_ngajar'] = $value['F'];
                            $inserdata[$i]['sks'] = $value['G'];    
                            $inserdata[$i]['distribusi'] = $value['H'];
                            $inserdata[$i]['kuota_genap19/20'] = $value['I'];
                            $inserdata[$i]['distribusi_genap19/20'] = $value['J'];
                            $inserdata[$i]['id_homebase'] = $value['K'];
                            $inserdata[$i]['homebase_akre'] = $value['L'];
                            $inserdata[$i]['id_status'] = $value['M'];
                            $inserdata[$i]['id_mengajar'] = $value['N'];
                            $i++;
                          }               
                          $result = $this->import->importDataDosen($inserdata);   
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
                    redirect('admin/dosen','refresh');
          }
            // create xlsx
        public function generateXls() {
          // create file name
          $fileName = 'Dosen Data.xlsx';  
          // load excel library
          $this->load->library('excel');
          $listInfo = $this->export->exportDosen();
          $objPHPExcel = new PHPExcel();
          $objPHPExcel->setActiveSheetIndex(0);
          // set Header
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'NIP');
          $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'NIDN');
          $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'KODE');
          $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Nama Dosen');     
          $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Homebase');       
          $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Homebase Akreditasi');       
          $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'ID Status');       
          $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'ID Mengajar');       
          // set Row
          $rowCount = 2;
          foreach ($listInfo as $list) {
              $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->NIP);
              $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->NIDN);
              $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->KODE);
              $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->Nama);
              $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->id_homebase);
              $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->homebase_akre);
              $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->id_status);
              $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->id_mengajar);
              $rowCount++;
          }
          $filename = "Data Dosen.xlsx";
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0'); 
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
          $objWriter->save('php://output'); 
      }
  
      public function downloadDosen()
      {
        force_download('assets/download/dataDosenTemplate.csv',NULL);
      }
        }
/* End of file dosen.php */
