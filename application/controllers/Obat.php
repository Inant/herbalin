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
            $title = array('title' => 'Obat');
            $data['obat'] = $this->db->query("SELECT o.*, s.satuan, k.kategori, u.nama as nama_user FROM obat o INNER JOIN satuan_obat s ON s.id_satuan = o.id_satuan INNER JOIN kategori_obat k ON k.id_kategori = o.id_kategori INNER JOIN user u ON o.id_user = u.id_user")->result_array();
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
            ['field' => 'status',
            'label' => 'Status',
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
            'rules' => 'trim|numeric'
        ],
        [
            'field' => 'tgl_kadaluarsa',
            'label' => 'Tanggal Kadaluarsa',
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

        $data['satuan'] = $this->MainModel->getData('*', 'satuan_obat', '', ['status' => 'Aktif'], ['satuan', 'ASC']);
        $data['kategori'] = $this->MainModel->getData('*', 'kategori_obat', '', ['status' => 'Aktif'], ['kategori', 'ASC']);

        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
            'min_length' => 'Minimal {param} karakter',
            'max_length' => 'Maksimal {param} karakter',
        ));
        $validation->set_rules($this->rules());

        if ($validation->run()){
            $id_user = $this->MainModel->getData('id_user', 'user', '', ['username' => $this->session->userdata('username')], '');
            $this->data = array(
                'nama' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_satuan' => $this->input->post('id_satuan'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stock' => $this->input->post('stock'),
                'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
                'id_user' => $id_user[0]['id_user'],
                'status' => $this->input->post('status'),
            );

            $this->MainModel->insert('obat', $this->data);
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
            redirect(base_url(). 'obat/create');

        }
        $this->load->view('partials/menu', $title);
        $this->load->view('obat/create', $data);
        $this->load->view('partials/footer');

    }

    public function edit($id=null)
    {
        if (!isset($id)) {
            redirect(base_url(). 'obat');
        }

        $title = array('title' => 'Edit Obat');

        $data['satuan'] = $this->MainModel->getData('*', 'satuan_obat', '', ['status' => 'Aktif'], ['satuan', 'ASC']);
        $data['kategori'] = $this->MainModel->getData('*', 'kategori_obat', '', ['status' => 'Aktif'], ['kategori', 'ASC']);
        $data['obat'] = $this->MainModel->getData('*', 'obat', '', ['id_obat' => $id], '');

        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
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
                'status' => $this->input->post('status'),
            );
            $this->MainModel->update('obat', $this->obat, ['id_obat' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
        }

        if (!$data['obat']) {
            show_404();
        }

        $title['$title'] = 'Edit Obat';
        $this->load->view('partials/menu', $title);
        $this->load->view('obat/edit', $data);
        $this->load->view('partials/footer');
    }

    public function kadaluarsa()
    {
        $title= array('title' => 'Obat Kadaluarsa');
        
        $data['obat_kadaluarsa'] = $this->MainModel->getData('*', 'getobatkadaluarsa', '', '', ['nama', 'ASC']);
        // $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
        $this->load->view('partials/menu', $title);
        $this->load->view('obat/obat-kadaluarsa', $data);
        $this->load->view('partials/footer');
    }
 }