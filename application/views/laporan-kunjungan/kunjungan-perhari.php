<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Laporan Kunjungan Perhari</h5>
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
