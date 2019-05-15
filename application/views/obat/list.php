<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>List Obat</h5>
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
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-2">
                                <a href="<?= base_url(). 'obat/create' ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Tambah</a>
                            </div>
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
                                    <th>Nama</th>
                                    <th>Id Kategori</th>
                                    <th>Id Satuan</th>
                                    <th>Harga Jual</th>
                                    <th>Stock</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>Id user</th>
                                    <th>Satus</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                            
                                foreach ($obat as $key) {
                                    $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['id_kategori'] ?></td>
                                    <td><?= $key['id_satuan'] ?></td>
                                    <td><?= $key['harga_jual'] ?></td>
                                    <td><?= $key['stock'] ?></td>
                                    <td><?= $key['tgl_kadaluarsa'] ?></td>
                                    <td><?= $key['id_user'] ?></td>
                                    <td><?= $key['status'] ?></td>
                                    <td>
                                        <a href="<?= base_url(). 'obat/edit/'.$key['obat'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a>
                                    </td>
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
