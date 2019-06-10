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
                    <h5>Antrian Hari Ini</h5>
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
                                <a href="<?= base_url(). 'antrian/create' ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                                    <th>Nama</th>
                                    <th>Usia</th>
                                    <th>Gender</th>
                                    <th>Alamat</th>
                                    <th>Waktu</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // $no = 0;
                                foreach ($antrian as $key) {
                                    // $no++;
                                    $statusClass = $key['status'] == 'Mengantri' ? 'badge badge-success' : 'badge badge-danger';
                                    $waktu = date('d-m-Y H:i:s', strtotime($key['waktu']));
                            ?>
                                <tr>
                                    <td><?= $key['nomor'] ?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['usia'].' tahun' ?></td>
                                    <td><?= $key['gender'] ?></td>
                                    <td><?= $key['alamat'] ?></td>
                                    <td><?= $waktu ?></td>
                                    <td><?= $key['keluhan'] ?></td>
                                    <td><span class="<?= $statusClass ?>"><?= $key['status'] ?></span></td>
                                    <td>
                                        <a href="<?= base_url(). 'antrian/edit/'.$key['id_antrian'] ?>">
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
  </div>