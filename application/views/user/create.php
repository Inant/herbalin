<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h5>Tambah User</h5>
            <br>
            <?php
              if ($this->session->flashdata('success')) {
            ?>
                <div class="alert alert-danger">
                  <?= $this->session->flashdata('success') ?>
                </div>
            <?php
              }
              $filename = $this->MainModel->getData('max(id_user) as id', 'user', '', '', '');
        if ($filename == null) {
            $filename = 1;
        }
        else {
            $filename = $filename[0]['id'];
        }
        echo $filename;
            ?>

            <form action="<?= base_url(). 'user/create' ?>" method="POST">
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Nama" value="<?= set_value('nama') ?>">
                  <div class="invalid-feedback">
                      <?= form_error('nama') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">No HP</label>
                  <input type="number" name="no_hp" id="no_hp" class="form-control <?= form_error('no_hp') ? 'is-invalid' : '' ?>" value="<?= set_value('no_hp') ?>" placeholder="No Hp">
                  <div class="invalid-feedback">
                    <?= form_error('no_hp') ?>
                  </div>
                </div>
                
                <div class="col-6 mb-3">
                  <label for="">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : '' ?>" value="<?= set_value('tgl_lahir') ?>">
                  <div class="invalid-feedback">
                      <?= form_error('tgl_lahir') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= set_value('username') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('username') ?>
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
                    <!-- </div> -->
                </div>
                <div class="col-6 mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" placeholder="Password" value="<?= set_value('password') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('password') ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Agama</label>
                    <select name="agama" id="agama" class="form-control <?= form_error('agama') ? 'is-invalid' : '' ?>" >
                        <option value="">--Pilih Agama--</option>
                        <option value="Islam" <?= set_value('agama') == 'Islam' ? 'selected' : '' ?> >Islam</option>
                        <option value="Kristen" <?= set_value('agama') == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                        <option value="Hindu" <?= set_value('agama') == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                        <option value="Budha" <?= set_value('agama') == 'Budha' ? 'selected' : '' ?>>Budha</option>
                        <option value="Konghucu" <?= set_value('agama') == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('agama') ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Konfirmasi Password</label>
                    <input type="password" name="konf_password" id="konf_password" class="form-control <?= form_error('konf_password') ? 'is-invalid' : '' ?>" placeholder="Konfirmasi Password" value="<?= set_value('konf_password') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('konf_password') ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">Foto</label>
                  <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="col-6 mb-3">
                    <label for="">Level</label>
                    <select name="level" id="level" class="form-control <?= form_error('level') ? 'is-invalid' : '' ?>">
                        <option value="">--Pilih Level--</option>
                        <option value="Admin" <?= set_value('level') == 'Admin' ? 'selected' : '' ?> >Admin</option>
                        <option value="Resepsionis" <?= set_value('level') == 'Resepsionis' ? 'selected' : '' ?> >Resepsionis</option>
                        <option value="Perawat" <?= set_value('level') == 'Perawat' ? 'selected' : '' ?> >Perawat</option>
                        <option value="Farmasi" <?= set_value('level') == 'Farmasi' ? 'selected' : '' ?> >Farmasi</option>
                        <option value="Kasir" <?= set_value('level') == 'kasir' ? 'selected' : '' ?> >Kasir</option>
                        <option value="Owner" <?= set_value('level') == 'Owner' ? 'selected' : '' ?> >Owner</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('level') ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">Alamat</label>
                  <textarea name="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat"> <?= set_value('alamat') != null ? set_value('alamat') : 'Alamat'  ?></textarea>
                  <div class="invalid-feedback">
                    <?= form_error('alamat') ?>
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