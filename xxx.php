<?php
include 'ceksuhu.php';
include 'cekkelembaban.php';
include 'cekamonia.php';
include 'config.php';
include 'cekresult.php';

$waktu_sekarang = date("Y-m-d H:i:s");

// Lakukan koneksi ke database (gantilah ini dengan informasi koneksi Anda)
$conn = new mysqli("localhost", "root", "", "data_saya");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

while (true) {
    // Simulasikan pengambilan data dari sistem monitoring (gantilah ini dengan cara sebenarnya)
    $suhu = cekSuhu(); // Mengambil data suhu dari fungsi cekSuhu()
    $kelembaban = cekKelembaban(); // Mengambil data kelembaban dari fungsi cekKelembaban()
    $amonia = cekAmonia(); // Mengambil data amonia dari fungsi cekAmonia()
    $result = cekResult(); // Mengambil data result dari fungsi cekResult()

    // Simpan data ke database
    $sql = "INSERT INTO data_kandang (suhu, kelembaban, amonia, result, timestamp) VALUES ('$suhu', '$kelembaban', '$amonia', '$result', '$waktu_sekarang')";
    if ($conn->query($sql) === TRUE) {
        // Kirim data ke klien melalui SSE
        $data = array('suhu' => $suhu, 'kelembaban' => $kelembaban, 'amonia' => $amonia, 'result' => $result);
        echo "data: " . json_encode($data) . "\n\n";
        ob_flush();
        flush();
    }

    // Tunggu 5 detik sebelum mengirim data berikutnya (saya mengganti 1 detik menjadi 5 detik)
    sleep(5);
}

// Tutup koneksi database (tidak akan tercapai dalam kasus ini)
$conn->close();
?>
