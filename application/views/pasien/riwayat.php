<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Riwayat Kunjungan Pasien</h5>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                if (count($pasien) > 0) {
                            ?>
                            <!-- <table width="100%">
                                <tr>
                                    <td><p>Nama Pasien : <?= $pasien[0]['nama'] ?></p></td>
                                    <td><p>Tempat, tanggal lahir : <?= $pasien[0]['tmpt_lahir'] .', ' . date('d-m-Y', strtotime($pasien[0]['tgl_lahir'])) ?></p></td>
                                    <td><p>Gender : <?= $pasien[0]['gender'] ?></p></td>
                                    <td><p>Alamat : <?= $pasien[0]['alamat'] ?></p></td>
                                </tr>
                            </table> -->
                            <div class="row">
                                <div class="col-6"><p>Nama &ensp; : <?= $pasien[0]['nama'] ?></p></div>
                                <div class="col-6"><p>Gender &ensp;: <?= $pasien[0]['gender'] ?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><p>Usia &ensp; &ensp; : <?= $pasien[0]['usia']?></p></div>
                                <div class="col-6"><p>Alamat &ensp;  : <?= $pasien[0]['alamat']?></p></div>
                            </div>
                            <?php        
                                }
                                else{
                                    echo "<h5>Pasien tidak ditemukan.</h5>";
                                }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <div id="timeline"><div class="row timeline-movement timeline-movement-top">
                                <div class="timeline-badge timeline-future-movement">
                                    <a href="#">
                                        <span class="fa fa-plus"></span>
                                    </a>
                                </div>
                                <div class="timeline-badge timeline-filter-movement">
                                    <a href="#">
                                        <span class="fa fa-clock-o"></span>
                                    </a>
                                </div>
                            </div>

                            <?php
                            if (count($history) > 0) {
                                $tipe[] = "";
                                foreach ($history as $key => $value) {
                                    $pemeriksaan = $this->db->query("SELECT DISTINCT * FROM pemeriksaan pm JOIN antrian a ON a.id_antrian = pm.id_antrian WHERE pm.id_antrian = '$value[id_antrian]' ")->result_array();
                                    $dokter = $this->MainModel->getData('nama', 'user', '', ['id_user' => $pemeriksaan[0]['id_user']], '');
                                    $id_pemeriksaan = $pemeriksaan[0]['id_pemeriksaan'];
                                    $diagnosa = $this->db->query("SELECT d.nama FROM diagnosa d JOIN detail_diagnosa dd ON dd.id_diagnosa = d.id_diagnosa JOIN pemeriksaan pm ON pm.id_pemeriksaan = dd.id_pemeriksaan WHERE pm.id_pemeriksaan  = '$id_pemeriksaan' ")->result_array();
                                    $tindakan = $this->db->query("SELECT p.nama FROM pelayanan p JOIN tindakan t ON t.id_pelayanan = p.id_pelayanan JOIN pemeriksaan pm ON pm.id_pemeriksaan = t.id_pemeriksaan WHERE pm.id_pemeriksaan  = '$id_pemeriksaan' ")->result_array();
                                    $obat = $this->db->query("SELECT o.nama, s.satuan, dr.dosis1, dr.dosis2, dr.jumlah FROM obat o JOIN satuan_obat s ON s.id_satuan = o.id_satuan JOIN detail_resep dr ON o.id_obat = dr.id_obat JOIN resep r ON r.id_resep = dr.id_resep JOIN pemeriksaan pm ON pm.id_pemeriksaan = r.id_pemeriksaan WHERE pm.id_pemeriksaan  = '$id_pemeriksaan' ")->result_array();
                                    $offset = $key %2 != 0 ? "offset-6" : "";
                                    $offset2 = $key %2 != 0 ? "offset-1"  : "";
                                    $tipe = $key %2 != 0 ? "debits" : "credits"
                            ?>
                                <div class="row timeline-movement">
                                    <div class="timeline-badge">
                                        <span class="timeline-balloon-date-day"><?= date('d', strtotime($pemeriksaan[0]['waktu'])) ?></span><br>
                                        <span class="timeline-balloon-date-month"><?= strtoupper(date('M', strtotime($pemeriksaan[0]['waktu']))) ?></span>
                                    </div>
                                    <div class="<?= $offset ?> col-sm-6  timeline-item">
                                        <div class="row">
                                            <div class="<?= $offset2 ?> col-sm-11">
                                                <div class="timeline-panel <?=$tipe?>">
                                                    <ul class="timeline-panel-ul">
                                                        <li><span class="importo"><?= $pemeriksaan[0]['keluhan'] ?></span></li>
                                                        <li>
                                                            <span class="causale">Dokter : <?= $dokter[0]['nama'] ?><br>
                                                            Tensi : <?= $pemeriksaan[0]['tensi'] ?><br>
                                                            Suhu badan : <?= $pemeriksaan[0]['suhu_badan'] ?><br>
                                                            <?php $spaceD = count($diagnosa); ?>
                                                            Diagnosa : <?php foreach ($diagnosa as $keyD => $valueD) {
                                                                echo " $valueD[nama] ";
                                                                echo $spaceD > 1 ? ', ' : '';
                                                            } ?><br>
                                                            <?php $spaceT = count($tindakan); ?>
                                                            Tindakan : <?php foreach ($tindakan as $keyT => $valueT) {
                                                                echo " $valueT[nama] ";
                                                                echo $spaceT > 1 ? ', ' : '';
                                                            } ?><br>
                                                            -- Obat --
                                                            <br>
                                                            <?php
                                                            foreach ($obat as $keyO => $valueO) {
                                                                echo "$valueO[nama] ($valueO[jumlah] $valueO[satuan]) $valueO[dosis1] x $valueO[dosis2] <br>";
                                                            } ?>
                                                            </span> 
                                                        </li>
                                                        <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?= date('d/m/Y', strtotime($pemeriksaan[0]['waktu'])) ?></small></p> </li>
                                                    </ul>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            else{

                            }
                            ?>

                            <!-- <div class="row timeline-movement">
                                <div class="timeline-badge">
                                    <span class="timeline-balloon-date-day">18</span>
                                    <span class="timeline-balloon-date-month">APR</span>
                                </div>
                                <div class="offset-6 col-sm-6  timeline-item">
                                    <div class="row">
                                        <div class="offset-1 col-sm-11">
                                            <div class="timeline-panel debits">
                                                <ul class="timeline-panel-ul">
                                                    <li><span class="importo">Mussum ipsum cacilds</span></li>
                                                    <li><span class="causale">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span> </li>
                                                    <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
