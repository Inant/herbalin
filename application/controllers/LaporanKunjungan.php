<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKunjungan extends CI_Controller
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
        
        $title= array('title' => 'Laporan Kunjungan');
        $where = "";
        if (!empty($_GET['dari']) && !empty($_GET['sampai'])) {
          $where = "waktu BETWEEN '$_GET[dari] 00:00:00' AND '$_GET[sampai] 23:59:59'";
        }
        // elseif (isset($_GET['dari']) && isset($_GET['sampai']) && isset($_GET['diagnosa'])) {
        //   $where = "waktu BETWEEN '$_GET[dari] 00:00:00' AND '$_GET[sampai] 23:59:59' AND ";
        // }
        $data['kunjungan'] = $this->MainModel->getData('*', 'getallkunjungan', '', $where, ['waktu', 'DESC']);
        // $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
        $this->load->view('partials/menu', $title);
        $this->load->view('laporan-kunjungan/semua-kunjungan', $data);
        $this->load->view('partials/footer');
    }

    public function perhari()
    {
        $title= array('title' => 'Laporan Kunjungan Perhari');
        $date = date('Y-m-d');
        
        $where = "waktu BETWEEN '$date 00:00:00' AND '$date 23:59:59'";
        
        // elseif (isset($_GET['dari']) && isset($_GET['sampai']) && isset($_GET['diagnosa'])) {
        //   $where = "waktu BETWEEN '$_GET[dari] 00:00:00' AND '$_GET[sampai] 23:59:59' AND ";
        // }
        $data['kunjungan'] = $this->MainModel->getData('*', 'getallkunjungan', '', $where, ['waktu', 'DESC']);
        // $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
        $this->load->view('partials/menu', $title);
        $this->load->view('laporan-kunjungan/kunjungan-perhari', $data);
        $this->load->view('partials/footer');
    }

    public function perbulan()
    {
        $title= array('title' => 'Laporan Kunjungan Perbulan');
        $date = date('m');
        
        $where = "MONTH(waktu) = '$date'";
        
        // elseif (isset($_GET['dari']) && isset($_GET['sampai']) && isset($_GET['diagnosa'])) {
        //   $where = "waktu BETWEEN '$_GET[dari] 00:00:00' AND '$_GET[sampai] 23:59:59' AND ";
        // }
        $data['kunjungan'] = $this->MainModel->getData('*', 'getallkunjungan', '', $where, ['waktu', 'DESC']);
        // $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
        $this->load->view('partials/menu', $title);
        $this->load->view('laporan-kunjungan/kunjungan-perbulan', $data);
        $this->load->view('partials/footer');
    }

    public function printAll()
    {
        $title= array('title' => 'Cetak Laporan Kunjungan');

        $where = "";
        if (!empty($_GET['dari']) && !empty($_GET['sampai'])) {
          $where = "waktu BETWEEN '$_GET[dari] 00:00:00' AND '$_GET[sampai] 23:59:59'";
        }
        
        $data['kunjungan'] = $this->MainModel->getData('*', 'getallkunjungan', '', $where, ['waktu', 'DESC']);
        // $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
        $this->load->view('laporan-kunjungan/print-all', $data);
    }

}