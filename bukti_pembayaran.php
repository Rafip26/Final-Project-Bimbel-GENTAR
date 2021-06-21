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
    <script>
        alert("Selamat, Anda berhasil terdaftar. Klik ok untuk melanjutkan");
    </script>
    <div class="jumbotron">
    <h2 class="text-center">BUKTI PEMBAYARAN</h2>
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

        $nama_bank=input($_POST["nama_bank"]);
        $no_transfer=input($_POST["bukti_transfer"]);
        $nama_siswa=input($_POST["nama_siswa"]);

        //Query input menginput data kedalam tabel pendaftaraan
        $sql="insert into bukti_transfer (nama_bank,bukti_transfer,nama_siswa) values
		('$nama_bank','$no_transfer','$nama_siswa')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) { 
            echo '<meta http-equiv="refresh" content="0; url=success_index.html">'; 
            die();
        }
        else {
            echo "<div class='alert alert-danger'> Pendaftaraan Gagal. </div>";
        }
    } ?>
    <!--membuat form inputan data peserta didik-->
        <form id="form" method="post">
            <div class="alert alert-primary">
                <strong>BUKTI PEMBAYARAN SISWA GENTAR</strong>
            </div>
            <bord>
            <div class="container-fluid">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Nama :</label> <!-- nama lengkap -->
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Nama Bank:</label> <!-- tempat lahir-->
                    <input type="text" name="nama_bank" class="form-control" placeholder="Masukkan Nama Bank">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Bukti Transfer:</label> <!-- tempat lahir-->
                    <input type="text" name="nama_bank" class="form-control" placeholder="Masukkan nomor transfer">
                </div>
            </div>
            </div>
            <br>
                <div class="col-sm-6">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Kirim</button> <!--tombol submit-->
                    <button type="reset" class="btn">Reset</button> <!--tombol reset-->
                </div>
            </div>
        </div>
        </bord>
        </form>
    </div>
</body>
</html>