<?php
defined('BASEPATH') or exit('No direct script access allowes');

class User extends CI_Controller
{
    

    public function index()
    {
        $title = array('title' => 'User');
        $data['user'] = $this->MainModel->getData('*', 'user', '', '', '');
        $this->load->view('partials/menu', $title);
        $this->load->view('user/list', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $title = array('title' => 'Tambah User');


        $this->load->view('partials/menu',$title);
        $this->load->view('user/create');
        $this->load->view('partials/footer');
    }

}
