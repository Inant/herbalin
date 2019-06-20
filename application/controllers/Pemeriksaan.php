<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Pemeriksaan extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('haslogin') != 'true') {
            $this->session->set_flashdata('error', 'Anda harus login dulu !');
            redirect(base_url('login'));
        }
    }

    // public function index()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $time = date('Y-m-d');
    //     $title = array('title' => 'Antrian');
    //     $data['antrian'] = $this->MainModel->getData('antrian.*, pasien.nama, pasien.gender, pasien.alamat, pasien.tgl_lahir, YEAR(CURDATE()) - YEAR(tgl_lahir) as usia', 'antrian', ['pasien', 'antrian.id_pasien = pasien.id_pasien'], "waktu BETWEEN '$time 00:00:00' AND '$time 23:59:59' AND antrian.status = 'Mengantri' ", '');
    //     $this->load->view('partials/menu', $title);
    //     $this->load->view('antrian/list', $data);
    //     $this->load->view('partials/footer');
    // }
    private function rules(){
        return [
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
            'field' => 'keluhan',
            'label' => 'Keluhan',
            'rules' => 'required|trim'
          ]
        ];
    }

    public function create($id = null, $id_pasien = null)
    {
        if (!isset($id)) {
          redirect(base_url(). 'antrian');
        }
        if (!isset($id_pasien)) {
          redirect(base_url(). 'antrian');
        }

        $title = array('title' => 'Pemeriksaan');

        $validation = $this->form_validation;
        $validation->set_message(array(
            'required' => 'Tidak boleh kosong.',
        ));
        $validation->set_rules($this->rules());

        $this->status = array('status' => 'Diperiksa');
        $this->MainModel->update('antrian', $this->status, ['id_antrian' => $id]);

        $data['pemeriksaan'] = $this->MainModel->getData('p.nama, YEAR(CURDATE()) - YEAR(p.tgl_lahir) as usia, p.gender, p.alamat, a.*', 'antrian a', ['pasien p', 'p.id_pasien = a.id_pasien'], ['id_antrian' => $id], '');

        $data['jmlKunjungan'] = $this->MainModel->getData('COUNT(id_pasien) as jmlKunjungan', 'antrian', '', ['id_pasien' => $id_pasien], '');
        
        $data['diagnosa'] = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
        $data['pelayanan'] = $this->MainModel->getData('*', 'pelayanan', '', '', ['nama', 'ASC']);
        $data['obat'] = $this->MainModel->getData('*', 'obat', '', '', ['nama', 'ASC']);

        if ($validation->run()) {
            $this->pemeriksaan = array(
                'id_antrian' => $id,
                'id_user' => $this->session->userdata('id_user'),
                'pemeriksaan' => $this->input->post('pemeriksaan'),
                'tensi' => $this->input->post('tensi1').'/'.$this->input->post('tensi2'),
                'suhu_badan' => $this->input->post('suhu_badan'),
            );
            $this->MainModel->insert('pemeriksaan', $this->pemeriksaan);

            $id_pemeriksaan = $this->MainModel->getData("MAX(id_pemeriksaan) as id", 'pemeriksaan', '', '', '');
            if ($id_pemeriksaan[0]['id'] == 0) {
              $id_pemeriksaan[0]['id'] = 1;
            }

            $this->resep = array(
              'id_pemeriksaan' => $id_pemeriksaan[0]['id']
            );
            $this->MainModel->insert('resep', $this->resep);

            $id_resep = $this->MainModel->getData("MAX(id_resep) as id", 'resep', '', '', '');
            if ($id_resep[0]['id'] == 0) {
              $id_resep[0]['id'] = 1;
            }

            foreach ($_POST['id_pelayanan'] as $key => $value) {
              $getHarga = $this->MainModel->getData('harga', 'pelayanan', '', ['id_pelayanan' => $_POST['id_pelayanan'][$key]], '');
              $this->tindakan = array(
                'id_pemeriksaan' => $id_pemeriksaan[0]['id'],
                'id_pelayanan' => $_POST['id_pelayanan'][$key],
                'subtotal' => $getHarga[0]['harga'],
              );
              $this->MainModel->insert('tindakan', $this->tindakan);
            }

            foreach ($_POST['id_diagnosa'] as $key => $value) {
              $this->diagnosa = array(
                'id_pemeriksaan' => $id_pemeriksaan[0]['id'],
                'id_diagnosa' => $_POST['id_diagnosa'][$key],
              );
              $this->MainModel->insert('detail_diagnosa', $this->diagnosa);
            }

            foreach ($_POST['id_obat'] as $key => $value) {
              $getHarga = $this->MainModel->getData('harga_jual', 'obat', '', ['id_obat' => $_POST['id_obat'][$key]], '');
              $this->obat = array(
                'id_resep' => $id_resep[0]['id'],
                'id_obat' => $_POST['id_obat'][$key],
                'dosis1' => $_POST['dosis1'][$key],
                'dosis2' => $_POST['dosis2'][$key],
                'jumlah' => $_POST['jumlah'][$key],
                'subtotal' => $getHarga[0]['harga_jual'],
              );
              $this->MainModel->insert('detail_resep', $this->obat);
            }

            $getHargaResep = $this->MainModel->getData('SUM(subtotal) as subtotal', 'detail_resep', '' , ['id_resep' => $id_resep[0]['id']], '');
            $this->hargaResep = array(
              'harga_resep' => $getHargaResep[0]['subtotal']
            );
            $this->MainModel->update('resep', $this->hargaResep, ['id_resep' => $id_resep[0]['id']]);

            $this->status = array('status' => 'Menunggu Obat');
            $this->MainModel->update('antrian', $this->status, ['id_antrian' => $id]);
            
            $this->session->set_flashdata('success', 'Pasien telah diperiksa');
            redirect(base_url(). 'antrian/');

        }
        else{
            // $this->session->flashdata('error', 'Gagal disimpan');
            // redirect(base_url(). 'user/create');
        }

        $this->load->view('partials/menu',$title);
        $this->load->view('pemeriksaan/create', $data);
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

    public function getPelayanan()
    {
      $pelayanan = $this->MainModel->getData('*', 'pelayanan', '', '', ['nama', 'ASC']);
      print(json_encode($pelayanan));
      return json_encode($pelayanan);
    }

    public function getDiagnosa()
    {
      $diagnosa = $this->MainModel->getData('*', 'diagnosa', '', '', ['nama', 'ASC']);
      print(json_encode($diagnosa));
      return json_encode($diagnosa);
    }

    public function getObat()
    {
      $obat = $this->MainModel->getData('o.id_obat, o.nama, s.satuan', 'obat o', ['satuan_obat s', 'o.id_satuan = s.id_satuan'], 'id_obat IS NOT NULL', ['nama', 'ASC']);
      print(json_encode($obat));
      return json_encode($obat);
    }

    public function getSatuanObat($id=null)
    {
      $satuan = $this->MainModel->getData('satuan', 'satuan_obat s', ['obat o', 'o.id_satuan = s.id_satuan'], ['o.id_obat' => $id], '');
      print(json_encode($satuan));
      return json_encode($satuan);
    }

}
