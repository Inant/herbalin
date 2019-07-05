<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak</title>
  <link rel="stylesheet" href="<?= base_url().'assets/css/style.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/css/custom.css' ?>">
</head>
<body>
  <br>
  <center>
    <h4>Griya & Rumah Singgah</h4>
    <h5>Acupunture, Acupressure, Herbal</h5>
    <h5>Drs.H.Achwan Sjahril, Acp.M.Pd</h5>
    <h6>Jl. Karimata III / Gunung Agung No.4</h6>
    <h6>Sumbersari - Jember</h6>
    <h6>0331-339305</h6>
  </center>
  <br>
  <div class="row">
    <!-- <div class="col-2 offset-2">
      <p class="keterangan">Nama Pasien : <?= $keterangan[0]['nama'] ?></p>
    </div>
    <div class="col-2">
      <p class="keterangan">Nomor Antrian : <?= $keterangan[0]['nomor'] ?> </p>
    </div>
    <div class="col-2">
      <p class="keterangan">Waktu : <?= date('d-m-Y H:i:s', strtotime($keterangan[0]['waktu'])) ?> </p>
    </div>
    <div class="col-2 offset-1">
      <p class="keterangan">Kasir : <?= $keterangan[0]['nm_user'] ?> </p>
    </div> -->
    <div class="col-8 offset-2">
      <table width="100%">
        <tr>
        <td><p class="keterangan">Nama Pasien : <?= $keterangan[0]['nama'] ?></p></td>
        <td><p class="keterangan">Nomor Antrian : <?= $keterangan[0]['nomor'] ?> </p></td>
        <td><p class="keterangan">Waktu : <?= date('d-m-Y H:i:s', strtotime($keterangan[0]['waktu'])) ?> </p></td>
        <td><p class="keterangan">Kasir : <?= $keterangan[0]['nm_user'] ?> </p></td>
        </tr>
      </table>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-2 offset-2">
      <h6>Pelayanan</h6>
    </div>
  </div>
  <div class="row">
    <div class="col-8 offset-2">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelayanan</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 0;
        $totalPelayanan = 0;
        foreach ($pelayanan as $key => $value) {
          $no++;
          $totalPelayanan = $totalPelayanan + $value['subtotal'];
          echo"
          <tr>
            <td>$no</td>
            <td>$value[nama]</td>
            <td>$value[subtotal]</td>
          </tr>
          ";
        }
        ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="2" style="text-align:center">Total</th>
            <th><?= $totalPelayanan ?></th>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
  
  <div class="row">
    <div class="col-8 offset-2">
      <hr>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-2 offset-2">
      <h6>Obat</h6>
    </div>
  </div>
  <div class="row">
    <div class="col-8 offset-2">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 0;
        $totalObat = 0;
        foreach ($obat as $key => $value) {
          $no++;
          $totalObat = $totalObat + $value['subtotal'];
          echo"
          <tr>
            <td>$no</td>
            <td>$value[nama]</td>
            <td>$value[subtotal]</td>
          </tr>
          ";
        }
        ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="2" style="text-align:center">Total</th>
            <th><?= $totalObat ?></th>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
  <br>
  <div class="row">
    <div class="col-8 offset-2">
      <table width="100%">
        <tr>
          <td><p class="keterangan"><b>Grand Total : &nbsp; <?= number_format($totalPelayanan + $totalObat, 2, ',', '.') ?></b></p></td>
          <td><p class="keterangan"><b>Total Bayar :  &nbsp; Rp.  <?= number_format($pembayaran[0]['total_bayar'], 2, ',', '.')?></b></p></td>
          <td><p class="keterangan"><b>Kembalian :  &nbsp; Rp.  <?= number_format ($pembayaran[0]['kembalian'], 2, ',', '.')?></b></p></td>
        </tr>
      </table>
    </div>
  </div>
</body>
<script>
  window.print();
  window.alert('Pembayaran berhasil');
  window.location.href="<?= base_url().'pembayaran'?>";
</script>
</html>