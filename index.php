<?php
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login | Laporan Manajemen Manager </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="assets/css/mystyle.css"> -->
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/_login/css/main.css">
	<!--===============================================================================================-->
</head>
<style>
		.wrap-login100 {
			background: rgba(255, 255, 255, 0.8);
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		.limiter {
		min-height: 100vh;
		display: flex;
		align-items: center;
		background-image: url('./assets/img/bg2.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
		position: relative; 
		-webkit-mask-image: linear-gradient(rgba(0, 0, 0, 1) 85%, rgba(0, 0, 0, 0));
		mask-image: linear-gradient(rgba(0, 0, 0, 1) 85%, rgba(0, 0, 0, 0));
		
	}

</style>


<body>

	<nav class="navbar fixed-top shadow p-3 mb-5 " style="background-color: #e96020;">
		<div class="container">

		</div>
	</nav>

	<div class="limiter">
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="wrap-login100 ">
					<form method="post" action="" class="login100-form validate-form">
						<span class="login100-form-title b-15">
							<!-- <i class="zmdi zmdi-font"></i> -->

							<img src="assets/img/LOGOPOLNEP.png" alt="Polnep Logo" class="mb-4" width="80">
							<img src="assets/img/idekitelogo-removebg-preview.png" alt="Idekite Logo" class="mb-4" width="150"><br><br>

						</span>
						<!-- <span class="login100-form-title p-b-26">
							POLITEKNIK NEGERI PONTIANAK
						</span> -->

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="username" value="<?php echo isset($_SESSION['registered_email']) ? $_SESSION['registered_email'] : ''; ?>">
							<span class="focus-input100" data-placeholder="Username"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100" type="password" name="password" value="<?php echo isset($_SESSION['registered_password']) ? $_SESSION['registered_password'] : ''; ?>">							<span class="focus-input100" data-placeholder="Password"></span>
						</div>



						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button type="submit" class="login100-form-btn" style="background-color: #e96020;">
									Login
								</button>
							</div>
						</div>
					</form><br>
					<div class="register-link">
						<p>Belum punya akun? <a href="daftar.php" style="color: #e96020;"> Register Akun</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = sha1($_POST['password']);

		$sqlCek = mysqli_query($con, "SELECT * FROM tb_user WHERE email='$username' AND password='$password'");
		$row = mysqli_fetch_assoc($sqlCek);

		if ($row) {
			$userId = $row['id_user'];
			$jabatanId = $row['id_jabatan'];

			$sqlGetJabatan = mysqli_query($con, "SELECT * FROM tb_jabatan WHERE id_jabatan = $jabatanId");
			$jabatanRow = mysqli_fetch_assoc($sqlGetJabatan);

			$jabatan = $jabatanRow['nama_jabatan'];

			switch ($jabatan) {
				case 'Manager':
					$_SESSION['manager'] = $userId;
					$redirectURL = './manager/';
					break;
				case 'Karyawan':
					$_SESSION['karyawan'] = $userId;
					$redirectURL = './karyawan/';
					break;
				case 'CEO':
					$_SESSION['ceo'] = $userId;
					$redirectURL = './ceo/';
					break;
					// Tambahkan lebih banyak kasus untuk posisi lain (CEO, dll.) jika diperlukan

				default:
					// Tangani peran yang tidak dikenal atau arahkan ke halaman default
					$redirectURL = './';
			}

			echo "
				<script type='text/javascript'>
					setTimeout(function () { 
						swal('($row[nama_user]) ', 'Login berhasil', {
							icon: 'success',
							buttons: {                    
								confirm: {
									className: 'btn btn-success'
								}
							},
						});    
					}, 10);  
					window.setTimeout(function () { 
						window.location.replace('$redirectURL');
					}, 3000);   
				</script>";
		} else {
			echo "
				<script type='text/javascript'>
					setTimeout(function () { 
						swal('Maaf!', 'Username / Password Salah', {
							icon: 'error',
							buttons: {                    
								confirm: {
									className: 'btn btn-danger'
								}
							},
						});    
					}, 10);  
					window.setTimeout(function () { 
						window.location.replace('./');
					}, 3000);   
				</script>";
		}
	}
	?>
	</div>
	</div>
	</div>


	</div>
	<footer class="footer mt-5">
    <div class="container text-center">
        <p>&copy; 2023 Putri Yani, Rifka Dwi Juni, Tia Wiji Lestari. POLITEKNIK NEGERI PONTIANAK.</p>
    </div>
</footer>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="assets/_login/js/main.js"></script>


</body>

</html>