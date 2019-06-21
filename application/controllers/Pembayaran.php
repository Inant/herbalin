<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Pembayaran extends CI_Controller
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
        $title = array('title' => 'Antrian Pembayaran');
        $data['antrianPembayaran'] = $this->db->query("SELECT a.*,a.status as antrian_status, p.*,pm.id_pemeriksaan, u.nama as nm_dokter FROM antrian a JOIN pasien p ON a.id_pasien = p.id_pasien JOIN pemeriksaan pm ON pm.id_antrian = a.id_antrian JOIN user u ON pm.id_user = u.id_user WHERE a.status = 'Proses Pembayaran' ORDER BY a.nomor ASC")->result_array();
        $this->load->view('partials/menu', $title);
        $this->load->view('pembayaran/list', $data);
        $this->load->view('partials/footer');
    }

    public function proses($id=null)
    {
      if (!isset($id)) {
        redirect(base_url(). 'pembayaran');
      }
      $title = array('title' => 'Detail Resep');
      $data['keterangan'] = $this->db->query("SELECT DISTINCT a.*, p.nama,YEAR(CURDATE()) - YEAR(p.tgl_lahir) as usia, pm.id_pemeriksaan, r.*, u.nama as nm_dokter FROM antrian a JOIN pasien p ON a.id_pasien = p.id_pasien JOIN pemeriksaan pm ON pm.id_antrian = a.id_antrian JOIN resep r ON r.id_pemeriksaan = pm.id_pemeriksaan JOIN user u ON pm.id_user = u.id_user WHERE r.id_resep = '$id' ORDER BY a.nomor ASC")->result_array();
      
      $data['detailResep'] = $this->db->query("SELECT DISTINCT r.*, o.nama, dt.*, s.satuan FROM resep r JOIN detail_resep dt ON r.id_resep = dt.id_resep JOIN obat o ON dt.id_obat = o.id_obat JOIN satuan_obat s ON s.id_satuan = o.id_satuan WHERE r.id_resep = '$id' ORDER BY o.nama ASC")->result_array();
      $this->load->view('partials/menu', $title);
      $this->load->view('resep/detail', $data);
      $this->load->view('partials/footer');
    }

    public function done($id_resep = null, $id_antrian = null)
    {
      $this->status = array('status' => 'Proses Pembayaran');
      $this->MainModel->update('antrian', $this->status, ['id_antrian' => $id_antrian]);
      
      redirect(base_url().'resep');
      
    }

}
