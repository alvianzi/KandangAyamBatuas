<?php
function datakelembaban()
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

$data = json_decode(datakelembaban(), true);
$kelembaban= number_format($data['humidity'], 0);

        echo $kelembaban;
?>
