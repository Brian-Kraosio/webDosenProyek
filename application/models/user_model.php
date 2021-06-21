<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    public function getDataDosen()
    {
        // $this->db->where('kode', $this->session->userdata('code'));  
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('dosen');
        return $query->result();
    }
    public function getDataDistribusiTipeMatkul()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('distribusi_tipe_matkul');
        return $query->result();
    }
    public function getDataDosenMengajar()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('dosenmengajar');
        return $query->result();
    }
    public function getDataDosenDpa()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('dosen_dpa');
        return $query->result();
    }
    public function getDataDosenResearch()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $this->db->order_by('year', 'asc');
        $this->db->order_by('semester', 'desc');
        $this->db->order_by('priority', 'asc');
        $query = $this->db->get('dosen_research');
        return $query->result_array();
    }
    public function getDataHomebaseDosen()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('homebasedosen');
        return $query->result();
    }
    public function getDataHomebaseDosenAkre()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('homebasedosenakre');
        return $query->result();
    }
    public function getDataJabatanDosen()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('jabatan_dosen');
        return $query->result_array();
    }
    public function getDataJadwalKelas()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('jadwal_kelas');
        return $query->result();
    }
    public function getDataJadwalKelasDistribusi()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('jadwal_kelas_distribusi');
        return $query->result();
    }
    public function getDataStatusDosen()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('statusdosen');
        return $query->result();
    }
    public function getDataKontrakKuliahDosen()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('kontrak_kuliah_dosen');
        return $query->result_array();
    }
    public function getDataRPSSAPDosen()
    {
        $this->db->like('kode', $this->session->userdata('code'));
        $query = $this->db->get('rps_sap_dosen');
        return $query->result_array();
    }

    public function getDataRPS()
    {
        $query = $this->db->get('rps_sap');
        $this->db->like('kode', $this->session->userdata('code'));
        return $query->result();
    }

    public function getDataKontrakKuliah()
    {
        $query = $this->db->get('kontrak_kuliah');
        return $query->result_array();
    }

    public function getDataMataKuliah()
    {
        $query = $this->db->get('mata_kuliah');
        return $query->result_array();
    }


    //upload data
    public function uploadRPS(){
        $config['upload_path'] = './assets/uploads/RPS';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['overwrite'] = TRUE;
        
        $this->load->library('upload', $config);
        if($this->upload->do_upload('RPS')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }
      public function uploadSAP(){
        $config['upload_path'] = './assets/upload/SAP';
        $config['allowed_types'] = 'doc|docx|pdf|xlsx|xls|csv';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;
      
        $this->load->library('upload', $config);
        if($this->upload->do_upload('SAP')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{

          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

      public function tambahRPS($RPS,$SAP)
    {
        $data = [
            "id_rps_sap" => $this->input->post('id_rps_sap', true),
            "kode_mk" => $this->input->post('kode_mk', true),
            "RPS" => $RPS['file']['file_name'],
            "SAP" => $SAP['file']['file_name'],
        ];
        $this->db->insert('rps_sap', $data);
    }


      
    public function getPrimaryDataRPS($id_RPS)
    {
        return $this->db->get_where('rps_sap_dosen', ['kode_mk' => $id_RPS])->row_array();
    }
    
    public function getPrimaryDataKontrak($id_kontrak)
    {
        return $this->db->get_where('kontrak_kuliah_dosen', ['kode_mk' => $id_kontrak])->row_array();
    }

    //edit uploaded data
    public function uploadKontrak(){
        $config['upload_path'] = './assets/uploads/kontrak';
        $config['allowed_types'] = 'doc|docx|pdf|xlsx|xls|csv';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;

      
        $this->load->library('upload', $config);
        if($this->upload->do_upload('up_file')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{

          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

    public function updateRPS(){
        $config['upload_path'] = './assets/uploads/RPS';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;
        
        $this->load->library('upload', $config);
        if($this->upload->do_upload('RPS')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

      public function updateSAP(){
        $config['upload_path'] = './assets/upload/SAP';
        $config['allowed_types'] = 'doc|docx|pdf|xlsx|xls|csv';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;
      
        $this->load->library('upload', $config);
        if($this->upload->do_upload('SAP')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{

          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }


    public function editRPS($RPS,$SAP)
    {
        
        if (!empty($_FILES["RPS"]["name"])) {
            $data1 = $RPS['file']['file_name'];
        }else{
            $data1 = $this->input->post('old_RPS',true);
        };
        if (!empty($_FILES["SAP"]["name"])) {
            $data2 = $SAP['file']['file_name'];
        }elseif(empty($_FILES["SAP"]["name"])) {
            $data2 = $this->input->post("old_SAP",true);
        };
        $data = [
            "kode_mk" => $this->input->post('kode_mk', true),
            "RPS" => $data1,
            "SAP" => $data2,
        ];
        $this->db->where('kode_mk', $this->input->post('kode_mk'));
        $this->db->update('rps_sap', $data);
    }

    public function editKontrak($upload)
    {
        if (!empty($_FILES["file"]["name"])) {
            $data1 = $upload['file']['file_name'];
        }else{
            $data1 = $this->input->post('old_file',true);
        };

        $data = [
            "id_matkul" => $this->input->post('id_matkul', true),
            "file" => $data1,
            "uploader" => $this->input->post('uploader', true),
        ];
        $this->db->where('id_matkul', $this->input->post('id_matkul'));
        $this->db->update('kontrak_kuliah', $data);
    }

    public function tambahKontrak($upload)
    {
        $data = [
            "id_kontrak" => $this->input->post('id_kontrak', true),
            "id_matkul" => $this->input->post('id_matkul', true),
            "file" => $upload['file']['file_name'],
            "uploader" => $this->session->userdata('user')
        ];
        $this->db->insert('kontrak_kuliah', $data);
    }

}

/* End of file user_model.php */

?>