<?php
defined('BASEPATH') or exit('No direct script access allowes')

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
        $time = date('Y-m-d');
        $title = array('title' => 'Antrian');
        $data['antrian'] = $this->MainModel->getData('antrian.*, pasien.nama, pasien.gender, pasien.alamat, pasien.tgl_lahir, YEAR(CURDATE()) - YEAR(tgl_lahir) as usia', 'antrian', ['pasien', 'antrian.id_pasien = pasien.id_pasien'], "waktu BETWEEN '$time 00:00:00' AND '$time 23:59:59' AND antrian.status = 'Mengantri' ", '');
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
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $waktu = date('Y-m-d H:i:s');
        $title = array('title' => 'Tambah Antrian');

        $data['pasien'] = $this->MainModel->getData('id_pasien, nama', 'pasien', '', '', '');
        $nomor = $this->db->query("SELECT MAX(nomor) +1 AS nomor FROM antrian WHERE waktu BETWEEN '$date 00:00:00' AND '$date 23:59:59'")->result_array();

        if ($nomor[0]['nomor'] == 0) {
            $nomor[0]['nomor'] += 1;
        }

        $data['nomor'] = $nomor[0]['nomor'];

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
                'waktu' => $waktu
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
            redirect(base_url(). 'antrian');
        }
        $data['pasien'] = $this->MainModel->getData('id_pasien, nama', 'pasien', '', '', '');
        $validation = $this->form_validation;
        $validation = $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));

        $validation->set_rules($this->edit_rules());

        if ($validation->run()) {

            $this->data = array(
                'id_pasien' => $this->input->post('id_pasien'),
                'keluhan' => $this->input->post('keluhan'),
            );

            $this->MainModel->update('antrian', $this->data, ['id_antrian' => $id]);
            $this->session->set_flashdata('success', 'Berhasil diperbarui');
            // echo "<pre>";
            // print_r ($this->user);
            // echo "</pre>";
            
        }

        $data['antrian'] = $this->MainModel->getData('antrian.*, pasien.nama, pasien.alamat, pasien.tgl_lahir', 'antrian', ['pasien', 'antrian.id_pasien = pasien.id_pasien'], ['id_antrian' => $id], '');
        if (!$data['antrian']) {
            show_404();
        }

        $title['title'] = 'Edit User';
        $this->load->view('partials/menu',$title);
        $this->load->view('antrian/edit', $data);
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
