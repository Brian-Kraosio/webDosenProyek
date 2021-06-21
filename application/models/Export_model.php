<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Export_model extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }
        Public function exportDosen() {
            $query=$this->db->get('dosen');
            return $query->result();
        }
        
        public function exportDpa() {
            $query=$this->db->get('dpa');
            return $query->result();
        }
        public function exportResearchGroup() {
            $query=$this->db->get('research_group');
            return $query->result();
        }
        public function exportDosenMenjabat() {
            $query=$this->db->get('dosen_menjabat');
            return $query->result();
        }

        public function exportJabatan() {
            $query=$this->db->get('jabatan');
            return $query->result();
        }

        public function exportHomebase() {
            $query=$this->db->get('homebase');
            return $query->result();
        }

        public function exportStatus() {
            $query=$this->db->get('status');
            return $query->result();
        }
        public function exportResearch() {
            $query=$this->db->get('research');
            return $query->result();
        }
        public function exportKelas() {
            $query=$this->db->get('kelas');
            return $query->result();
        }
        public function exportJadwalPerKelas() {
            $query=$this->db->get('jadwal_per_kelas');
            return $query->result();
        }
        public function exportMataKuliah() {
            $query=$this->db->get('mata_kuliah');
            return $query->result();
        }
        public function exportMengajar() {
            $query=$this->db->get('mengajar');
            return $query->result();
        }

        public function exportRPS() {
            $query=$this->db->get('rps_sap');
            return $query->result();
        }
        public function exportKontrak() {
            $query=$this->db->get('kontrak_kuliah');
            return $query->result();
        }
    }