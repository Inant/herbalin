<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('haslogin') != 'true') {
            $this->session->set_flashdata('error', 'Login terlebih dahulu');
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $title = array('title' => 'Home');
        $this->load->view('partials/menu',$title);
        $this->load->view('dashboard/index');
        $this->load->view('partials/footer');
    }
}
