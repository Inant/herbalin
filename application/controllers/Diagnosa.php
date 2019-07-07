<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Diagnosa extends CI_controller
{
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('haslogin') != 'true') {
            $this->session->set_flashdata('error', 'anda harus login dulu !' );
            redirect(base_url('login'));
        }
    }
    public function index()
    {
        $title = array('title' => 'Diagnosa');
        $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', '');
        $this->load->view('partials/menu', $title);
        $this->load->view('diagnosa/list', $data);
        $this->load->view('partials/footer');
    }
    private function rules(){
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
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
        ];
    }

    public function create()
    {
        $title = array('title' => 'Tambah Diagnosa');
        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()) {
            
            $this->data = array(
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
            );

            $this->MainModel->insert('diagnosa', $this->data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url(). 'diagnosa/create');
        }
        $this->load->view('partials/menu', $title);
        $this->load->view('diagnosa/create');
        $this->load->view('partials/footer');
    }

    public function edit($id =null)
    {
        if (!isset($id)) {
            redirect(base_url(). 'diagnosa');
        }

        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        )); 

        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {

            $this->diagnosa = array(
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
            );
            $this->MainModel->update('diagnosa', $this->diagnosa, ['id_diagnosa' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
        }

        $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', ['id_diagnosa' => $id], '');
        if (!$data['diagnosa']) {
            show_404();
        }

        $title['title'] = 'Edit Diagnosa';
        $this->load->view('partials/menu',$title);
        $this->load->view('diagnosa/edit', $data);
        $this->load->view('partials/footer');
    }

    public function laporanDiagnosa()
    {
        $title= array('title' => 'Laporan Diagnosa');
        
        $data['laporandiagnosa'] = $this->MainModel->getData('*', 'getlaporandiagnosa', '', '', ['nama', 'ASC']);
        // $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
        $this->load->view('partials/menu', $title);
        $this->load->view('diagnosa/laporan-diagnosa', $data);
        $this->load->view('partials/footer');
    }

}
    
