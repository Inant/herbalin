<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>List Obat Kadaluarsa</h5>
                    <br>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <div class="input-group">
                                    <input type="text" name="keyword" id="keyword" class="form-control small" value="<?= isset  ($_GET['keyword']) ? $_GET['keyword'] : ''  ?>" placeholder="Cari...">
                                    <div class="input-group-append">
                                     <button type="submit" class="btn btn-success btn-sm">
                                         <i class="fa fa-search"></i>
                                      </button>
                                    </div>
                                 </div>
                             </div>
                         </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Stock</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                            
                                foreach ($obat_kadaluarsa as $key) {
                                    $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['kategori'] ?></td>
                                    <td><?= $key['satuan'] ?></td>
                                    <td><?= $key['stock'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($key['tgl_kadaluarsa'])) ?></td>
                                    <td><span class="badge badge-danger">Kadaluarsa</span></td>
                                </tr>
                            <?php
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
