<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-2">
                <h5>Edit Obat</h5>
              </div>
              <div class="col-2 ml-auto">
                <a href="<?= base_url(). 'obat' ?>">
                  <button class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
                </a>
              </div>
            </div>
            <br>
            <?php
                if ($this->session->flashdata('success')) {             
                  echo "<div class='alert alert-success' role='alert'>".$this->session->flashdata('success')."</div> ";
                }
              ?>
               <form action="<?= base_url(). 'obat/edit/'.$obat[0]['id_obat'] ?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Nama" value="<?= set_value('nama') ? set_value('nama') : $obat[0]['nama'] ?>">
                  <div class="invalid-feedback">
                      <?= form_error('nama') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
            <label for="">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control <?= form_error('id_kategori') ? 'is-invalid' : '' ?>">
              <option value="">--Pilih Kategori--</option>
              <?php
              foreach ($kategori as $key => $value) {
              ?>
                <option value="<?= $value['id_kategori'] ?>"<?= $obat[0]['id_kategori'] == $value['id_kategori'] ? 'selected' : '' ?>><?= $value['kategori'] ?></option>
              <?php
              }
              ?>  
            </select>
            <div class="invalid-feedback">
                <?= form_error('id_kategori')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Satuan</label>
            <select name="id_satuan" id="id_satuan" class="form-control <?= form_error('id_satuan') ? 'is-invalid' : '' ?>">
              <option value="">--Pilih Satuan--</option>
              <?php
              foreach ($satuan as $key => $value) {
              ?>
                <option value="<?= $value['id_satuan'] ?>"<?= $obat[0]['id_satuan'] == $value['id_satuan'] ? 'selected' : '' ?>><?= $value['satuan'] ?></option>
              <?php
              }
              ?>  
            </select>
            <div class="invalid-feedback">
                <?= form_error('id_satuan')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Harga Jual</label>
            <input type="number" name="harga_jual" id="satuan" class="form-control <?= form_error('harga_jual') ? 'is-invalid': ''?>"
            placeholder="Harga Jual" value="<?= set_value('harga_jual') ? set_value('harga_jual') : $obat[0]['harga_jual'] ?>">
            <div class="invalid-feedback">
                <?= form_error('harga_jual')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control <?= form_error('stock') ? 'is-invalid': ''?>"
            placeholder="Stock" value="<?= set_value('stock') ? set_value('stock') : $obat[0]['stock'] ?>">
            <div class="invalid-feedback">
                <?= form_error('stock')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Tanggal Kadaluarsa</label>
            <input type="date" name="tgl_kadaluarsa" id="tgl_kadaluarsa" class="form-control <?= form_error('tgl_kadaluarsa') ? 'is-invalid': ''?>"
            placeholder="Tanggal Kadaluarsa" value="<?= set_value('tgl_kadaluarsa') ? set_value('tgl_kadaluarsa') : $obat[0]['tgl_kadaluarsa'] ?>">
            <div class="invalid-feedback">
                <?= form_error('tgl_kadaluarsa')?>
            </div>
            </div>
            <div class="col-6 mb-3">
                    <!-- <div class="form-group row"> -->
                  <label class="">Status</label>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-radio">
                        <label name="status" id="status" class="form-check-label">
                            <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Aktif" <?= $obat[0]['status'] == 'Aktif' ? 'checked' : '' ?>> Aktif
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Non Aktif"  <?= $obat[0]['status'] == 'Non Aktif' ? 'checked' : '' ?>> Non Aktif
                        </label>
                      </div>
                    </div>
                  </div>
                    <!-- </div> -->
                  <div class="invalid-feedback">
                    <?= form_error('status') ?>
                  </div>
                </div>
                <div class="col-6 mb-3"></div>
                <div class="col-6">
                  <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Simpan</button>
                  <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

                