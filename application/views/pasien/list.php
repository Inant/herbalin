<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>List Pasien</h5>
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
                            <?php
                            if ($this->session->userdata('level') == 'Resepsionis') {
                                ?>
                            <div class="col-sm-2">
                                <a href="<?= base_url(). 'pasien/create' ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Tambah</a>
                            </div>
                            <?php
                            }
                            ?>
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
                                    <th>No Identitas</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Gender</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Pendidikan</th>
                                    <th>Status Kawinan</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                            
                                foreach ($pasien as $key) {
                                    $no++;
                                    $statusClass = $key['status'] == 'Aktif' ? 'badge badge-success' : 'badge badge-danger'; 
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $key['no_identitas'] ?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['tmpt_lahir'] ?></td>
                                    <td><?= $key['tgl_lahir'] ?></td>
                                    <td><?= $key['gender'] ?></td>
                                    <td><?= $key['alamat'] ?></td>
                                    <td><?= $key['no_hp'] ?></td>
                                    <td><?= $key['pendidikan'] ?></td>
                                    <td><?= $key['status_perkawinan'] ?></td>
                                    <td><span class="<?= $statusClass ?>"><?= $key['status'] ?></span></td>
                                    <td>
                                    <?php
                                    if ($this->session->userdata('level') == 'Resepsionis') {
                                        ?>
                                        <a href="<?= base_url(). 'pasien/edit/'.$key['id_pasien'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a>
                                    <?php
                                    }
                                    if ($this->session->userdata('level') == 'Admin') {
                                        ?>
                                        <a href="<?= base_url(). 'pasien/riwayat/'.$key['id_pasien'] ?>">
                                            <button class="btn btn-info btn-sm"> Riwayat </button>
                                        </a>
                                    <?php
                                    }
                                    ?>
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
