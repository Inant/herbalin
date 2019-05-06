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
                            <div class="col-6 ">
                                <label for="">Tanggal Lahir</label>
                                <input type="text" name="" id="" class="form-control" data-toggle="datepicker">
                                <div class="invalid-feedback">
                                    <?= form_error('tgl_lahir') ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- <div class="form-group row"> -->
                                    <label class="">Gender</label>
                                    <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-radio">
                                            <label class="form-check-label">
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
                  <div class="col-md-6">
                        <p class="card-description">
                        Address
                        </p>
                        </div>
                </div>
              </div>
                    </form>
                </div>
            </div>
        </div>
    </div>