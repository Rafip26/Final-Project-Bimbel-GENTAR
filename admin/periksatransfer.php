<?php 
include 'homeadmin.php';
include 'konfigurasi/konfig.php';
if(empty($id=$_GET['id'])){
echo "gagal";
}else {
$result=tampilpembayaranperid($id);}
?>
?>
<title>Konfirmasi Transfer</title>
<link rel="stylesheet" type="text/css" href="dt/css/dataTables.bootstrap.css">
<br>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pendaftar</th>
      <th>Nama Bank</th>
      <th>Perikas</th>
    </tr>
  </thead>

    
      <tbody>
      
      <?php $no=1; while ($row=mysqli_fetch_assoc($result)) {
        
      ?>
        <tr>
        <td><?= $no; ?></td>
        <td><?= $row['nama_siswa'] ?></td>
        <td><?= $row['nama_bank'] ?></td>
        <td><div class="form-group">

        <?php if (isset($_POST['submit'])) {
              $transaksi=$_POST['transaksi'];

              if(simpancekbayar($transaksi,$id)){
                echo "<script>window.location.href='datatransfer.php'</script>";
              }else{
                echo "gagal";
              }
             } ?>
        <form action="" method="post" accept-charset="utf-8">
              <select name="transaksi" class="form-control" id="sel1">
                  <option value="0">Transaksi Di Tolak</option>
                  <option value="1">Transaksi Di Terima</option>

              </select><br>
            <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
        </form>
        </td>
        <img src="../<?= $row['bukti_transfer'] ?>">
        </tr>
        <?php $no++; }?>

      </tbody>
    
  </thead>
</table>


<script src="dt/js/jquery.dataTables.min.js"></script>
<script src="dt/js/dataTables.bootstrap.js"></script>
</head>

<?php include 'foot.php' ?>