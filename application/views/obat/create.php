<div class="content-wrapper">
  <div class="row">
   <div class="col-12 grid-margin stretch-card"> 
    <div class="card">
     <div class="card-body">
        <div class="row">
         <div class="col-2">
           <h5>Tambah  Obat</h5>
         </div>
         <div class="col-2 ml-auto">
           <a href="<?= base_url(). 'obat/' ?>">
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
         <form action="<?= base_url(). 'obat/create '?>" enctype="multipart/form-data" method="POST">
        <div class="row">
          <div class="col-6 mb-3">
            <label for="">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid': ''?>"
            placeholder="Nama" value="<?= set_value('nama') ?>">
            <div class="invalid-feedback">
                <?= form_error('nama')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Id Kategori</label>
            <input type="text" name="id_kategori" id="id_kategori" class="form-control <?= form_error('id_kategori') ? 'is-invalid': ''?>"
            placeholder="Id Kategori" value="<?= set_value('id_kategori') ?>">
            <div class="invalid-feedback">
                <?= form_error('id_kategori')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Id Satuan</label>
            <input type="text" name="id_satuan" id="id_satuan" class="form-control <?= form_error('id_satuan') ? 'is-invalid': ''?>"
            placeholder="Id Satuan" value="<?= set_value('id_satuan') ?>">
            <div class="invalid-feedback">
                <?= form_error('id_satuan')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Harga Jual</label>
            <input type="number" name="harga_jual" id="satuan" class="form-control <?= form_error('harga_jual') ? 'is-invalid': ''?>"
            placeholder="Harga Jual" value="<?= set_value('harga_jual') ?>">
            <div class="invalid-feedback">
                <?= form_error('harga_jual')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control <?= form_error('stock') ? 'is-invalid': ''?>"
            placeholder="Stock" value="<?= set_value('stock') ?>">
            <div class="invalid-feedback">
                <?= form_error('stock')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Tanggal Kadaluarsa</label>
            <input type="date" name="tgl_kadaluarsa" id="tgl_kadaluarsa" class="form-control <?= form_error('tgl_kadaluarsa') ? 'is-invalid': ''?>"
            placeholder="Tanggal Kadaluarsa" value="<?= set_value('tgl_kadaluarsa') ?>">
            <div class="invalid-feedback">
                <?= form_error('tgl_kadaluarsa')?>
            </div>
            </div>
            <div class="col-6 mb-3">
            <label for="">Id User</label>
            <input type="text" name="id_user" id="id_user" class="form-control <?= form_error('id_user') ? 'is-invalid': ''?>"
            placeholder="Id User" value="<?= set_value('id_user') ?>">
            <div class="invalid-feedback">
                <?= form_error('id_user')?>
            </div>
            </div>
            <div class="col-6 mb-3">
                    <!-- <div class="form-group row"> -->
                  <label class="">Status</label>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-radio">
                        <label name="status" id="status" class="form-check-label">
                            <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Aktif" checked> Aktif
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Non Aktif"> Non Aktif
                        </label>
                      </div>
                    </div>
                  </div>
                    <!-- </div> -->
                  <div class="invalid-feedback">
                    <?= form_error('status') ?>
                  </div>
                </div>
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
