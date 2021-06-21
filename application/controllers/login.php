<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $data['title']='Login';
        $this->load->view('template/header_login', $data);
        $this->load->view('login/index');
        $this->load->view('template/footer_login');
    }

    public function proses_login()
    {
        $username=htmlspecialchars($this->input->post('username'));
        $password=htmlspecialchars($this->input->post('password'));
        
        $ceklogin=$this->login_model->login($username,$password);

        if($ceklogin){
            foreach($ceklogin as $row);
            
            $this->session->set_userdata('user', $row->username);
            $this->session->set_userdata('code', $row->KODE);
            $this->session->set_userdata('level', $row->level);
            $this->session->set_userdata('password', $row->password);
            $this->session->set_userdata('pic', $row->profile_pic);
            
            if($this->session->userdata('level')=="admin"){
                redirect('admin/dosen');
            }
            elseif($this->session->userdata('level') =="user"){
                redirect('user/dosen');
            }
            else{
                redirect('login/index', 'refresh');
            }
        }
        else {
            $data['pesan'] = "username dan password anda salah";
            $data['title'] = 'Login';
            $this->load->view('template/header_login', $data);
            $this->load->view('login/index');
            $this->load->view('template/footer_login');
        }
    }

    public function change_pass()
	{
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('new_pass', 'new password', 'required');
        $this->form_validation->set_rules('confirm_pass', 'confirm password', 'required|matches[new_pass]');

        if($this->form_validation->run() == false) {
            $this->load->view('template/header_login', $data);
            $this->load->view('login/change_pass');
            $this->load->view('template/footer_login');
        }else{
            $code = $this->session->userdata('code');
            $newpass = $this->input->post('new_pass');
        $this->login_model->change_pass($code, array('password' => ($newpass)));
        $this->session->set_flashdata('flash-data','Changed');
        redirect('user/dosen','refresh');
        }
        
}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}

/* End of file login.php */
