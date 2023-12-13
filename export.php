<?php
require 'config.php'; // Import file konfigurasi database
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Buat objek spreadsheet
$spreadsheet = new Spreadsheet();

// Buat objek worksheet
$worksheet = $spreadsheet->getActiveSheet();

// Atur header kolom
$worksheet->setCellValue('A1', 'Suhu');
$worksheet->setCellValue('B1', 'Kelembaban');
$worksheet->setCellValue('C1', 'Amonia');
$worksheet->setCellValue('D1', 'Waktu');

// Query untuk mengambil data dari tabel 'data_kandang'
$query = "SELECT suhu, kelembaban, amonia, waktu FROM data_kandang ORDER BY waktu DESC";
$result = mysqli_query($conn, $query);

$row = 2; // Baris pertama data

while ($data = mysqli_fetch_assoc($result)) {
    $worksheet->setCellValue('A' . $row, $data['suhu']);
    $worksheet->setCellValue('B' . $row, $data['kelembaban']);
    $worksheet->setCellValue('C' . $row, $data['amonia']);
    $worksheet->setCellValue('D' . $row, $data['waktu']);
    $row++;
}

// Membuat file Excel
$writer = new Xlsx($spreadsheet);

// Mengatur header untuk mengunduh file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data_kandang.xlsx"');
$writer->save('php://output');
