<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    $role = $_POST['role'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, role)
					VALUES ('$username', '$email', '$password', '$role')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$role = ";";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}

	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

    <title>SmartFarm Batuas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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

 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form </title>
</head>
<body  style="background-image: 2.jpg;">
<div class="container-fluid">
	<!-- Box -->
	<div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SmartFarm</h3>
                            </a>
                        
                        </div>
		<!-- Box-End -->
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group-floating mb-3">
				<input type="text" class="form-control" id="floatingText" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group-floating mb-3">
				<input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group-floating mb-4">
				<input type="password" class="form-control" id="floatingPassword"   placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group-floating mb-4">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group-floating mb-4">
            <label for="role">Role</label>
            <select class="form-control" id="role" id="floatingInput" placeholder="role" name="role" value="<?php echo $role; ?>" required>
            <option value="admin">Admin</option>
            <option value="peternak">Peternak</option>
            </select>
            </div>
			<div class="input-group">
				<button name="submit" class="btn btn-primary py-3 w-100 mb-4">Register</button>
			</div>
			<p class="text-center mb-0">Selesai Menambah <a href="welcome.php">kembali</a>.</p>
		</form>
	</div>

	
</body>
</html>
