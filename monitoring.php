<?php
function cekdata()
{
    $url = "https://platform.antares.id:8443/~/antares-cse/antares-id/KandangAyam_Bantuas/Data1/la";
    $headers = [
        "X-M2M-Origin:d62b58a24f685c68:e294312a591f2234"
    ];

    // Memasukan header
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    // Mengubah format JSON ke array asosiatif
    $dataJson = json_decode($response, true);
    
    return $dataJson['m2m:cin']['con'];
}

$data = json_decode(cekdata(), true);

$amonia = number_format($data['amonia'], 2);
$kelembaban = number_format($data['humidity'], 0);
$suhu = number_format($data['temperature'], 1);


class SMARTE {
    private $suhu;
    private $kelembaban;
    private $amonia;
    
    function __construct($suhu, $kelembaban, $amonia) {
        $this->suhu = $suhu;
        $this->kelembaban = $kelembaban;
        $this->amonia = $amonia;
    }
    
    private function normalize($value, $min, $max) {
        return ($value - $min) / ($max - $min);
    }
    
    public function calculate() {
        $suhu_min = 30;
        $suhu_max = 38;
        
        $kelembaban_min = 60;
        $kelembaban_max = 70;
        
        $amonia_min = 0;
        $amonia_max = 25;
        
        $suhu_norm = $this->normalize($this->suhu, $suhu_min, $suhu_max);
        $kelembaban_norm = $this->normalize($this->kelembaban, $kelembaban_min, $kelembaban_max);
        $amonia_norm = $this->normalize($this->amonia, $amonia_min, $amonia_max);
        
        // Bobot untuk tiap kriteria
        $w_suhu = 1;
        $w_kelembaban = 1;
        $w_amonia = 4;
        
        // Menghitung nilai total
        $total = ($suhu_norm * $w_suhu) + ($kelembaban_norm * $w_kelembaban) + ($amonia_norm * $w_amonia);
        
        return $total;
    }
}
global $result_text; // Variabel baru untuk hasil
$smarte = new SMARTE($suhu, $kelembaban, $amonia);
$total_hasil = $smarte->calculate();

if ($total_hasil <= 1) {
    $result_text = 'kandang Baik';
    echo $result_text;
} elseif ($total_hasil >= 4) {
    $result_text = 'kandang Sedang';
    echo $result_text;
} else {
    $result_text = 'kandang Buruk';
    echo $result_text;
}

// Lakukan koneksi ke database (gantilah ini dengan informasi koneksi Anda)
$conn = new mysqli("localhost", "root", "", "data_saya");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data monitoring dari database (gantilah dengan query Anda)
$sql = "INSERT INTO data_kandang (suhu, kelembaban, amonia, result) VALUES ($suhu, $kelembaban, $amonia, 'kandang Buruk')";


if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dimasukkan ke database.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>