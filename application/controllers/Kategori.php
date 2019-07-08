<?php 
defined('BASEPATH') or exit('No direct script access allowes');

class Kategori extends CI_Controller
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
        $title = array('title' => 'Kategori');
        $where="";
        if (!empty($_GET['keyword'])) {
            $where = "kategori LIKE '%$_GET[keyword]%'";
        }
        $data['kategori'] = $this->MainModel->getData('*', 'kategori_obat', '', $where, '');
        $this->load->view('partials/menu', $title);
        $this->load->view('kategori/list', $data);
        $this->load->view('partials/footer');
    }
    private function rules(){
        return [
            [
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'required|trim'
            ],
        ];
    }
    private function edit_rules(){
        return [
            [
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'required|trim'
            ],
        ];
    }
    public function create()
    {
        $title = array('title' => 'Tambah kategori');
        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
            'min_length' => 'Minimal {param} karakter',
            'max_length' => 'Maksimal {param} karakter',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()) {
            
            
            $this->data = array(
                'kategori' => $this->input->post('kategori'),
                'status' => $this->input->post('status'),
            );

            // echo "<pre>";
            // print_r ($this->input);
            // echo "</pre>";
            $this->MainModel->insert('kategori_obat', $this->data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url(). 'kategori/create');

        }
        else{
            // $this->session->flashdata('error', 'Gagal disimpan');
            // redirect(base_url(). 'user/create');
        }

        $this->load->view('partials/menu',$title);
        $this->load->view('kategori/create');
        $this->load->view('partials/footer');
    }
    public function edit($id = null)
    {
        if (!isset($id)) {
            redirect(base_url(). 'kategori');
        }

        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
            'min_length' => 'Minimal {param} karakter',
            'max_length' => 'Maksimal {param} karakter',
        ));

        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {

            $this->kategori = array(
                'kategori' => $this->input->post('kategori'),
                'status' => $this->input->post('status'),
            );

            $this->MainModel->update('kategori_obat', $this->kategori, ['id_kategori' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
            // echo "<pre>";
            // print_r ($this->);
            // echo "</pre>";
            
        }

        $data['kategori'] = $this->MainModel->getData('*', 'kategori_obat', '', ['id_kategori' => $id], '');
        if (!$data['kategori']) {
            show_404();
        }

        $title['title'] = 'Edit Kategori';
        $this->load->view('partials/menu',$title);
        $this->load->view('kategori/edit', $data);
        $this->load->view('partials/footer');
        
    }
}

?>