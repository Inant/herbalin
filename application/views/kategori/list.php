<div class="content-wrapper">
    <div class="row">
        <?php
            
            // echo "<pre>";
            // print_r ($);
            // echo "</pre>";
            
        ?>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>List Kategori</h5>
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
                            <div class="col-sm-2 ">
                                <a href="<?= base_url(). 'kategori/create' ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                                    <th>Kategori</th>
                                    <th>status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                                foreach ($kategori as $key) {
                                    $no++;
                                    $statusClass = $key['status'] == 'Aktif' ? 'badge badge-success' : 'badge badge-danger'; 
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                     
                                    <td><?= $key['kategori'] ?></td>
                                    <td><span class="<?= $statusClass ?>"><?= $key['status'] ?></span></td>
                                    <td>

                                        <a href="<?= base_url(). 'kategori/edit/'.$key['id_kategori'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                                //test
                                //test
                                //test
                                //iyek
                                //inant
                                //inant

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>