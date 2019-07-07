<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    public function __contruct(){
        parent::__contruct();
        if($this->session->userdata('haslogin') != 'true'){
           $this->session->set_flashdata('error', 'Anda harus login dulu !') ;
           redirect(base_url('login'));
        }
    }

    public function index()
    {
        $title= array('title' => 'Pelayanan');
        $data['pelayanan'] = $this->MainModel->getData('*', 'pelayanan', '', '', '');
        $this->load->view('partials/menu', $title);
        $this->load->view('pelayanan/list', $data);
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
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required|trim|numeric'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
        ];
    }
    private function edit_rules(){
        return[
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required|trim|numeric'
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
        $title = array('title' => 'Tambah Pelayanan');
        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()) {

            $this->data = array(
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'status' => $this->input->post('status'),
            );

            $this->MainModel->insert('pelayanan', $this->data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url(). 'pelayanan/create');
        }

        $this->load->view('partials/menu', $title);
        $this->load->view('pelayanan/create');
        $this->load->view('partials/footer');
    }

    public function edit($id =null)
    {
        if(!isset($id)) {
            redirect(base_url(). 'pelayanan');
        }

        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));

        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {

            $this->pelayanan = array(
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'status' => $this->input->post('status'),
            );

            $this->MainModel->update('pelayanan', $this->pelayanan, ['id_pelayanan' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
        }

        $data['pelayanan'] = $this->MainModel->getData('*', 'pelayanan', '', ['id_pelayanan' => $id], '');
        if (!$data['pelayanan']) {
            show_404();
        }
        $title['title'] = 'Edit Pelayanan';
        $this->load->view('partials/menu',$title);
        $this->load->view('pelayanan/edit', $data);
        $this->load->view('partials/footer');
    }

}