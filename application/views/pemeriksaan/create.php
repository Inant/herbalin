<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-2">
                <h5>Pemeriksaan</h5>
              </div>
              <div class="col-2 ml-auto">
                <a href="<?= base_url(). 'riwayat/'.$pemeriksaan[0]['id_pasien'] ?>">
                  <button class="btn btn-success btn-sm"><i class="mdi mdi-history"></i> Lihat Riwayat</button>
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
            <form id="form" action="<?= base_url(). 'pemeriksaan/create/'.$pemeriksaan[0]['id_antrian'].'/'.$pemeriksaan[0]['id_pasien'] ?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-4 mb-2">
                  <label for="">Nomor Antrian</label>
                  <input type="number" name="" id="" class="form-control" value="<?= $pemeriksaan[0]['nomor'] ?>" readonly>
                </div>

                <div class="col-4 mb-2">
                  <label for="">Nama Pasien</label>
                  <input type="text" name="" id="" class="form-control" value="<?= $pemeriksaan[0]['nama'] ?>" readonly>
                </div>

                <div class="col-4 mb-2">
                  <label for="">Gender</label>
                  <input type="text" name="" id="" class="form-control" value="<?= $pemeriksaan[0]['gender'] ?>" readonly>
                </div>

                <div class="col-4 mb-2">
                  <label for="">Usia</label>
                  <input type="text" name="" id="" class="form-control" value="<?= $pemeriksaan[0]['usia'] ?> tahun" readonly>
                </div>

                <div class="col-4 mb-2">
                  <label for="">Alamat</label>
                  <input type="text" name="" id="" class="form-control" value="<?= $pemeriksaan[0]['alamat'] ?>" readonly>
                </div>

                <div class="col-4 mb-2">
                  <label for="">Jumlah Kunjungan</label>
                  <input type="text" name="" id="" class="form-control" value="<?= $jmlKunjungan[0]['jmlKunjungan'] ?> kali" readonly>
                </div>

                <div class="col-12">
                  <hr>
                </div>

                <div class="col-6 mb-3">
                  <label for="">Pemeriksaan</label>
                  <input type="text" name="pemeriksaan" id="pemeriksaan" class="form-control <?= form_error('pemeriksaan') ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan">
                  <div class="invalid-feedback">
                    <?= form_error('pemeriksaan') ?>
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <label for="">Tensi</label>
                  <div class="row">
                    <div class="col-5">
                      <input type="number" name="tensi1" id="tensi1" class="form-control <?= form_error('tensi1') ? 'is-invalid' : '' ?>" placeholder="Tensi">
                    </div>
                    /
                    <div class="col-5">
                      <input type="number" name="tensi2" id="tensi2" class="form-control <?= form_error('tensi2') ? 'is-invalid' : '' ?>" placeholder="Tensi">
                    </div>
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <label for="">Suhu Badan</label>
                  <input type="number" name="suhu_badan" id="suhu_badan" class="form-control <?= form_error('suhu_badan') ? 'is-invalid' : '' ?>" placeholder="Suhu Badan">
                </div>
                
                <div class="col-6 mb-3">
                  <label for="">Keluhan</label>
                  <textarea name="keluhan" id="keluhan" class="form-control"><?= $pemeriksaan[0]['keluhan'] ?></textarea>
                </div>

                <div class="col-6 mb-3">
                  <label for="">Diagnosa</label>
                  <div class="row" id="diagnosa">
                    <div class="col-10 mb-2">
                      <select name="id_diagnosa[]" id="id_diagnosa" class="form-control selectTwo">
                        <option value="">-- Pilih Diagnosa --</option>
                        <?php
                        foreach ($diagnosa as $key => $value) {
                        ?>
                        <option value="<?= $value['id_diagnosa'] ?>"><?= $value['nama'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-1 mb-2">
                      <button id="addDiagnosa" type="button" class="btn btn-info btn-sm" > &nbsp;<i class="fa fa-plus-circle"></i></button>
                    </div>
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <label for="">Tindakan</label>
                  <div class="row" id="tindakan">
                    <div class="col-10 mb-2">
                      <select name="id_pelayanan[]" id="id_pelayanan" class="form-control selectTwo">
                        <option value="">-- Pilih Tindakan --</option>
                        <?php
                        foreach ($pelayanan as $key => $value) {
                        ?>
                        <option value="<?= $value['id_pelayanan'] ?>"><?= $value['nama'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-1 mb-2">
                      <button id="addTindakan" type="button" class="btn btn-info btn-sm" > &nbsp;<i class="fa fa-plus-circle"></i></button>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                    <hr>
                </div>
                
              </div>

              <div class="row">
                <div class="col-3">
                  <h5>Resep</h5>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="row" id="rowObat">
                    <div class="col-3 mb-3">
                      <label for="">Obat</label>
                      <select name="id_obat[]" id="id_obat" class="form-control selectTwo">
                        <option value="">-- Pilih Obat --</option>
                        <?php
                        foreach ($obat as $key => $value) {
                        ?>
                        <option value="<?= $value['id_obat'] ?>"><?= $value['nama'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>

                    <div class="col-3 mb-3">
                      <label for="">Satuan</label>
                      <input type="text" name="satuan[]" id="satuan" class="form-control" readonly>
                    </div>

                    <div class="col-2 mb-3">
                      <label for="">Jumlah</label>
                      <input type="number" name="jumlah[]" id="jumlah" class="form-control">
                    </div>

                    <div class="col-3 mb-3">
                      <label for="">Dosis</label>
                      <div class="row">
                        <div class="col-5">
                          <input type="number" name="dosis1[]" id="dosis1" class="form-control">
                        </div>
                        X
                        <div class="col-5">
                          <input type="number" name="dosis2[]" id="dosis2" class="form-control">
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-1 mb-3">
                      <button id="addObat" type="button" class="btn btn-info btn-sm" style="margin-top:30px" > &nbsp;<i class="fa fa-plus-circle"></i></button>
                    </div>
                  </div>
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