<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $this->load->view('login/login');
    }

    public function loginAction()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username, 
            'password' => $password,
            'status' => 'Aktif'
        );

        $cek = $this->LoginModel->cekLogin($where)->first_row('array');

        if ($cek != NULL) {
            // echo "<pre>";
            // print_r ($cek);
            // echo "</pre>";

            $user = array(
                'nama' => $cek['nama'],
                'username' => $cek['username'],
                'level' => $cek['level'],
                'haslogin' => 'true'
            );

            $this->session->set_userdata($user);
            redirect(base_url().'dashboard');
        }
        else{
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect(base_url().'login');
        }
    }

    public function logout()
        {
            $userData = $this->session->all_userdata();
            foreach ($userData as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                    $this->session->unset_userdata($key);
                }
            }
        
            $this->session->sess_destroy();
            redirect(base_url().'login');
        }
}

