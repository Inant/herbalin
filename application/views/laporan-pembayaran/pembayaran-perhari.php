<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Laporan Pembayaran Perhari</h5>
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
