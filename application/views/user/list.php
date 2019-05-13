<div class="content-wrapper">
    <div class="row">
        <?php
            
            // echo "<pre>";
            // print_r ($user);
            // echo "</pre>";
            
        ?>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>List User</h5>
                    <br>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-2 ">
                                <a href="<?= base_url(). 'user/create' ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Tgl Lahir</th>
                                    <th>Gender</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                                foreach ($user as $key) {
                                    $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <div class="pofile-image">
                                        <img src="<?= base_url().'upload/fotouser/'.$key['foto']?>" alt=""></td>
                                        </div>
                                    </td>    
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($key['tgl_lahir'])) ?></td>
                                    <td><?= $key['gender'] ?></td>
                                    <td><?= $key['no_hp'] ?></td>
                                    <td><?= $key['alamat'] ?></td>
                                    <td><?= $key['username'] ?></td>
                                    <td><?= $key['level'] ?></td>
                                    <td>
                                        <a href="<?= base_url(). 'user/edit/'.$key['id_user'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a>
                                        <a href="<?= base_url().'user/changeStatus/'.$key['id_user'] ?>">
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