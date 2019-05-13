<?php  
defined('BASEPATH') or exit('No direct script access allowes');

class Kategori extends CI_Controller{


    public function index()
    {
        $title = array('title' => 'kategori Obat');
        $data['kategori'] = $this->MainModel->getData('*', 'kategori_obat', '', '', '');
        $this->load->view('partials/menu', $title);
        $this->load->view('kategori/List', $data);
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

    public function tambah()
    {
        $title = array('title' => 'Tambah Kategori');
        $validation = $this->form_validation;
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
            redirect(base_url(). 'kategori/tambah');

        }
        else{
            // $this->session->flashdata('error', 'Gagal disimpan');
            // redirect(base_url(). 'user/create');
        }

        $this->load->view('partials/menu',$title);
        $this->load->view('kategori/tambah');
        $this->load->view('partials/footer');
    }

}

?>