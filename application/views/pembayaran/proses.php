<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-2">
                <h5>Pembayaran</h5>
              </div>
              <div class="col-2 ml-auto">
                <a href="<?= base_url(). 'pembayaran/'?>">
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
            <form id="formBayar" action="<?= base_url(). 'pembayaran/proses/'.$keterangan[0]['id_antrian']?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-6 mb-2">
                  <label for="">Nomor Antrian</label>
                  <input type="number" name="" id="" class="form-control" value="<?= $keterangan[0]['nomor'] ?>" readonly>
                </div>

                <div class="col-6 mb-2">
                  <label for="">Nama Pasien</label>
                  <input type="text" name="" id="" class="form-control" value="<?= $keterangan[0]['nama'] ?>" readonly>
                </div>

                <div class="col-12">
                  <hr>
                </div>

                <div class="col-12 mb-3">
                  <h6>Pelayanan</h6>
                </div>

                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Pelayanan</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 0;
                        $totalPelayanan = 0;
                        foreach ($pelayanan as $key => $value) {
                          $totalPelayanan = $totalPelayanan + $value['subtotal'];
                          $no++;
                        ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $value['nama'] ?></td>
                          <td><?= $value['subtotal'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="2" style="text-align:center">Total</th>
                          <th><?= $totalPelayanan ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="col-12">
                    <hr>
                </div>
              
                <div class="col-3">
                  <h6>Obat</h6>
                </div>

                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Obat</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 0;
                        $totalObat = 0;
                        foreach ($obat as $key => $value) {
                          $totalObat = $totalObat + $value['subtotal'];
                          $no++;
                        ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $value['nama'] ?></td>
                          <td><?= $value['subtotal'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="2" style="text-align:center">Total</th>
                          <th><?= $totalObat ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="col-12">
                  <hr>
                </div>

                <div class="col-4 mb-3">  
                  <label for="">Grand Total</label>
                  <input type="number" name="total" id="total" class="form-control" value="<?= $totalPelayanan + $totalObat ?>" readonly>
                </div>
                <div class="col-4 mb-3">  
                  <label for="">Total Bayar</label>
                  <input type="number" name="bayar" id="bayar" class="form-control <?= form_error('bayar') ? 'is-invalid' : '' ?>" placeholder="Total bayar">
                  <div class="invalid-feedback">
                        <?= form_error('bayar') ?>
                  </div>
                </div>
                <div class="col-4 mb-3">  
                  <label for="">Kembalian</label>
                  <input type="number" name="kembalian" id="kembalian" class="form-control" placeholder="Kembalian" readonly>
                </div>
              </div>

              <div class="col-6">
                <button type="submit" id="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Reset</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>