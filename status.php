<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="welcome.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Smarter.php" class="dropdown-item">Smarter</a>
                            <a href="status.php" class="dropdown-item active">Status</a>
                            <a href="daftarakun.php" class="dropdown-item">Daftar Anggota</a>
                            <a href="register.php" class="dropdown-item">Tambah Akun Peternak</a>
                        </div>
                    </div>
                    
                    <a href="printdata.php" class="nav-item nav-link"><i class="fas fa-print me-2"></i>Print Data</a>
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
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2"> 
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                            
                                    <div class="ms-2">
                                
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                    <div class="nav-item dropdown">   
                    <div class="nav-item dropdown">
                      
                         </div>
                </div>
            </nav>
            <!-- Navbar End -->

	<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Status Monitoring</h6>
                            <table class="table">
                                <thead>
		<tr>
			<th>Kriteria</th>
			<th>Nilai</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>Suhu</td>
			<?php $suhu = rand(28, 32); ?>
			<td><?php echo $suhu; ?> &#8451;</td>
			<?php if ($suhu >= 28 && $suhu <= 32) { ?>
				<td class="good">Baik</td>
			<?php } else { ?>
				<td class="bad">Buruk</td>
			<?php } ?>
		</tr>
		<tr>
			<td>Kelembaban</td>
			<?php $kelembaban = rand(60, 70); ?>
			<td><?php echo $kelembaban; ?> %</td>
			<?php if ($kelembaban >= 60 && $kelembaban <= 70) { ?>
				<td class="good">Baik</td>
			<?php } else { ?>
				<td class="bad">Buruk</td>
			<?php } ?>
		</tr>
		<tr>
			<td>Amonia</td>
			<?php $amonia = rand(0, 25); ?>
			<td><?php echo $amonia; ?> ppm</td>
			<?php if ($amonia >= 0 && $amonia <= 25) { ?>
				<td class="good">Baik</td>
			<?php } else { ?>
				<td class="bad">Buruk</td>
			<?php } ?>
		</tr>
			</tbody>
			
	</table>
	</div>
                    </div>
	<center>
	<?php 
	
		if ($suhu >= 28 && $suhu <= 32 && $kelembaban >= 60 && $kelembaban <= 70 && $amonia >= 0 && $amonia <= 25) {
			echo '<p class="result good">Kondisi kandang Baik</p>';
		} else {
			echo '<p class="result bad">Kondisi kandang Buruk</p>';
		}
	?>
</center>
  <!-- Footer Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                             <a href="#">Batua SmartFarm</a> 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Creator  <a href="https://instagram.com/alvianusnestha?igshid=YTQwZjQ0NmI0OA==" target="_blank">Alvianus Nestha</a>
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