<?php
class SMARTE {
    private $datasuhu;
    private $datakelembaban;
    private $dataamonia;
    
    function __construct($datasuhu, $datakelembaban, $dataamonia) {
        $this->suhu = $datasuhu;
        $this->kelembaban = $datakelembaban;
        $this->amonia = $dataamonia;
    }
    
    private function normalize($value, $min, $max) {
        return ($value - $min) / ($max - $min);
    }
    
    public function calculate() {
        $suhu_min = 28;
        $suhu_max = 32;
        
        $kelembaban_min = 60;
        $kelembaban_max = 70;
        
        $amonia_min = 0;
        $amonia_max = 25;
        
        $suhu_norm = $this->normalize($this->suhu, $suhu_min, $suhu_max);
        $kelembaban_norm = $this->normalize($this->kelembaban, $kelembaban_min, $kelembaban_max);
        $amonia_norm = $this->normalize($this->amonia, $amonia_min, $amonia_max);
        
        // Bobot untuk tiap kriteria
        $w_suhu = 0.1;
        $w_kelembaban = 0.1;
        $w_amonia = 0.3;
        
        // Menghitung nilai total
        $total = ($suhu_norm * $w_suhu) + ($kelembaban_norm * $w_kelembaban) + ($amonia_norm * $w_amonia);
        
        return $total;
    }
}


$smarte = new SMARTE($datasuhu, $datakelembaban, $dataamonia);
$total_hasil = $smarte->calculate();

$result_text = ''; // Variabel baru untuk hasil

if ($total_hasil >= 0.5) {
    $result_text = 'Kondisi kandang Baik';
} elseif ($total_hasil >= 0.4) {
    $result_text = 'Kondisi kandang Sedang';
} else {
    $result_text = 'Kondisi kandang Buruk';
}
return $result_text;
?>