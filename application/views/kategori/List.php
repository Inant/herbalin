<div class="content-wrapper">
    <div class="row">
        <?php
            
            // echo "<pre>";
            // print_r ($kategori);
            // echo "</pre>";
            
        ?>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>List kategori</h5>
                    <br>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-2 ">
                                <a href="<?= base_url(). 'kategori/tambah' ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <div class="input-group">
                                    <input type="text" name="keyword" id="keyword" class="form-control small" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : ''  ?>" placeholder="Cari...">
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
                                    <th>kategori</th>
                                    <th>opsi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                                foreach ($kategori as $key) {
                                    $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                     
                                    <td><?= $key['kategori'] ?></td>
                                    
                                   
                                    <td>
                                        <a href="<?= base_url(). 'user/edit/'.$key['id_kategori'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a>
                                        <a href="<?= base_url().'user/changeStatus/'.$key['id_kategori'] ?>">
                                            <button class="btn <?= $key['status'] == 'Aktif' ? 'btn-success' : 'btn-danger' ?> btn-sm"><?= $key['status'] ?></button>
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