<?php
defined('BASEPATH') or exit('No direct script access allowes');


class SatuanObat extends CI_Controller
{
        public function __construct(){
        parent::__construct();
        if ($this->session->userdata('haslogin') != 'true') {
            $this->session->set_flashdata('error', 'anda harus login dulu !');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $title = array('title'=> 'Satuan Obat');
        $data['satuan_obat'] = $this->MainModel->getData('*', 'satuan_obat', '', '', '');
        $this->load->view('partials/menu', $title);
        $this->load->view('satuan-obat/list', $data);
        $this->load->view('partials/footer');
    }
    private function rules(){
        return [
            [
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'required|trim'
            ],
        ];
    }

    private function edit_rules(){
        return[
            [
            'field' => 'satuan',
            'label' => 'Satuan',
            'rules' => 'required|trim'
            ],
        ];
    }

    public function create()
    {
        $title = array('title' => 'Tambah Satuan Obat');
        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()) {
            
            $this->data = array(
                'satuan' => $this->input->post('satuan'),
                'status' => $this->input->post('status'),
            );

            $this->MainModel->insert('satuan_obat', $this->data);
            $this->session->set_flashdata('succsess', 'Berhasil disimpan');
            redirect(base_url(). 'satuanobat/create');
        }
        $this->load->view('partials/menu', $title);
        $this->load->view('satuan-obat/create');
        $this->load->view('partials/footer');
    }

    public function edit($id =null)
    {
        if (!isset($id)) {
            redirect(base_url(). 'satuanobat');
        }

        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));
        
        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {

            $this->satuanobat = array(
                'satuan' => $this->input->post('satuan'),
                'status' => $this->input->post('status'),
            );
            $this->MainModel->update('satuan_obat', $this->satuanobat, ['id_satuan' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
        }

        $data['satuanobat'] = $this->MainModel->getData('*', 'satuan_obat', '', ['id_satuan' => $id], '');
        if (!$data['satuanobat']) {
            show_404();
        }

        $title['title'] = 'Edit satuan obat';
        $this->load->view('partials/menu',$title);
        $this->load->view('satuan-obat/edit', $data);
        $this->load->view('partials/footer');
    }

}