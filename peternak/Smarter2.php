<?php
include 'ceksuhu.php';
include 'cekkelembaban.php';
include 'cekamonia.php';
include 'config.php';
$waktu_sekarang = date("Y-m-d H:i:s");



session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <meta charset="utf-8">
    <title>Batuas SmartFarm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="asset/lib/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">

	<style>
		body {
			
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		table {
			margin: auto;
			border-collapse: collapse;
			width: 80%;
			margin-top: 50px;
		}
		th, td {
			padding: 15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
        .good {
            color: green;
        }
        .bad {
            color: red;
        }
	</style>
    <!-- Real Time -->
    <script type = "text/javascript" src ="asset/jquery/jquery.min.js"> </script>
    
    <!-- Load Otomtis Realtime -->
    <script type = "text/javascript">
    $(document).ready(function() {
        setInterval( function() {
            $('#ceksuhu').load("ceksuhu.php");
        } , 5000 );
    });
    </script>

    
<script type = "text/javascript">
    $(document).ready(function() {
        setInterval( function() {
            $('#cekkelembaban').load("cekkelembaban.php");
        } , 5000 );
    });
    </script>

    
<script type = "text/javascript">
    $(document).ready(function() {
        setInterval( function() {
            $('#cekamonia').load("cekamonia.php");
        } , 5000 );
    });
    </script>
</head>

<body>
	 <!-- Sidebar Start -->
	 <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Iot SmartFarm</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                    <?php
                    if (isset($_SESSION['username'])) {
                        // Tampilkan nama pengguna dari sesi jika pengguna sudah login
                        echo $_SESSION['username'];
                    } else {
                        echo "error"; // Tampilkan nama default jika belum login
                    }
?>
                        <span>Peternak</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="welcome.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Smarter.php" class="dropdown-item active">Smarter</a>
                            <a href="status.php" class="dropdown-item">Status</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    
                    
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            

                            <a href="logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="welcome.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		table {
			margin: auto;
			border-collapse: collapse;
			width: 80%;
			margin-top: 50px;
		}
		th, td {
			padding: 15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #800000;
			color: white;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>
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
        $w_kelembaban = 0.2;
        $w_amonia = 0.3;
        
        // Menghitung nilai total
        $total = ($suhu_norm * $w_suhu) + ($kelembaban_norm * $w_kelembaban) + ($amonia_norm * $w_amonia);
        
        return $total;
    }
}
?>

<body>

	<h1>Hasil Klasifikasi Smarter</h1>

	<table>
		<tr>
			<th>Kriteria</th>
			<th>Nilai</th>
			<th>Status</th>
		</tr>
		<tr>
			<td>Suhu</td>
			<td><span id="ceksuhu">0,0'</span></td>
			<?php if ($datasuhu >= 28 && $datasuhu <= 32) { ?>
				<td class="good">Baik</td>
			<?php } else { ?>
				<td class="bad">Buruk</td>
			<?php } ?>
		</tr>
		<tr>
			<td>Kelembaban</td>
			<td><span id="cekkelembaban">0,0'</span></td>
			<?php if ($datakelembaban >= 60 && $datakelembaban <= 70) { ?>
				<td class="good">Baik</td>
			<?php } else { ?>
				<td class="bad">Buruk</td>
			<?php } ?>
		</tr>
		<tr>
			<td>Amonia</td>
			<td> <span id="cekamonia">0,0 ppm</span></td>
			<?php if ($dataamonia >= 0 && $dataamonia <= 25) { ?>
				<td class="good">Baik</td>
			<?php } else { ?>
				<td class="bad">Buruk</td>
			<?php } ?>
		</tr>
		
	</table>
	<center>
	<?php 
$smarte = new SMARTE($datasuhu, $datakelembaban, $dataamonia);
$total_hasil = $smarte->calculate();

$result_text = ''; // Variabel baru untuk hasil

if ($total_hasil >= 0.5) {
    $result_text = 'Kondisi kandang Baik';
} elseif ($total_hasil >= 0.2) {
    $result_text = 'Kondisi kandang Sedang';
} else {
    $result_text = 'Kondisi kandang Buruk';
}

echo '<p class="result">' . $result_text . '</p>'; // Menampilkan hasil

        ?>
</center>

    <div id="monitoring-data"></div>

    <script>
        // Buat koneksi SSE ke server
        var eventSource = new EventSource("monitoring.php");

        // Tangani data yang diterima dari server
        eventSource.onmessage = function(event) {
            var monitoringData = JSON.parse(event.data);
            // Tampilkan data monitoring di halaman
            document.getElementById("monitoring-data").innerHTML = "Suhu: " + monitoringData.suhu + "°C<br>Kelembaban: " + monitoringData.kelembaban + "%<br>Amonia: " + monitoringData.amonia + " ppm";
        };
    </script>

<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/chart/chart.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset/lib/tempusdominus/js/moment.min.js"></script>
    <script src="asset/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
</body>
</html>