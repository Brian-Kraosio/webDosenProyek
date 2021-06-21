<?php


defined('BASEPATH') or exit('No direct script access allowed');

class rps_sap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'download');
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
        $data['title'] = 'Data RPS & SAP ';
        $data['rpssap'] = $this->admin_model->getDataRPS();
        $this->load->view('template/header', $data);
        $this->load->view('dosen/rps_sap', $data);
        $this->load->view('template/footer');;
    }

    public function rps_sap_matkul()
    {
        $data['title'] = 'Data RPS & SAP ';
        $data['rpssap'] = $this->admin_model->getDataRPSSAPMatkul();
        $this->load->view('template/header', $data);
        $this->load->view('dosen/rps_sap_matkul', $data);
        $this->load->view('template/footer');;
    }

    public function tambahRPS()
    {
        $data = array();
        $data['mata_kuliah'] = $this->admin_model->getDataMataKuliah();
        $data['title'] = 'Adding RPS & SAP Data';
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('add_data/tambah_rps_sap', $data);
            $this->load->view('template/footer');
        } else {
            $RPS = $this->admin_model->uploadRPS();
            $SAP = $this->admin_model->uploadSAP();
            if ($RPS['result'] == "success" || $SAP['result'] == "success") {
                    $this->admin_model->tambahRPS($RPS,$SAP);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('admin/rps_sap', 'refresh');
                }else{
                    $this->admin_model->tambahRPS($RPS,$SAP);
                    $this->session->set_flashdata('flash-data', 'Added');
                    redirect('admin/rps_sap', 'refresh');
                }
        }
    }

    public function deleteRPS($id_RPS)
    {
        $this->admin_model->deleteDataRPS($id_RPS);
        $this->session->set_flashdata('flash-data', 'Deleted');
        redirect('admin/rps_sap', 'refresh');
    }

    public function editRPS($primary)
    {
        $data = array();
        $data['title'] = 'Edit RPS & SAP Data';
        $data['rpssap'] = $this->admin_model->getPrimaryDataRPS($primary);
        $data['mata_kuliah'] = $this->admin_model->getDataMataKuliah();
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('edit_data/edit_rps_sap', $data);
            $this->load->view('template/footer');
        } else {
                $RPS = $this->admin_model->updateRPS();
                $SAP = $this->admin_model->updateSAP();
                if ($RPS['result'] == "success"|| $SAP['result'] == "success") {
                    $this->admin_model->editRPS($RPS, $SAP);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('admin/rps_sap', 'refresh');
                }else{
                    $this->admin_model->editRPS($RPS, $SAP);
                    $this->session->set_flashdata('flash-data', 'Edited');
                    redirect('admin/rps_sap', 'refresh');
                }
        }
    }
    

    // create xlsx
    public function generateXls()
    {
        // create file name
        $fileName = 'RPS & SAP Data.xlsx';
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->export->exportRPS();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID RPS SAP');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Kode Mata Kuliah');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'RPS FileName');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'SAP Filename');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_rps_sap);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->kode_mk);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->RPS);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->SAP);
            $rowCount++;
        }
        $filename = "Data RPS & SAP.xlsx";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
    public function downloadRPS($filename)
    {
        force_download('assets/uploads/RPS/' . urldecode($filename), NULL);
    }
    public function downloadSAP($filename)
    {
        force_download('assets/uploads/SAP/' . urldecode($filename), NULL);
    }
    public function downloadRPSSAP()
      {
        force_download('assets/download/data_rps_sap_Template.csv',NULL);
      }
}

/* End of file status.php */
