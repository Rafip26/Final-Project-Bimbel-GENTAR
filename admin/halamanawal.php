<?php 
include 'homeadmin.php';
include 'konfigurasi/konfig.php';
$result=tampilpendaftar();
?>
<title>Data Pendaftar</title>
<link rel="stylesheet" type="text/css" href="dt/css/dataTables.bootstrap.css">

<br>
<table class="table table-striped table-bordered">

  <thead>
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th>Asal Sekolah</th>
      <th>Nomor Telepon</th>
      <th>Nama Orang Tua</th>
      <th>Alamat Orang Tua</th>
      <th>Nomor Telepon Orang Tua</th>
      <th>Paket Siswa</th>
    </tr>
  </thead>

    
      <tbody>
      
      <?php $no=1; while ($row=mysqli_fetch_assoc($result)) {
        
      ?>
        <tr>
        <td><?= $no; ?></td>
        <td><?= $row['nama_siswa'] ?></td>
        <td><?= $row['tempatlahir_siswa'] ?></td>
        <td><?= $row['tanggal_lahir'] ?></td>
        <td><?= $row['alamat_siswa'] ?></td>
        <td><?= $row['asal_sekolah']?></td>
        <td><?= $row['notelepon_siswa']?></td>
        <td><?= $row['namaortu_siswa'] ?></td>
        <td><?= $row['alamat_ortu'] ?></td>
        <td><?= $row['notelp_ortu'] ?></td>
        <td><?= $row['paket_siswa'] ?></td>
        </tr>
        <?php $no++; }?>

      </tbody>
    
  </thead>
</table>
<center>
<a href="reportpdfgentar.php" class="btn btn-primary">Cetak PDF</a>
<a href="cetakchart.php" class="btn btn-primary">Lihat Grafik</a>
<a href="cetakexcel.php" class="btn btn-primary">Cetak Excel</a>
</center>

<script src="dt/js/jquery.dataTables.min.js"></script>
<script src="dt/js/dataTables.bootstrap.js"></script>
</head>
<br>

 <?php include 'foot.php'; ?>