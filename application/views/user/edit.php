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
                <a href="<?= base_url(). 'user' ?>">
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
            <form action="<?= base_url(). 'user/edit/'.$user[0]['id_user'] ?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Nama" value="<?= set_value('nama') ? set_value('nama') : $user[0]['nama'] ?>">
                  <div class="invalid-feedback">
                      <?= form_error('nama') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">No HP</label>
                  <input type="number" name="no_hp" id="no_hp" class="form-control <?= form_error('no_hp') ? 'is-invalid' : '' ?>" value="<?= set_value('no_hp') ? set_value('no_hp') : $user[0]['no_hp'] ?>" placeholder="No Hp">
                  <div class="invalid-feedback">
                    <?= form_error('no_hp') ?>
                  </div>
                </div>
                
                <div class="col-6 mb-3">
                  <label for="">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : '' ?>" value="<?= set_value('tgl_lahir') ? set_value('tgl_lahir') : $user[0]['tgl_lahir'] ?>">
                  <div class="invalid-feedback">
                      <?= form_error('tgl_lahir') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= set_value('username') ? set_value('username') : $user[0]['username'] ?>">
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
                            <input type="radio" class="form-control <?= form_error('gender') ? 'is-invalid' : '' ?>" name="gender" id="gender" value="Laki-laki" <?= $user[0]['gender'] == 'Laki-laki' ? 'checked' : '' ?>> Laki-Laki
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-control <?= form_error('gender') ? 'is-invalid' : '' ?>" name="gender" id="gender" value="Perempuan" <?= $user[0]['gender'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan
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
                    <!-- <div class="form-group row"> -->
                  <label class="">Status</label>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-radio">
                        <label name="status" id="status" class="form-check-label">
                            <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Aktif" <?= $user[0]['status'] == 'Aktif' ? 'checked' : '' ?>> Aktif
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Non Aktif" <?= $user[0]['status'] == 'Non Aktif' ? 'checked' : '' ?>> Non Aktif
                        </label>
                      </div>
                    </div>
                  </div>
                    <!-- </div> -->
                  <div class="invalid-feedback">
                    <?= form_error('status') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Agama</label>
                    <select name="agama" id="agama" class="form-control <?= form_error('agama') ? 'is-invalid' : '' ?>" >
                        <option value="">--Pilih Agama--</option>
                        <option value="Islam" <?= $user[0]['agama'] == 'Islam' ? 'selected' : '' ?> >Islam</option>
                        <option value="Kristen" <?= $user[0]['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                        <option value="Hindu" <?= $user[0]['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                        <option value="Budha" <?= $user[0]['agama'] == 'Budha' ? 'selected' : '' ?>>Budha</option>
                        <option value="Konghucu" <?= $user[0]['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('agama') ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Level</label>
                    <select name="level" id="level" class="form-control <?= form_error('level') ? 'is-invalid' : '' ?>">
                        <option value="">--Pilih Level--</option>
                        <option value="Admin" <?= $user[0]['level'] == 'Admin' ? 'selected' : '' ?> >Admin</option>
                        <option value="Resepsionis" <?= $user[0]['level'] == 'Resepsionis' ? 'selected' : '' ?> >Resepsionis</option>
                        <option value="Perawat" <?= $user[0]['level'] == 'Perawat' ? 'selected' : '' ?> >Perawat</option>
                        <option value="Farmasi" <?= $user[0]['level'] == 'Farmasi' ? 'selected' : '' ?> >Farmasi</option>
                        <option value="Kasir" <?= $user[0]['level'] == 'kasir' ? 'selected' : '' ?> >Kasir</option>
                        <option value="Owner" <?= $user[0]['level'] == 'Owner' ? 'selected' : '' ?> >Owner</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('level') ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                  <label for="">Foto</label>
                  <br>
                  <img src="<?= base_url(). 'upload/fotouser/'.$user[0]['foto'] ?>" alt="" width="140">
                  <br><br>
                  <input type="file" name="foto" id="foto" class="form-control">
                  <small class="text-muted"><i>Abaikan jika tidak ingin mengubah foto</i></small>
                  <input type="hidden" name="old_foto" value="<?php echo $user[0]['foto'] ?>"> 
                </div>
                <div class="col-6 mb-3">
                  <label for="">Alamat</label>
                  <textarea name="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat"><?= set_value('alamat') ? set_value('alamat') : $user[0]['alamat'] ?></textarea>
                  <div class="invalid-feedback">
                    <?= form_error('alamat') ?>
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