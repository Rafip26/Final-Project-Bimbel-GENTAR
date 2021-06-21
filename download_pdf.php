<?php 
//script untuk mengoneksikan ke database
$host  = "localhost";
$user = "root";
$password = "";
$database = "db_gentar";
$koneksi = mysqli_connect($host, $user, $password, $database);

require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf; 
$dompdf = new Dompdf(); 

//perintah query untuk mengambil data dari database kemudian mencetak data di file pdf
$last_id = mysqli_insert_id($koneksi);
$query    =mysqli_query($koneksi, "SELECT * FROM siswa_gentar WHERE id_siswa= (select max(id_siswa)from siswa_gentar)");

$html = '<center><h3>BUKTI PENDAFTARAN SISWA GENTAR "Generasi Pintar"</h3></center><hr/><br/>'; 
$html .= '<table border="1" width="100%">
<tr>
<th>ID</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Alamat</th>
<th>Asal Sekolah</th>
<th>No Telepon</th>
<th>Nama Ortu</th>
<th>Alamat Ortu</th>
<th>No Telp Ortu</th>
<th>Paket Siswa</th>
</tr>
'; 
//untuk mencetak data dari database pada tabel file pdf
while($row = mysqli_fetch_array($query))
{
$html .= 
"
<tr> 
<td>".$row['id_siswa']."</td>
<td>".$row['nama_siswa']."</td>
<td>".$row['tempatlahir_siswa']."</td>
<td>".$row['tanggal_lahir']."</td>
<td>".$row['alamat_siswa']."</td>
<td>".$row['asal_sekolah']."</td>
<td>".$row['notelepon_siswa']."</td>
<td>".$row['namaortu_siswa']."</td>
<td>".$row['alamat_ortu']."</td>
<td>".$row['notelp_ortu']."</td>
<td>".$row['paket_siswa']."</td>
</tr>
";
}
$html .= "</html>"; 
$dompdf ->loadHtml($html); 
// Setting ukuran dan orientasi kertas 
$dompdf->setPaper('A4', 'landscape', ''); 
// Rendering dari HTML Ke PDF 
$dompdf->render();
//Melakukan output file pdf 
$dompdf->stream('Bukti Pendaftaran GENTAR.pdf');
?>