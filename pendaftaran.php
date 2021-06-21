<!DOCTYPE html>
<html lang="en">
<head>
    <title>PENDAFTARAN GENTAR</title> <!--judul web-->
    <!--script untuk mengoneksikan ke style bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/pendaftaran.css">
    <script src="jquery/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--menambah style-->
    <?php
    include ('menu.html');
    ?>
</head>
<body>
    <div class="jumbotron">
    <h2 class="text-center">FORMULIR PENDAFTARAN</h2>
    <?php
     //script untuk mengoneksikan ke database
    $host="localhost";
    $user="root";
    $password="";
    $db="db_gentar";
    $kon = mysqli_connect($host,$user,$password,$db);
        if (!$kon){
            die("Koneksi gagal:".mysqli_connect_error()); //jika gagal maka akan menampilkan koneksi gagal
        }
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_siswa=input($_POST["nama_siswa"]);
        $tempatlahir_siswa=input($_POST["tempatlahir_siswa"]);
        $tanggal_lahir=input($_POST["tanggal_lahir"]);
        $alamat_siswa=input($_POST["alamat_siswa"]);
        $asal_sekolah=input($_POST["asal_sekolah"]);
        $notelepon_siswa=input($_POST["notelepon_siswa"]);
        $namaortu_siswa=input($_POST["namaortu_siswa"]);
        $alamat_ortu=input($_POST["alamat_ortu"]);
        $notelp_ortu=input($_POST["notelp_ortu"]);
        $paket_siswa=input($_POST["paket_siswa"]);

        //Query input menginput data kedalam tabel pendaftaraan
        $sql="insert into siswa_gentar (nama_siswa,tempatlahir_siswa,tanggal_lahir,alamat_siswa, asal_sekolah,notelepon_siswa,
        namaortu_siswa,alamat_ortu,notelp_ortu,paket_siswa) values
		('$nama_siswa','$tempatlahir_siswa','$tanggal_lahir','$alamat_siswa','$asal_sekolah','$notelepon_siswa','$namaortu_siswa',
        '$alamat_ortu','$notelp_ortu','$paket_siswa')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) { 
            echo '<meta http-equiv="refresh" content="0; url=bukti_pembayaran.php">'; 
            die();
        }
        else {
            echo "<div class='alert alert-danger'> Pendaftaraan Gagal. </div>";
        }
    } ?>
    <!--membuat form inputan data peserta didik-->
        <form id="form" method="post">
            <div class="alert alert-primary">
                <strong>PENDAFTARAN SISWA GENTAR</strong>
            </div>
            <bord>
            <div class="container-fluid">
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nama :</label> <!-- nama lengkap -->
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tempat Lahir:</label> <!-- tempat lahir-->
                    <input type="text" name="tempatlahir_siswa" class="form-control" placeholder="Masukkan Tempat Lahir">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tanggal Lahir:</label> <!-- tanggal lahir -->
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir">
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Alamat Lengkap:</label> <!-- alamat jalan -->
                    <input type="text" name="alamat_siswa" class="form-control" placeholder="Masukkan Alamat Lengkap">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Asal Sekolah:</label> <!-- alamat jalan -->
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Masukkan Asal Sekolah">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nomor Telepon:</label> <!-- nomor telepon-->
                    <input type="text" name="notelepon_siswa" class="form-control" placeholder="Masukkan Nomor Telepon">
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nama Orang Tua:</label> <!-- nama lengkap -->
                    <input type="text" name="namaortu_siswa" class="form-control" placeholder="Masukkan Nama Orang Tua">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Alamat Lengkap Orang Tua:</label> <!-- alamat jalan -->
                    <input type="text" name="alamat_ortu" class="form-control" placeholder="Masukkan Alamat Orang Tua">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nomor Telepon Orang Tua:</label> <!-- nomor telepon-->
                    <input type="text" name="notelp_ortu" class="form-control" placeholder="Masukkan Nomor Telepon Orang Tua">
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Jenis Paket Bimbel:</label> <!-- jenis pendaftaran -->
                    <select class="form-control" name="paket_siswa">
                        <option>Pilih</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA</option>
                    </select>
                </div>
            </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button> <!--tombol submit-->
                    <button type="reset" class="btn">Reset</button> <!--tombol reset-->
                </div>
            </div>
        </div>
        </bord>
        </form>
    </div>
</body>
</html>