<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Laporan Kunjungan</h5>
                    <br>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-3">
                              <label for="">Dari</label>
                              <input type="date" name="dari" id="dari" class="form-control small" value="<?= isset  ($_GET['dari']) ? $_GET['dari'] : ''  ?>">
                                
                            </div>
                            <div class="col-md-3">
                              <label for="">Sampai</label>
                              <input type="date" name="sampai" id="sampai" class="form-control small" value="<?= isset  ($_GET['sampai']) ? $_GET['sampai'] : ''  ?>">
                                
                            </div>
                            <div class="col-md-1">
                              <button type="submit" class="btn btn-sm btn-success" style="margin-top:32px;"><i class="fa fa-filter"></i> Filter</button>
                            </div>
                            <?php
                            if (!empty($_GET['dari']) && !empty($_GET['sampai'])) {
                            ?>
                              <div class="col-sm-1 ml-auto">
                                <a style="margin-top:35px;" href="<?= base_url().'laporankunjungan/printall?dari='.$_GET['dari'].'&sampai='.$_GET['sampai'] ?>" class="btn btn-xs btn-info"><i class="fa fa-print"></i>Cetak</a>
                              </div>
                              <div class="col-sm-1">
                                <a style="margin-top:35px;" href="<?= base_url().'laporankunjungan/printall?dari='.$_GET['dari'].'&sampai='.$_GET['sampai'].'&xls=true' ?>" class="btn btn-xs btn-info"><i class="fa fa-file-excel-o"></i>XLS</a>
                              </div>
                            <?php
                            }
                            ?>
                         </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Gender</th>
                            <th>Alamat</th>
                            <th>Waktu</th>
                            <th>Keluhan</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 0;
                        foreach ($kunjungan as $key => $value) {
                          $no++;
                          echo"
                          <tr>
                          <td>$no</td>
                          <td>$value[nama]</td>
                          <td>$value[usia] tahun</td>
                          <td>$value[gender]</td>
                          <td>$value[alamat]</td>
                          <td>".date('d-m-Y', strtotime($value['waktu']))."</td>
                          <td>$value[keluhan]</td>
                          </tr>
                          ";
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
