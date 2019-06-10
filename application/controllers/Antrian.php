<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Antrian extends CI_Controller
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
        date_default_timezone_set('Asia/Jakarta');
        $time = date('d-m-Y');
        $title = array('title' => 'Antrian');
        $data['antrian'] = $this->MainModel->getData('*', 'antrian', '', ['waktu' => $time], '');
        $this->load->view('partials/menu', $title);
        $this->load->view('antrian/list', $data);
        $this->load->view('partials/footer');
    }
    private function rules(){
        return [
            [
                'field' => 'id_pasien',
                'label' => 'Nama Pasien',
                'rules' => 'required|trim'
            ],
            [
              'field' => 'keluhan',
              'label' => 'Keluhan',
              'rules' => 'required|trim'
            ]
        ];
    }

    private function edit_rules(){
        return [
          [
            'field' => 'id_pasien',
            'label' => 'Nama Pasien',
            'rules' => 'required|trim'
          ],
          [
            'field' => 'keluhan',
            'label' => 'Keluhan',
            'rules' => 'required|trim'
          ]
        ];
    }

    public function create()
    {
        $title = array('title' => 'Tambah Antrian');

        $data['pasien'] = $this->MainModel->getData('id_pasien, nama', 'pasien', '', '', '');
        
        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()) {
            $this->data = array(
                'id_pasien' => $this->input->post('id_pasien'),
                'waktu' => $this->input->post('waktu'),
                'keluhan' => $this->input->post('keluhan'),
                'nomor' => $this->input->post('nomor'),
            );

            // echo "<pre>";
            // print_r ($this->input);
            // echo "</pre>";
            $this->MainModel->insert('antrian', $this->data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url(). 'antrian/create');

        }
        else{
            // $this->session->flashdata('error', 'Gagal disimpan');
            // redirect(base_url(). 'user/create');
        }

        $this->load->view('partials/menu',$title);
        $this->load->view('antrian/create', $data);
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

    public function getDataPasien($id_pasien)
    {
      $dataPasien = $this->MainModel->getData('alamat, tgl_lahir', 'pasien', '', ['id_pasien' => $id_pasien], '');
      $dataPasien[0]['tgl_lahir'] = date('d-m-Y', strtotime($dataPasien[0]['tgl_lahir']));
      print (json_encode($dataPasien));
      return json_encode($dataPasien);
    }

}
