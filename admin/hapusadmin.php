<?php

include 'konfigurasi/konfig.php';

if(isset($_GET['id'])){
	if(hapus_admin($_GET['id'])){
		echo "<script>document.location.href = 'dataadmin.php';</script>";
	}else echo "gagal menghapus data";
}

?>