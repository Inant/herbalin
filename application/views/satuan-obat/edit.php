<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-2">
                <h5> Tambah Satuan Obat</h5>
              </div>
              <div class="col-2 ml-auto">
                <a href="<?= base_url(). 'satuanobat' ?>">
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
              <form action="<?= base_url(). 'satuanobat/edit/'.$satuanobat[0]['id_satuan'] ?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="">satuan</label>
                  <input type="text" name="satuan" id="satuan" class="form-control <?= form_error('satuan') ? 'is-invalid' : '' ?>" placeholder="Satuan" value="<?= set_value('satuan') ? set_value('satuan') : $satuanobat[0]['satuan'] ?>">
                  <div class="invalid-feedback">
                      <?= form_error('satuan') ?>
                  </div>
                </div>
                <div class="col-6 mb-3">
                    <!-- <div class="form-group row"> -->
                  <label class="">Status</label>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-radio">
                        <label name="status" id="status" class="form-check-label">
                            <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Aktif" <?= $satuanobat[0]['status'] == 'Aktif' ? 'checked' : '' ?>> Aktif
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status" value="Non Aktif" <?= $satuanobat[0]['status'] == 'Non Aktif' ? 'checked' : '' ?>> Non Aktif
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



                
