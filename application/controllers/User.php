<?php
defined('BASEPATH') or exit('No direct script access allowes');

class User extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('haslogin') != 'true') {
            $this->session->set_flashdata('error', 'Anda harus login dulu !');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $title = array('title' => 'User');
        $data['user'] = $this->MainModel->getData('*', 'user', '', '', '');
        $this->load->view('partials/menu', $title);
        $this->load->view('user/list', $data);
        $this->load->view('partials/footer');
    }
    private function rules(){
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'gender',
                'label' => 'gender',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim|min_length[5]|max_length[60]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[6]|max_length[20]'
            ],
            [
                'field' => 'konf_password',
                'label' => 'Konfirmas Password',
                'rules' => 'required|trim|min_length[6]|max_length[20]|matches[password]'
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No Hp',
                'rules' => 'required|trim|min_length[10]|max_length[13]'
            ],
        ];
    }

    private function edit_rules(){
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'gender',
                'label' => 'gender',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim|min_length[5]|max_length[60]'
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No Hp',
                'rules' => 'required|trim|min_length[10]|max_length[13]'
            ],
        ];
    }

    public function uploadFoto()
    {
        
        $config['upload_path'] = './upload/fotouser/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = true;
        $config['max_size']  = 1024;
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto')){
            return str_replace(' ', '_', $_FILES['foto']['name']);
        }

        return 'default.jpg';
        
    }

    private function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function create()
    {
        $title = array('title' => 'Tambah User');
        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
            'min_length' => 'Minimal {param} karakter',
            'max_length' => 'Maksimal {param} karakter',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()) {
            
            
            $this->data = array(
                'nama' => $this->input->post('nama'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'gender' => $this->input->post('gender'),
                'agama' => $this->input->post('agama'),
                'foto' => $this->uploadFoto(),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'username' => $this->input->post('username'),
                'password' => $this->hash_password($this->input->post('password')),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
            );

            // echo "<pre>";
            // print_r ($this->input);
            // echo "</pre>";
            $this->MainModel->insert('user', $this->data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url(). 'user/create');

        }
        else{
            // $this->session->flashdata('error', 'Gagal disimpan');
            // redirect(base_url(). 'user/create');
        }

        $this->load->view('partials/menu',$title);
        $this->load->view('user/create');
        $this->load->view('partials/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) {
            redirect(base_url(). 'user');
        }

        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
            'min_length' => 'Minimal {param} karakter',
            'max_length' => 'Maksimal {param} karakter',
        ));

        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {

            $this->user = array(
                'nama' => $this->input->post('nama'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'gender' => $this->input->post('gender'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'username' => $this->input->post('username'),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
            );

            if (!empty($_FILES['foto']['name'])) {
                $this->user['foto'] = $this->uploadFoto();
            } else {
                $this->user['foto'] = $this->input->post('old_foto');
            }

            $this->MainModel->update('user', $this->user, ['id_user' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
            // echo "<pre>";
            // print_r ($this->user);
            // echo "</pre>";
            
        }

        $data['user'] = $this->MainModel->getData('*', 'user', '', ['id_user' => $id], '');
        if (!$data['user']) {
            show_404();
        }

        $title['title'] = 'Edit User';
        $this->load->view('partials/menu',$title);
        $this->load->view('user/edit', $data);
        $this->load->view('partials/footer');
        
    }

}
