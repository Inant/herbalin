<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Tambah User</h5>
                    <br>
                    <form action="<?= base_url(). 'user/create' ?>" method="POST">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" placeholder="Nama">
                                <div class="invalid-feedback">
                                    <?= form_error('nama') ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" id="" class="form-control" data-toggle="datepicker">
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
                                            <label name="gander" id="gender" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value checked> Laki-Laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Prempuan
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                <!-- </div> -->
                            </div>
                <div class="col-md-6 mb-3">
                     <label for="">Alamat</label>
                     <input type="text" name="alamat" id="" class="form-control">   
                </div>
                    <div class="col-md-6 mb-3">
                        <label for="">No HP</label>
                        <input type="number" name="no_hp" id="" class="form-control">
                    </div>
                <div class="col-md-6 mb-3">
                    <label for="">Agama</label>
                    <select name="agama" id="agama" class="form-control select2" >
                        <option value="">-Pilih Agama--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Ussername</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Level</label>
                    <select name="level" id="level" class="form-control select2">
                        <option value="Admin">Admin</option>
                        <option value="Resepsionis">Resepsionis</option>
                        <option value="Perawat">Perawat</option>
                        <option value="Farmasi">Farmasi</option>
                        <option value="Kasir">Kasir</option>
                        <option value="Owner">Owner</option>
                    </select>
                </div>
                </div>
              </div>
                    </form>
                </div>
            </div>
        </div>
    </div>