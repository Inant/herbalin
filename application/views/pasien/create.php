<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-2">
                <h5>Tambah Pasien</h5>
              </div>
              <div class="col-2 ml-auto">
                <a href="<?= base_url(). 'pasien/' ?>">
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
              <form action="<?= base_url(). 'pasien/create' ?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="">No Identitas</label>
                  <input type="text" name="no_identitas" id="no_identitas" class="form-control <?= form_error('no_identitas') ? 'is-invalid' : '' ?>" placeholder="No Identitas" value="<?= set_value('no_identitas') ?>">
                  <div class="invalid-feedback">
                      <?= form_error('no_identitas') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Nama" value="<?= set_value('nama') ?>">
                  <div class="invalid-feedback">
                      <?= form_error('nama') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">Tempat Lahir</label>
                  <input type="text" name="tmpt_lahir" id="tmpt_lahir" class="form-control <?= form_error('tmpt_lahir') ? 'is-invalid' : '' ?>" placeholder="Tempat Lahir" value="<?= set_value('tmpt_lahir') ?>">
                  <div class="invalid-feedback">
                      <?= form_error('tmpt_lahir') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : '' ?>" placeholder="Tanggal Lahir" value="<?= set_value('tgl_lahir') ?>">
                  <div class="invalid-feedback">
                      <?= form_error('tgl_lahir') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                    <!-- <div class="form-group row"> -->
                  <label class="">Gender</label>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-radio">
                        <label name="gender" id="gender" class="form-check-label">
                            <input type="radio" class="form-control <?= form_error('gender') ? 'is-invalid' : '' ?>" name="gender" id="gender" value="Laki-laki" <?= set_value('gender') == 'Laki-laki' ? 'checked' : '' ?>> Laki-Laki
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-control <?= form_error('gender') ? 'is-invalid' : '' ?>" name="gender" id="gender" value="Perempuan" <?= set_value('gender') == 'Perempuan' ? 'checked' : '' ?>> Perempuan
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="invalid-feedback">
                    <?= form_error('gender') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">Alamat</label>
                  <textarea name="alamat" id='alamat' class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat"> <?= set_value('alamat') != null ? set_value('alamat') : 'Alamat'  ?></textarea>
                  <div class="invalid-feedback">
                    <?= form_error('alamat') ?>
                  </div>   
                </div>
                <div class="col-6 mb-3">
                  <label for="">No HP</label>
                  <input type="number" name="no_hp" id="no_hp" class="form-control <?= form_error('no_hp') ? 'is-invalid' : '' ?>" placeholder="No HP" value="<?= set_value('no_hp') ?>">
                  <div class="invalid-feedback">
                      <?= form_error('no_hp') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="form-control <?= form_error('pendidikan') ? 'is-invalid' : '' ?>">
                        <option value="">--Pilih Pendidikan--</option>
                        <option value="SD" <?= set_value('pendidikan') == 'SD' ? 'selected' : '' ?> >SD</option>
                        <option value="SMP" <?= set_value('pendidikan') == 'SMP' ? 'selected' : '' ?> >SMP</option>
                        <option value="SMA" <?= set_value('pendidikan') == 'SMA' ? 'selected' : '' ?> >SMA</option>
                        <option value="D1" <?= set_value('pendidikan') == 'D1' ? 'selected' : '' ?> >D1</option>
                        <option value="D2" <?= set_value('pendidikan') == 'kasir' ? 'selected' : '' ?> >D2</option>
                        <option value="D3" <?= set_value('pendidikan') == 'D3' ? 'selected' : '' ?> >D3</option>
                        <option value="D4" <?= set_value('pendidikan') == 'D4' ? 'selected' : '' ?> >D4</option>
                        <option value="S1" <?= set_value('pendidikan') == 'S1' ? 'selected' : '' ?> >S1</option>
                        <option value="S2" <?= set_value('pendidikan') == 'S2' ? 'selected' : '' ?> >S2</option>
                        <option value="S3" <?= set_value('pendidikan') == 'S3' ? 'selected' : '' ?> >S3</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('pendidikan') ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <!-- <div class="form-group row"> -->
                  <label class="">Status Perkawinan</label>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-radio">
                        <label name="status_perkawinan" id="status_perkawinan" class="form-check-label">
                            <input type="radio" class="form-control <?= form_error('status_perkawinan') ? 'is-invalid' : '' ?>" name="status_perkawinan" id="status_perkawinan" value="Kawin" <?= set_value('status_perkawinan') == 'Kawin' ? 'checked' : '' ?>> Kawin
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-control <?= form_error('status_perkawinan') ? 'is-invalid' : '' ?>" name="status_perkawinan" id="status_perkawinan" value="Belum Kawin" <?= set_value('status_perkawinan') == 'Belum Kawin' ? 'checked' : '' ?>> Belum Kawin
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="invalid-feedback">
                    <?= form_error('status_perkawinan') ?>
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


                
                
                
                
                