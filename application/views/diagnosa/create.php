<div class="content-wrapper">
  <div class="row">
   <div class="col-12 grid-margin stretch-card"> 
    <div class="card">
     <div class="card-body">
        <div class="row">
         <div class="col-2">
           <h5>Tambah Diagnosa</h5>
         </div>
         <div class="col-2 ml-auto">
           <a href="<?= base_url(). 'diagnosa/' ?>">
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
      <form action="<?= base_url(). 'diagnosa/create '?>" enctype="multipart/form-data" method="POST">
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
                <div class="col-6 mb-3">
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