<?php 
//  Menggunakan composer php spreadsheet
include 'homeadmin.php';
include('konfigurasi/konfig.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// inisiasi variabel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Tempat Lahir');
$sheet->setCellValue('D1', 'Tanggal Lahir');
$sheet->setCellValue('E1', 'Alamat');
$sheet->setCellValue('F1', 'Asal Sekolah');
$sheet->setCellValue('G1', 'Nomor Telepon');
$sheet->setCellValue('H1', 'Nama Orang Tua');
$sheet->setCellValue('I1', 'Alamat Orang Tua');
$sheet->setCellValue('J1', 'Nomor Telepon Orang Tua');
$sheet->setCellValue('K1', 'Paket');
// mencetak data ke excel
$query = mysqli_query($konek,"select * from siswa_gentar");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['nama_siswa']);
    $sheet->setCellValue('C'.$i, $row['tempatlahir_siswa']);
    $sheet->setCellValue('D'.$i, $row['tanggal_lahir']);
    $sheet->setCellValue('E'.$i, $row['alamat_siswa']);
    $sheet->setCellValue('F'.$i, $row['asal_sekolah']);
    $sheet->setCellValue('G'.$i, $row['notelepon_siswa']);
    $sheet->setCellValue('H'.$i, $row['namaortu_siswa']);
    $sheet->setCellValue('I'.$i, $row['alamat_ortu']);
    $sheet->setCellValue('J'.$i, $row['notelp_ortu']);
    $sheet->setCellValue('K'.$i, $row['paket_siswa']);
    $i++;
}

$styleArray = [
            'borders'=> [
                'allBorders'=> [
                    'borderStyle'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
$i = $i - 1;
$sheet->getStyle('A1:K'.$i)->applyFromArray($styleArray);

// menyimpan file excel
$writer = new Xlsx($spreadsheet);
$writer->save('Report Siswa Gentar.xlsx');
?>
<br><br>
<center><h3>Data berhasil di cetak dalam bentuk excel, silahkan kembali ke halaman utama</h3></center>

<?php include 'foot.php' ?>