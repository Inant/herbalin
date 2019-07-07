<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Laporan Pembayaran</h5>
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
                         </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama Pasien</th>
                            <th>Waktu Pembayaran</th>
                            <th>Grand Total</th>
                            <th>Total Bayar</th>
                            <th>Kembalian</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 0;
                        $income = 0;
                        foreach ($pembayaran as $key => $value) {
                          $income = $income + $value['grand_total'];
                          $no++;
                          echo"
                          <tr>
                          <td>$no</td>
                          <td>$value[nama]</td>
                          <td>".date('d-m-Y H:i:s', strtotime($value['waktu']))."</td>
                          <td>".number_format($value['grand_total'] , 2, ',', '.')."</td>
                          <td>".number_format($value['total_bayar'] , 2, ',', '.')."</td>
                          <td>".number_format($value['kembalian'] , 2, ',', '.')."</td>
                          </tr>
                          ";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="3" style="text-align:center">Total Pendapatan</th>
                            <th colspan="3" style="text-align:center">Rp.  <?= number_format($income, 2, ',', '.')?></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
