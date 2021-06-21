<?php 
include 'homeadmin.php';
include 'konfigurasi/konfig.php';
$result=tampiladmin();
?>
<title>Data Admin</title>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
<br>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Admin</th>
      <th>Hapus</th>
    </tr>
  </thead>

    
      <tbody>
      
      <?php $no=1; while ($row=mysqli_fetch_assoc($result)) {
        
      ?>
        <tr>
        <td><?= $no; ?></td>
        <td><?= $row['nama_admin'] ?></td>
        <td><a href="hapusadmin.php?id=<?= $row['id_admin'] ?>" class="btn btn-danger">Hapus</a></td> 
        </tr>
        <?php $no++; }?>

      </tbody>
    
  </thead>
</table>
<br>
<center><a href="tambahadmin.php" class="btn btn-primary">Tambah Admin</a></center>
<br><br>

<script src="dt/js/jquery.dataTables.min.js"></script>
<script src="dt/js/dataTables.bootstrap.js"></script>
</head>
<?php include 'foot.php'?>

  