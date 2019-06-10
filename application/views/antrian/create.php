<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-2">
                <h5>Tambah User</h5>
              </div>
              <div class="col-2 ml-auto">
                <a href="<?= base_url(). 'user/' ?>">
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
            <form action="<?= base_url(). 'antrian/create' ?>" enctype="multipart/form-data" method="POST">
              <div class="row">

                <div class="col-6 mb-3">
                  <label for="">Nama Pasien</label>
                  <select name="id_pasien" id="id_pasien" class="form-control selectTwo <?= form_error('id_pasien') ? 'is-invalid' : '' ?> ">
                    <option value="">-- Pilih Pasien --</option>
                    <?php
                    foreach ($pasien as $key => $value) {
                      echo"
                      <option value='$value[id_pasien]'> $value[nama] </option>
                      ";
                    }
                    ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= form_error('id_pasien') ?>
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <label for="">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" readonly>
                </div>

                <div class="col-6 mb-3">
                  <label for="">Tanggal Lahir</label>
                  <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" readonly>
                </div>
                
                <div class="col-6 mb-3">
                  <label for="">Keluhan</label>
                  <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
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