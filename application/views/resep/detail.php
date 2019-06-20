<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <h5>Detail Resep</h5>
                    </div>
                    <div class="col-2 ml-auto">
                      <a href="<?= base_url(). 'resep' ?>">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
                      </a>
                    </div>
                  </div>
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
                    <div class="row">
                      <div class="col-4 mb-3">
                        <h6>Nomor Antrian&ensp;:&ensp;<?= $keterangan[0]['nomor'] ?></h6>
                      </div>
                      <div class="col-4 mb-3">
                        <h6>Nama Pasien&ensp;:&ensp;<?= $keterangan[0]['nama'] ?></h6>
                      </div>
                      <div class="col-4 mb-3">
                        <h6>Usia : <?= $keterangan[0]['usia'] ?></h6>
                      </div>
                      <div class="col-4 mb-3">
                        <h6>Keluhan&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; :&ensp;<?= $keterangan[0]['keluhan'] ?></h6>
                      </div>
                      <div class="col-4 mb-3">
                        <h6>Perawat&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&ensp;<?= $keterangan[0]['nm_dokter'] ?></h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <hr>
                      </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Obat</th>
                                  <th>Jumlah</th>
                                  <th>Satuan</th>
                                  <th>Dosis</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 0;
                                foreach ($detailResep as $key => $value) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td><?= $value['jumlah'] ?></td>
                                    <td><?= $value['satuan'] ?></td>
                                    <td><?= $value['dosis1'].' X '.$value['dosis2'] ?></td> 
                                </tr>
                            <?php
                                } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-2">
                        <a href="<?= base_url().'resep/done/'.$keterangan[0]['id_resep'].'/'.$keterangan[0]['id_antrian'] ?>">
                          <button class="btn btn-primary btn-sw"><i class="mdi mdi-check"></i> Selesai</button>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>