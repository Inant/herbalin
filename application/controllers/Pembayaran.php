<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('haslogin') != 'true') {
            $this->session->set_flashdata('error', 'Anda harus login dulu !');
            redirect(base_url('login'));
        }
        // $this->load->library('MainLib');
    }

    public function index()
    {
        $title = array('title' => 'Antrian Pembayaran');
        $data['antrianPembayaran'] = $this->db->query("SELECT a.*,a.status as antrian_status, p.*,pm.id_pemeriksaan, u.nama as nm_dokter FROM antrian a JOIN pasien p ON a.id_pasien = p.id_pasien JOIN pemeriksaan pm ON pm.id_antrian = a.id_antrian JOIN user u ON pm.id_user = u.id_user WHERE a.status = 'Proses Pembayaran' ORDER BY a.nomor ASC")->result_array();
        $this->load->view('partials/menu', $title);
        $this->load->view('pembayaran/list', $data);
        $this->load->view('partials/footer');
    }

    private function rules()
    {
      return [
        [
          'field' => 'bayar',
          'label' => 'Total bayar',
          'rules' => 'required|greater_than[0]'
        ]
      ];
    }

    public function proses($id=null)
    {
      if (!isset($id)) {
        redirect(base_url(). 'pembayaran');
      }
      $title = array('title' => 'Pembayaran');

      $data['keterangan'] = $this->db->query("SELECT DISTINCT a.*, p.nama FROM antrian a JOIN pasien p ON a.id_pasien = p.id_pasien WHERE a.id_antrian = '$id'")->result_array();

      $data['pelayanan'] = $this->db->query("SELECT DISTINCT pl.nama, t.subtotal FROM pelayanan pl JOIN tindakan t ON t.id_pelayanan = pl.id_pelayanan JOIN pemeriksaan pm ON pm.id_pemeriksaan = t.id_pemeriksaan JOIN antrian a ON a.id_antrian = pm.id_antrian WHERE a.id_antrian = '$id'")->result_array();
      
      $data['obat'] = $this->db->query("SELECT DISTINCT o.nama, dt.subtotal FROM obat o JOIN detail_resep dt ON o.id_obat = dt.id_obat JOIN resep r ON r.id_resep = dt.id_resep JOIN pemeriksaan pm ON pm.id_pemeriksaan = r.id_pemeriksaan JOIN antrian a ON a.id_antrian = pm.id_antrian WHERE a.id_antrian = '$id'")->result_array();

      $validation = $this->form_validation;
      $validation->set_message(array(
        'required' => 'Tidak boleh kosong.',
        'greater_than' => 'Tidak boleh kurang dari {param}'
      ));
      $validation->set_rules($this->rules());
      if ($validation->run()) {

        $this->pembayaran = array(
          'id_antrian' => $id,
          'waktu' => date('Y-m-d H:i:s'),
          'grand_total' => $this->input->post('total'),
          'total_bayar' => $this->input->post('bayar'),
          'kembalian' => $this->input->post('kembalian'),
          'id_user' => $this->session->userdata('id_user')
        );

        $this->antrian = array(
          'status' => 'Selesai'
        );

        $this->MainModel->update('antrian', $this->antrian, ['id_antrian' => $id]);

        $this->MainModel->insert('pembayaran', $this->pembayaran);

        redirect(base_url().'pembayaran/print/'.$id);
      }

      $this->load->view('partials/menu', $title);
      $this->load->view('pembayaran/proses', $data);
      $this->load->view('partials/footer');
    }

    public function print($id = null)
    {
      if ($id == null) {
        redirect(base_url().'pembayaran');
      }

      $data['keterangan'] = $this->MainModel->getData("p.nama, a.nomor, pb.waktu, u.nama as nm_user", "pasien p", ['antrian a', 'a.id_pasien = p.id_pasien', 'pembayaran pb', 'a.id_antrian = pb.id_antrian', 'user u', 'pb.id_user = u.id_user'], ['a.id_antrian' => $id], "");
      
      $data['pelayanan'] = $this->db->query("SELECT DISTINCT pl.nama, t.subtotal FROM pelayanan pl JOIN tindakan t ON t.id_pelayanan = pl.id_pelayanan JOIN pemeriksaan pm ON pm.id_pemeriksaan = t.id_pemeriksaan JOIN antrian a ON a.id_antrian = pm.id_antrian WHERE a.id_antrian = '$id'")->result_array();
      
      $data['obat'] = $this->db->query("SELECT DISTINCT o.nama, dt.subtotal FROM obat o JOIN detail_resep dt ON o.id_obat = dt.id_obat JOIN resep r ON r.id_resep = dt.id_resep JOIN pemeriksaan pm ON pm.id_pemeriksaan = r.id_pemeriksaan JOIN antrian a ON a.id_antrian = pm.id_antrian WHERE a.id_antrian = '$id'")->result_array();

      $data['pembayaran'] = $this->MainModel->getData("*", 'pembayaran p ', ['antrian a', 'a.id_antrian = p.id_antrian'], ['a.id_antrian' => $id], '');

      $this->load->view('pembayaran/print', $data);
    }

}
