<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Pasien extends CI_Controller
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
        $title = array('title' => 'Pasien');
        $where="";
        if (!empty($_GET['keyword'])) {
            $where = "nama LIKE '%$_GET[keyword]%'";
        }
        $data['pasien'] = $this->MainModel->getData('*', 'pasien', '', $where, '');
        $this->load->view('partials/menu', $title);
        $this->load->view('pasien/list', $data);
        $this->load->view('partials/footer');
    }
    private function rules(){
        return[
            [
                'field' => 'no_identitas',
                'label' => 'No Identitas',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tmpt_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim|min_length[5]|max_length[60]'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No HP',
                'rules' => 'required|trim|min_length[10]|max_length[13]'
            ],
            [
                'field' => 'pendidikan',
                'label' => 'Pendidikan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'status_perkawinan',
                'label' => 'Status Kawin',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required|trim'
            ],
        ];
    }

    private function edit_rules(){
        return[
            [
                'field' => 'no_identitas',
                'label' => 'No Identitas',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tmpt_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim|min_length[5]|max_length[60]'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No HP',
                'rules' => 'required|trim|min_length[10]|max_length[13]'
            ],
            [
                'field' => 'pendidikan',
                'label' => 'Pendidikan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'status_perkawinan',
                'label' => 'Status Kawin',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required|trim'
            ],
        ];
    }

    public function create()
    {
        $title = array('title' => 'Tambah Pasien');
        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
            'min_length' => 'Minimal {param} karakter',
            'max_length' => 'Maksimal {param} karakter',
        ));
        $validation->set_rules($this->rules());
        if ($validation->run()) {
            
            
            $this->data = array(
                'no_identitas' => $this->input->post('no_identitas'),
                'nama' => $this->input->post('nama'),
                'tmpt_lahir' => $this->input->post('tmpt_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'pendidikan' => $this->input->post('pendidikan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'status' => $this->input->post('status'),
            );
            
            print_r($_POST);
            $this->MainModel->insert('pasien', $this->data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            
            redirect(base_url(). 'pasien/create');
        }

        
        $this->load->view('partials/menu',$title);
        $this->load->view('pasien/create');
        $this->load->view('partials/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) {
            redirect(base_url(). 'pasien');
        }

        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
            'min_length' => 'Minimal {param} karakter',
            'max_length' => 'Maksimal {param} karakter',
        ));

        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {
            
            
            $this->pasien = array(
                'no_identitas' => $this->input->post('no_identitas'),
                'nama' => $this->input->post('nama'),
                'tmpt_lahir' => $this->input->post('tmpt_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'pendidikan' => $this->input->post('pendidikan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'status' => $this->input->post('status'),
            );

            $this->MainModel->update('pasien', $this->pasien, ['id_pasien' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');

        }

        $data['pasien'] = $this->MainModel->getData('*', 'pasien', '', ['id_pasien' => $id], '');
        if (!$data['pasien']) {
            show_404();
        }

        $title['title'] = 'Edit pasien';
        $this->load->view('partials/menu',$title);
        $this->load->view('pasien/edit', $data);
        $this->load->view('partials/footer');
        
    }

    public function riwayat($id = null)
    {
        if ($id == null) {
            rediredt(base_url(). 'pasien');
        }
        $title['title'] = 'Riwayat Pasien';
        $data['pasien'] = $this->MainModel->getData('pasien.*, YEAR(CURDATE()) - YEAR(tgl_lahir) as usia', 'pasien', '', ['id_pasien' => $id], '');

        $data['history'] = $this->MainModel->getData('a.id_antrian, a.waktu, a.keluhan', 'antrian a', ['pemeriksaan pm', 'pm.id_antrian = a.id_antrian'], ['id_pasien' => $id], ['a.id_antrian', 'DESC']);

        $this->load->view('partials/menu',$title);
        $this->load->view('pasien/riwayat', $data);
        $this->load->view('partials/footer');
    }

}

