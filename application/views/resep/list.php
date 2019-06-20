<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Antrian Resep Hari Ini</h5>
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
                                  <th>Nama</th>
                                  <th>Usia</th>
                                  <th>Gender</th>
                                  <th>Alamat</th>
                                  <th>Keluhan</th>
                                  <th>Perawat</th>
                                  <th>Status</th>
                                  <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // $no = 0;
                                foreach ($antrianResep as $key => $value) {
                                    // $no++;
                                    $statusClass = $value['antrian_status'] == 'Menunggu Obat' ? 'badge badge-success' : 'badge badge-danger';
                                    // $waktu = date('d-m-Y H:i:s', strtotime($key['waktu']));
                            ?>
                                <tr>
                                    <td><?= $value['nomor'] ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td><?= $value['usia'].' tahun' ?></td>
                                    <td><?= $value['gender'] ?></td>
                                    <td><?= $value['alamat'] ?></td>
                                    <td><?= $value['keluhan'] ?></td>
                                    <td><?= $value['nm_dokter'] ?></td>
                                    <td><span class="<?= $statusClass ?>"><?= $value['antrian_status'] ?></span></td>
                                    <td>
                                        <!-- <a href="<?php // base_url(). 'antrian/edit/'.$key['id_antrian'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a> -->
                                        <a href="<?= base_url().'resep/detail/'.$value['id_resep'] ?>"><button class="btn btn-info btn-sm"> Detail </button></a>
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