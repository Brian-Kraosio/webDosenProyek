<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    // table database

    public function getDataDosen()
    {
        $query = $this->db->get('dosen');
        return $query->result_array();
    }

    public function getDataDosenMenjabat()
    {
        $query = $this->db->get('dosen_menjabat');
        return $query->result_array();
    }

    public function getDataDPA()
    {
        $query = $this->db->get('dpa');
        return $query->result_array();
    }

    public function getDataHomebase()
    {
        $query = $this->db->get('homebase');
        return $query->result_array();
    }

    public function getDataJabatan()
    {
        $query = $this->db->get('jabatan');
        return $query->result_array();
    }

    public function getDataJadwalPerKelas()
    {
        $query = $this->db->get('jadwal_per_kelas');
        return $query->result_array();
    }

    public function getDataKelas()
    {
        $query = $this->db->get('kelas');
        return $query->result_array();
    }

    public function getDataMataKuliah()
    {
        $query = $this->db->get('mata_kuliah');
        return $query->result_array();
    }

    public function getDataMengajar()
    {
        $query = $this->db->get('mengajar');
        return $query->result_array();
    }

    public function getDataResearch()
    {
        $query = $this->db->get('research');
        return $query->result_array();
    }

    public function getDataResearchGroup()
    {
        $query = $this->db->get('research_group');
        return $query->result_array();
    }

    public function getDataStatus()
    {
        $query = $this->db->get('status');
        return $query->result_array();
    }

    public function getDataRPS()
    {
        $query = $this->db->get('rps_sap');
        return $query->result_array();
    }

    public function getDataKontrakKuliah()
    {
        $query = $this->db->get('kontrak_kuliah');
        return $query->result_array();
    }

    // view database

    public function getDataDistribusiTipeMatkul()
    {
        $query = $this->db->get('distribusi_tipe_matkul');
        return $query->result_array();
    }
    public function getDataDosenMengajar()
    {
        $query = $this->db->get('dosenmengajar');
        return $query->result_array();
    }
    public function getDataDosenDpa()
    {
        $query = $this->db->get('dosen_dpa');
        return $query->result_array();
    }
    public function getDataDosenResearch()
    {
        $query = $this->db->get('dosen_research');
        return $query->result_array();
    }
    public function getDataHomebaseDosen()
    {
        $query = $this->db->get('homebasedosen');
        return $query->result_array();
    }
    public function getDataHomebaseDosenAkre()
    {
        $query = $this->db->get('hombasedosenakre');
        return $query->result_array();
    }
    public function getDataJabatanDosen()
    {
        $query = $this->db->get('jabatan_dosen');
        return $query->result_array();
    }
    public function getDataJadwalKelas()
    {
        $query = $this->db->get('jadwal_kelas');
        return $query->result_array();
    }
    public function getDataJadwalKelasDistribusi()
    {
        $query = $this->db->get('jadwal_kelas_distribusi');
        return $query->result_array();
    }
    public function getDataStatusDosen()
    {
        $query = $this->db->get('statusdosen');
        return $query->result_array();
    }
    public function getDataRPSSAPMatkul()
    {
        $query = $this->db->get('rps_sap_matkul');
        return $query->result_array();
    }
    public function getDataKontrakKuliahMatkul()
    {
        $query = $this->db->get('kontrak_kuliah_matkul');
        return $query->result_array();
    }


    // add model

    public function tambahDosen()
    {
        $data = [
            "NIP" => $this->input->post('NIP', true),
            "NIDN" => $this->input->post('NIDN', true),
            "KODE" => $this->input->post('KODE', true),
            "Nama" => $this->input->post('Nama', true),
            "id_homebase" => $this->input->post('id_homebase', true),
            "homebase_akre" => $this->input->post('homebase_akre', true),
            "id_status" => $this->input->post('id_status', true),
            "id_mengajar" => $this->input->post('id_mengajar', true),
        ];
        $this->db->insert('dosen', $data);
    }

    public function tambahDosenMenjabat()
    {
        $data = [
            "id_menjabat" => $this->input->post('id_menjabat', true),
            "Kode" => $this->input->post('Kode', true),
            "id_jabatan" => $this->input->post('id_jabatan', true),
            "tahun_menjabat" => $this->input->post('tahun_menjabat', true),
            "semester_menjabat" => $this->input->post('semester_menjabat', true),
        ];
        $this->db->insert('dosen_menjabat', $data);
    }

    public function tambahDpa()
    {
        $data = [
            "id_DPA" => $this->input->post('id_DPA', true),
            "KODE" => $this->input->post('KODE', true),
            "kelas_dpa" => $this->input->post('kelas_dpa', true),
            "dpa_tahun" => $this->input->post('dpa_tahun', true),
            "semester" => $this->input->post('semester', true),
        ];
        $this->db->insert('dpa', $data);
    }

    public function tambahHomebase()
    {
        $data = [
            "id_homebase" => $this->input->post('id_homebase', true),
            "nama_homebase" => $this->input->post('nama_homebase', true),

        ];
        $this->db->insert('homebase', $data);
    }

    public function tambahJabatan()
    {
        $data = [
            "id_jabatan" => $this->input->post('id_jabatan', true),
            "nama_jabatan" => $this->input->post('nama_jabatan', true),

        ];
        $this->db->insert('jabatan', $data);
    }

    public function tambahJadwalPerKelas()
    {
        $data = [
            "id_jadwal_per_kelas" => $this->input->post('id_jadwal_per_kelas', true),
            "kode" => $this->input->post('kode', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "id_matkul" => $this->input->post('id_matkul', true),
            "tahun_jadwal" => $this->input->post('tahun_jadwal', true),
            "semester_jadwal" => $this->input->post('semester_jadwal', true),
        ];
        $this->db->insert('jadwal_per_kelas', $data);
    }

    public function tambahKelas()
    {
        $data = [
            "id_kelas" => $this->input->post('id_kelas', true),
            "nama_kelas" => $this->input->post('nama_kelas', true),

        ];
        $this->db->insert('kelas', $data);
    }

    public function tambahMataKuliah()
    {
        $data = [
            "kode_mk" => $this->input->post('kode_mk', true),
            "nama_mata_kuliah" => $this->input->post('nama_mata_kuliah', true),
            "sks_mata_kuliah" => $this->input->post('sks_mata_kuliah', true),
            "Jam_mata_kuliah" => $this->input->post('Jam_mata_kuliah', true),
            "tipe_mata_kuliah" => $this->input->post('tipe_mata_kuliah', true),
        ];
        $this->db->insert('mata_kuliah', $data);
    }


    public function getKodeMK($kode_mk)
    {
        return $this->db->get_where('mata_kuliah', ['kode_mk' => $kode_mk])->row_array();
    }

    public function tambahMengajar()
    {
        $data = [
            "id_mengajar" => $this->input->post('id_mengajar', true),
            "tipe_pelajaran" => $this->input->post('tipe_pelajaran', true),

        ];
        $this->db->insert('mengajar', $data);
    }

    public function tambahResearch()
    {
        $data = [
            "id_research" => $this->input->post('id_research', true),
            "nama_research" => $this->input->post('nama_research', true),

        ];
        $this->db->insert('research', $data);
    }

    public function tambahResearchGroup()
    {
        $data = [
            "id_research_group" => $this->input->post('id_research_group', true),
            "Kode" => $this->input->post('Kode', true),
            "id_research" => $this->input->post('id_research', true),
            "year" => $this->input->post('year', true),
            "semester" => $this->input->post('semester', true),
            "priority" => $this->input->post('priority', true),
        ];
        $this->db->insert('research_group', $data);
    }
    public function tambahStatus()
    {
        $data = [
            "status" => $this->input->post('status', true),
            "kode_status" => $this->input->post('kode_status', true),
            "id_status" => $this->input->post('id_status', true),

        ];
        $this->db->insert('status', $data);
    }



    public function uploadRPS()
    {
        $config['upload_path'] = './assets/uploads/RPS';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('RPS')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function uploadSAP()
    {
        $config['upload_path'] = './assets/uploads/SAP';
        $config['allowed_types'] = 'doc|docx|pdf|xlsx|xls|csv';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('SAP')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {

            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function tambahRPS($RPS, $SAP)
    {
        $data = [
            "id_rps_sap" => $this->input->post('id_rps_sap', true),
            "kode_mk" => $this->input->post('kode_mk', true),
            "RPS" => $RPS['file']['file_name'],
            "SAP" => $SAP['file']['file_name'],
        ];
        $this->db->insert('rps_sap', $data);
    }

    public function uploadKontrak()
    {
        $config['upload_path'] = './assets/uploads/kontrak';
        $config['allowed_types'] = 'doc|docx|pdf|xlsx|xls|csv';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;


        $this->load->library('upload', $config);
        if ($this->upload->do_upload('up_file')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {

            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
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

    // delete model

    public function deleteDataDosen($KODE)
    {
        $this->db->where('KODE', $KODE);
        $this->db->delete('dosen');
    }
    public function deleteDataDosenMenjabat($id_menjabat)
    {
        $this->db->where('id_menjabat', $id_menjabat);
        $this->db->delete('dosen_menjabat');
    }
    public function deleteDataDpa($id_DPA)
    {
        $this->db->where('id_DPA', $id_DPA);
        $this->db->delete('dpa');
    }
    public function deleteDataHomebase($id_homebase)
    {
        $this->db->where('id_homebase', $id_homebase);
        $this->db->delete('homebase');
    }
    public function deleteDataJabatan($id_jabatan)
    {
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->delete('jabatan');
    }
    public function deleteDataJadwalPerKelas($id_jadwal_per_kelas)
    {
        $this->db->where('id_jadwal_per_kelas', $id_jadwal_per_kelas);
        $this->db->delete('jadwal_per_kelas');
    }
    public function deleteDataKelas($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete('kelas');
    }
    public function deleteDataMataKuliah($kode_mk)
    {
        $this->db->where('kode_mk', $kode_mk);
        $this->db->delete('mata_kuliah');
    }
    public function deleteDataMengajar($id_mengajar)
    {
        $this->db->where('id_mengajar', $id_mengajar);
        $this->db->delete('mengajar');
    }
    public function deleteDataResearch($id_research)
    {
        $this->db->where('id_research', $id_research);
        $this->db->delete('research');
    }
    public function deleteDataResearchGroup($id_research_group)
    {
        $this->db->where('id_research_group', $id_research_group);
        $this->db->delete('research_group');
    }
    public function deleteDataStatus($id_status)
    {
        $this->db->where('id_status', $id_status);
        $this->db->delete('status');
    }
    public function deleteDataRPS($id_RPS)
    {
        $this->db->where('id_rps_sap', $id_RPS);
        $this->db->delete('rps_sap');
    }
    public function deleteDataKontrak($id_kontrak)
    {
        $this->db->where('id_kontrak', $id_kontrak);
        $this->db->delete('kontrak_kuliah');
    }


    // Get Primary Key model

    public function getPrimaryDataDosen($KODE)
    {
        return $this->db->get_where('dosen', ['KODE' => $KODE])->row_array();
    }
    public function getPrimaryDataDosenMenjabat($id_menjabat)
    {
        return $this->db->get_where('dosen_menjabat', ['id_menjabat' => $id_menjabat])->row_array();
    }
    public function getPrimaryDataDpa($id_DPA)
    {
        return $this->db->get_where('dpa', ['id_DPA' => $id_DPA])->row_array();
    }
    public function getPrimaryDataHomebase($id_homebase)
    {
        return $this->db->get_where('homebase', ['id_homebase' => $id_homebase])->row_array();
    }
    public function getPrimaryDataJabatan($id_jabatan)
    {
        return $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
    }
    public function getPrimaryDataJadwalPerKelas($id_jadwal_per_kelas)
    {
        return $this->db->get_where('jadwal_per_kelas', ['id_jadwal_per_kelas' => $id_jadwal_per_kelas])->row_array();
    }
    public function getPrimaryDataKelas($id_kelas)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
    }
    public function getPrimaryDataMataKuliah($kode_mk)
    {
        return $this->db->get_where('mata_kuliah', ['kode_mk' => $kode_mk])->row_array();
    }
    public function getPrimaryDataMengajar($id_mengajar)
    {
        return $this->db->get_where('mengajar', ['id_mengajar' => $id_mengajar])->row_array();
    }
    public function getPrimaryDataResearch($id_research)
    {
        return $this->db->get_where('research', ['id_research' => $id_research])->row_array();
    }
    public function getPrimaryDataResearchGroup($id_research_group)
    {
        return $this->db->get_where('research_group', ['id_research_group' => $id_research_group])->row_array();
    }
    public function getPrimaryDataStatus($id_status)
    {
        return $this->db->get_where('status', ['id_status' => $id_status])->row_array();
    }
    public function getPrimaryDataRPS($id_RPS)
    {
        return $this->db->get_where('rps_sap', ['id_rps_sap' => $id_RPS])->row_array();
    }

    public function getPrimaryDataKontrak($id_kontrak)
    {
        return $this->db->get_where('kontrak_kuliah', ['id_kontrak' => $id_kontrak])->row_array();
    }


    // Edit Model
    public function editDosen()
    {
        $data = [
            "NIP" => $this->input->post('NIP', true),
            "NIDN" => $this->input->post('NIDN', true),
            "Nama" => $this->input->post('Nama', true),
            "id_homebase" => $this->input->post('id_homebase', true),
            "homebase_akre" => $this->input->post('homebase_akre', true),
            "id_status" => $this->input->post('id_status', true),
            "id_mengajar" => $this->input->post('id_mengajar', true),
        ];
        $this->db->where('KODE', $this->input->post('KODE'));
        $this->db->update('dosen', $data);
    }

    public function editDosenMenjabat()
    {
        $data = [
            "Kode" => $this->input->post('Kode', true),
            "id_jabatan" => $this->input->post('id_jabatan', true),
            "tahun_menjabat" => $this->input->post('tahun_menjabat', true),
            "semester_menjabat" => $this->input->post('semester_menjabat', true),
        ];
        $this->db->where('id_menjabat', $this->input->post('id_menjabat'));
        $this->db->update('dosen_menjabat', $data);
    }

    public function editDpa()
    {
        $data = [
            "KODE" => $this->input->post('KODE', true),
            "kelas_dpa" => $this->input->post('kelas_dpa', true),
            "dpa_tahun" => $this->input->post('dpa_tahun', true),
            "semester" => $this->input->post('semester', true),
        ];
        $this->db->where('id_DPA', $this->input->post('id_DPA'));
        $this->db->update('dpa', $data);
    }

    public function editHomebase()
    {
        $data = [
            "nama_homebase" => $this->input->post('nama_homebase', true),

        ];
        $this->db->where('id_homebase', $this->input->post('id_homebase'));
        $this->db->update('homebase', $data);
    }

    public function editJabatan()
    {
        $data = [
            "nama_jabatan" => $this->input->post('nama_jabatan', true),
        ];
        $this->db->where('id_jabatan', $this->input->post('id_jabatan'));
        $this->db->update('jabatan', $data);
    }

    public function editJadwalPerKelas()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "id_matkul" => $this->input->post('id_matkul', true),
            "tahun_jadwal" => $this->input->post('tahun_jadwal', true),
            "semester_jadwal" => $this->input->post('semester_jadwal', true),
        ];
        $this->db->where('id_jadwal_per_kelas', $this->input->post('id_jadwal_per_kelas'));
        $this->db->update('jadwal_per_kelas', $data);
    }

    public function editKelas()
    {
        $data = [
            "nama_kelas" => $this->input->post('nama_kelas', true),

        ];
        $this->db->where('id_kelas', $this->input->post('id_kelas'));
        $this->db->update('kelas', $data);
    }

    public function editMataKuliah()
    {
        $data = [
            "nama_mata_kuliah" => $this->input->post('nama_mata_kuliah', true),
            "sks_mata_kuliah" => $this->input->post('sks_mata_kuliah', true),
            "jam_mata_kuliah" => $this->input->post('jam_mata_kuliah', true),
            "tipe_mata_kuliah" => $this->input->post('tipe_mata_kuliah', true),
        ];

        $this->db->where('kode_mk', $this->input->post('kode_mk'));
        $this->db->update('mata_kuliah', $data);
    }

    public function editMengajar()
    {
        $data = [
            "tipe_pelajaran" => $this->input->post('tipe_pelajaran', true),
        ];
        $this->db->where('id-mengajar', $this->input->post('id_mengajar'));
        $this->db->update('mengajar', $data);
    }

    public function editResearch()
    {
        $data = [
            "nama_research" => $this->input->post('nama_research', true),
        ];
        $this->db->where('id_research', $this->input->post('id_research'));
        $this->db->update('research', $data);
    }

    public function editResearchGroup()
    {
        $data = [
            "Kode" => $this->input->post('Kode', true),
            "id_research" => $this->input->post('id_research', true),
            "year" => $this->input->post('year', true),
            "semester" => $this->input->post('semester', true),
            "priority" => $this->input->post('priority', true),
        ];
        $this->db->where('id_research_group', $this->input->post('id_research_group'));
        $this->db->update('research_group', $data);
    }

    public function editStatus()
    {
        $data = [
            "status" => $this->input->post('status', true),
            "kode_status" => $this->input->post('kode_status', true),

        ];
        $this->db->where('id_status', $this->input->post('id_status'));
        $this->db->update('status', $data);
    }

    public function updateRPS()
    {
        $config['upload_path'] = './assets/uploads/RPS';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('RPS')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function updateSAP()
    {
        $config['upload_path'] = './assets/uploads/SAP';
        $config['allowed_types'] = 'doc|docx|pdf|xlsx|xls|csv';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('SAP')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {

            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }


    public function editRPS($RPS, $SAP)
    {

        if (!empty($_FILES["RPS"]["name"])) {
            $data1 = $RPS['file']['file_name'];
        } else {
            $data1 = $this->input->post('old_RPS', true);
        };
        if (!empty($_FILES["SAP"]["name"])) {
            $data2 = $SAP['file']['file_name'];
        } elseif (empty($_FILES["SAP"]["name"])) {
            $data2 = $this->input->post("old_SAP", true);
        };
        $data = [
            "id_rps_sap" => $this->input->post('id_rps_sap', true),
            "kode_mk" => $this->input->post('kode_mk', true),
            "RPS" => $data1,
            "SAP" => $data2,
        ];
        $this->db->where('id_rps_sap', $this->input->post('id_rps_sap'));
        $this->db->update('rps_sap', $data);
    }

    public function editKontrak($upload)
    {
        if (!empty($_FILES["file"]["name"])) {
            $data1 = $upload['file']['file_name'];
        } else {
            $data1 = $this->input->post('old_file', true);
        };

        $data = [
            "id_kontrak" => $this->input->post('id_kontrak', true),
            "id_matkul" => $this->input->post('id_matkul', true),
            "file" => $data1,
            "uploader" => $this->session->userdata('user')
        ];
        $this->db->where('id_kontrak', $this->input->post('id_kontrak'));
        $this->db->update('kontrak_kuliah', $data);
    }
}

/* End of file admin_model.php */
