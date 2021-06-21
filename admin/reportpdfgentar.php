<?php 
include('konfigurasi/konfig.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf ();
$query = mysqli_query($konek,"select * from siswa_gentar");
$html = '<center><h3>Daftar Pendaftar Bimbingan Belajar GENTAR</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>Nomor</th>
<th>Nama Siswa</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Alamat</th>
<th>Asal Sekolah</th>
<th>Nomor Telepon</th>
<th>Nama Orang Tua</th>
<th>Alamat Orang Tua</th>
<th>Nomor Telepon Orang Tua</th>
<th>Paket Siswa</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
    <td>".$no."</td>
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
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_bimbelgentar.pdf');
?>