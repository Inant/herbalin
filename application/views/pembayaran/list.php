<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Antrian Pembayaran Hari Ini</h5>
                    <br>
                    <?php
                        if ($this->session->flashdata('success')) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                    <?php
                        }
                    ?>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Pasien</th>
                                  <th>Perawat</th>
                                  <th>Status</th>
                                  <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // $no = 0;
                                foreach ($antrianPembayaran as $key => $value) {
                                    // $no++;
                                    $statusClass = $value['antrian_status'] == 'Proses Pembayaran' ? 'badge badge-success' : 'badge badge-danger';
                                    // $waktu = date('d-m-Y H:i:s', strtotime($key['waktu']));
                            ?>
                                <tr>
                                    <td><?= $value['nomor'] ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td><?= $value['nm_dokter'] ?></td>
                                    <td><span class="<?= $statusClass ?>"><?= $value['antrian_status'] ?></span></td>
                                    <td>
                                        <!-- <a href="<?php // base_url(). 'antrian/edit/'.$key['id_antrian'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a> -->
                                        <a href="<?= base_url().'pembayaran/proses/'.$value['id_antrian'] ?>"><button class="btn btn-info btn-sm"> Bayar </button></a>
                                    </td>
                                </tr>
                            <?php
                                } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>