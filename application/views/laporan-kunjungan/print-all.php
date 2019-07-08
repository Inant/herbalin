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
    <h6>Laporan Kunjungan</h6>
    <h6>Periode : <?= date('d-m-Y', strtotime($_GET['dari'])) ?> s/d <?= date('d-m-Y', strtotime($_GET['sampai'])) ?> </h6>
  </center>
  <br>
  <div class="row">
    <div class="col-8 offset-1">
      <table width="100%" class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Gender</th>
            <th>Alamat</th>
            <th>Waktu</th>
            <th>Keluhan</th>
          </tr>
        </thead>
        <?php
        $no = 0;
        foreach ($kunjungan as $key => $value) {
          $no++;
          echo"
          <tr>
          <td>$no</td>
          <td>$value[nama]</td>
          <td>$value[usia] tahun</td>
          <td>$value[gender]</td>
          <td>$value[alamat]</td>
          <td>".date('d-m-Y', strtotime($value['waktu']))."</td>
          <td>$value[keluhan]</td>
          </tr>
          ";
        }
        ?>
        </tbody>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
</body>
<script>
  window.print();
  // window.location.href="<?= base_url().'pembayaran'?>";
</script>
</html>