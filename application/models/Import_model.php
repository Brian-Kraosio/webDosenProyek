<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Import_model extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }

        public function importDataDosen($data) {
  
            $res = $this->db->insert_batch('dosen',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }
        
        public function importDataDpa($data) {
  
            $res = $this->db->insert_batch('dpa',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }

        public function importDataResearchGroup($data) {
  
            $res = $this->db->insert_batch('research_group',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }
        public function importDataDosenMenjabat($data) {
  
            $res = $this->db->insert_batch('dosen_menjabat',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataJabatan($data) {
  
            $res = $this->db->insert_batch('jabatan',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataHomebase($data) {
  
            $res = $this->db->insert_batch('homebase',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataStatus($data) {
  
            $res = $this->db->insert_batch('status',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataResearch($data) {
  
            $res = $this->db->insert_batch('research',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataKelas($data) {
  
            $res = $this->db->insert_batch('kelas',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataJadwalPerKelas($data) {
  
            $res = $this->db->insert_batch('jadwal_per_kelas',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataMataKuliah($data) {
  
            $res = $this->db->insert_batch('mata_kuliah',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataMengajar($data) {
  
            $res = $this->db->insert_batch('mengajar',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataRPS($data) {
  
            $res = $this->db->insert_batch('rps_sap',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function importDataKontrak($data) {
  
            $res = $this->db->insert_batch('kontrak_kuliah',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
?>