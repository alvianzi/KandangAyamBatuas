<?php

include 'config.php';

session_start();

error_reporting(0);



if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $role = $row['role']; // Ambil peran pengguna dari database

        // Menyimpan peran pengguna dalam sesi
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $role;

        // Redirect sesuai dengan peran pengguna
        if ($role === 'peternak') {
            header("Location: latihan.php"); // Ganti dengan halaman khusus untuk pengguna
        } elseif ($role === 'admin') {
            header("Location: welcome.php"); // Ganti dengan halaman khusus untuk admin
        } else {
            // Jika peran tidak sesuai, berikan pesan kesalahan
            echo "<script>alert('Woops! Peran pengguna tidak valid.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Batuas SmartFarm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- Other -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    
    <!-- Login Start -->
    <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.php" class=""> <CENTER>
                                <h3 class="text-primary"><img src="img/suhu.png" alt="Grafik" class="img-responsive"></i>Batuas SmartFarm</h3>
</CENTER>
                            </a>
                        </div>
                            <!-- End -->
                            
	<div class="container-fluid">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group-floating mb-3">
				<input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
			<div class="input-group-floating mb-4">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group ">
				<button name="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
			</div>
			
		</form>
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
