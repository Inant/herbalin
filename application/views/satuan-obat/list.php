<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>List Satuan Obat</h5>
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
                            if ($this->session->userdata('level') == 'Farmasi') {
                                ?>
                            <div class="col-sm-2">
                                <a href="<?= base_url(). 'satuanobat/create' ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Tambah</a>
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
                                    <th>Satuan</th>
                                    <th>Status</th>
                                    <?php
                                    if ($this->session->userdata('level') == 'Farmasi') {
                                    echo"<th>Aksi</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                            
                                foreach ($satuan_obat as $key) {
                                    $no++;
                                    $statusClass = $key['status'] == 'Aktif' ? 'badge badge-success' : 'badge badge-danger'; 
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $key['satuan'] ?></td>
                                    <td><span class="<?= $statusClass ?>"><?= $key['status'] ?></span></td>
                                    <?php
                                    if ($this->session->userdata('level') == 'Farmasi') {
                                        ?>
                                    <td>
                                        <a href="<?= base_url(). 'satuanobat/edit/'.$key['id_satuan'] ?>">
                                            <button class="btn btn-primary btn-sm"> Edit </button>
                                        </a>
                                    </td>
                                    <?php
                                    }
                                    ?>
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
