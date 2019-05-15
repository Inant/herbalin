    <?php
    defined('BASEPATH') or exit('No direct script access allowes');

    class Obat extends CI_controller
    {
        public function __construct(){
            parent::__construct();
            if ($this->session->userdata('haslogin') != 'true') {
                $this->session->set_flashdata('error', 'Anda harus login !');
                redirect(base_url('login'));
            }
        }

        public function index()
        {
            $title = array('title' => 'obat');
            $data['obat'] = $this->MainModel->getData('*', 'obat', '', '', '');
            $this->load->view('partials/menu', $title);
            $this->load->view('obat/list', $data);
            $this->load->view('partials/footer');
        }
        private function rules(){
            return[
             [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'id_kategori',
                'label' => 'Id Kategori',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'id_satuan',
                'label' => 'Id satuan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'harga_jual',
                'label' => 'Harga Jual',
                'rules' => 'required|trim|numeric'
            ],
            [
                'field' => 'stock',
                'label' => 'Stock',
                'rules' => 'required|trim|numeric'
            ],
            [
                'field' => 'tgl_kadaluarsa',
                'label' => 'Tanggal Kadaluarsa',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'id_user',
                'label' => 'Id User',
                'rules' => 'required|trim'
            ],
            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required|trim'
            ],
        ];
    }

    public function create()
    {
        $title = array('title' => 'Tambah Obat');
        $validation = $this->form_validation;
        $validation->set_message(array(
            'requiried' => 'Tidak Boleh Kosong.',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()){

            $this->data = array(
                'nama' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_satuan' => $this->input->post('id_satuan'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stock' => $this->input->post('stock'),
                'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                'id_user' => $this->input->post('id_user'),
                'status' => $this->input->post('status'),
            );

            $this->MainModel->insert('obat', $this->data);
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
            redirect(base_url(). 'obat/create');

        }
        $this->load->view('partials/menu', $title);
        $this->load->view('obat/create');
        $this->load->view('partials/footer');

    }

    public function edit($id=null)
    {
        if (!isset($id)) {
            redirect(base_url(). 'obat');
        }

        $validation = $this->form_validation;
        $validation = $validation->set_messagge(array(
            'required' => 'Tidak boleh kosong.',
        ));

        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {
            $this->obat =array(
                'nama' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_satuan' => $this->input->post('id_satuan'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stock' => $this->input->post('stock'),
                'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                'id_user' => $this->input->post('id_user'),
                'status' => $this->input->post('status'),
            );
            $this->MainModel->update('obat', $this->obat, ['id_obat' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
        }

        $data['obat'] = $this->MainModel->getData('*', 'obat', '', ['id_obat' => $id], '');
        if (!$data['obat']) {
            show_404();
        }

        $title['$title'] = 'Edit Obat';
        $this->load->view('partials/menu', $title);
        $this->load->view('obat/edit', $data);
        $this->load->view('partials/footer');
    }
 }