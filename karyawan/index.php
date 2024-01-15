<?php
@session_start();
include '../config/db.php';

if (!isset($_SESSION['karyawan'])) {
?> <script>
		alert('Maaf ! Anda Belum Login !!');
		window.location = '../user.php';
	</script>
<?php
}
?>


<?php
// jumlah TASK	
session_start();
$id_login = @$_SESSION['karyawan'];
$jumlahTask = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_task WHERE id_user = '$id_login'"));


$sql = mysqli_query($con, "SELECT * FROM tb_user
WHERE id_user = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Karyawan |Aplikasi Laporan Manajemen</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

	<style>
		/* Add this style to change text and icon color to white */
		.nav a,
		.nav p,
		.nav i {
			color: #ffffffcc !important;
		}
	</style>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header d-flex justify-content-center align-items-center" style="background-color: #e96020;">
				<a href="index.php" class="logo text-white">
					<img src="../assets/img/ide_kite_logo_black-removebg-preview.png" alt="navbar brand" class="navbar-brand" width="35">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<!-- <i class="icon-menu"></i> -->
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar  navbar-header navbar-expand-lg  ">

				<div class="container-fluid">
					<!-- 	<div class="collapse" id="search-nav">
					 <form class="navbar-left navbar-form nav-search mr-md-3">
						 <div class="input-group">
							 <div class="input-group-prepend">
								 <button type="submit" class="btn btn-search pr-1">
									 <i class="fa fa-search search-icon"></i>
								 </button>
							 </div>
							 <input type="text" placeholder="Search ..." class="form-control">
						 </div>
					 </form>
				 </div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!-- <li class="nav-item toggle-nav-search hidden-caret">
						 <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
							 <i class="fa fa-search"></i>
						 </a>
					 </li> -->


						<!-- Profil akun -->
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/user/<?= $data['foto'] ?>" alt="foto profil" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/user/<?= $data['foto'] ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $data['nama_user'] ?></h4>
												<p class="text-muted"><?= $data['email'] ?></p>

											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#gantiPassword" class="collapsed">Ganti Password</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#pengaturanAkun" class="collapsed">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<style>
			.nav-item a {
				display: flex;
				align-items: center;
				padding: 10px 15px;

			}

			.nav-item img {
				margin-right: 10px;

			}

			.nav-item p {
				margin-bottom: 0;

			}
		</style>


		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper " style="background-color: #e96020;">

				<ul class="nav text-white">
					<li class="nav-item">
						<a href="index.php" class="nav-item active">
							<img src="../assets/img/ICON/ikon_dashboard-removebg-preview.png" alt="Dashboard Icon" width="24" height="24">
							<p class="fw-bold">Dashboard</p>
						</a>
					</li>

					<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
						<!-- <h4 class="text-section" style="color:#ffffff66">Main Utama</h4> -->
					</li>

					<li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'task') ? 'active' : ''; ?>">
						<a data-toggle="collapse" href="#task" class="collapsed">
							<img src="../assets/img/ICON/ikon_data_task-removebg-preview.png" alt="Tasks Icon" width="24" height="24">
							<p>Data Task</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="task">
							<ul class="nav nav-collapse">
								<li>
									<a href="?page=task&act=add">
										<span class="sub-item"> Tambah Task </span>
									</a>
								</li>
								<li>
									<a href="?page=task">
										<span class="sub-item"> Daftar Task </span>
									</a>
								</li>
							</ul>
						</div>
					</li>

					<li class="nav-item">
						<a href="logout.php" class="nav-link">
							<img src="../assets/img/ICON/ikon_logout-removebg-preview.png" alt="Logout Icon" width="24" height="24">
							<span>Logout</span>
						</a>
					</li>



					<!-- 
					 <li class="mx-4 mt-2">
						 <a href="logout.php" class="btn btn-primary btn-block"><span class="btn-label"> <i class="fas fa-arrow-alt-circle-left"></i> </span> Logout</a> 
					 </li> -->
				</ul>
			</div>
		</div>

		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php
				error_reporting();
				$page = @$_GET['page'];
				$act = @$_GET['act'];


				if ($page == 'task') {
					if ($act == '') {
						include 'modul/task/data.php';
					} elseif ($act == 'add') {
						include 'modul/task/add.php';
					} elseif ($act == 'edit') {
						include 'modul/task/edit.php';
					} elseif ($act == 'del') {
						include 'modul/task/del.php';
					} elseif ($act == 'proses') {
						include 'modul/task/proses.php';
					}
				} elseif ($page == 'change') {
					include 'modul/user/ganti_password.php';
				} elseif ($page == 'akun') {
					include 'modul/akun/akun.php';
				} elseif ($page == '') {
					include 'modul/home.php';
				} else {
					echo "<b>Tidak ada Halaman</b>";
				}


				?>


				<!-- end -->

			</div>
			<footer class="footer">
				<div class="container">
					<div class="copyright ml-center">
						&copy; <?php echo date('Y'); ?> SILAMA (<a href="index.php">POLITEKNIK NEGERI PONTIANAK </a> | YANI TIA RIFKA)
					</div>
				</div>
			</footer>
		</div>
		<!-- modal ganti password -->
		<div class="modal fade bs-example-modal-sm" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="gantiPass">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="gantiPass">Ganti Password</h4>
					</div>
					<form action="" method="post">
						<div class="modal-bod">
							<div class="form-group">
								<label class="control-label">Password Lama</label>
								<input name="pass" type="text" class="form-control" placeholder="Password Lama">
							</div>
							<div class="form-group">
								<label class="control-label">Password Baru</label>
								<input name="pass1" type="text" class="form-control" placeholder="Password Baru">
							</div>
						</div>
						<div class="modal-footer">
							<button name="changePassword" type="submit" class="btn text-white" style="background-color: #e96020;">Ganti Password</button>
							<button type="button" class="btn btn-default text-white" data-dismiss="modal">Close</button>
						</div>
					</form>
					<?php
					if (isset($_POST['changePassword'])) {
						$passLama = $data['password'];
						$pass = sha1($_POST['pass']);
						$newPass = sha1($_POST['pass1']);

						if ($passLama == $pass) {
							$set = mysqli_query($con, "UPDATE tb_user SET password='$newPass' WHERE id_user='$data[id_user]' ");
							echo "<script type='text/javascript'>
			 alert('Password Telah berubah')
			 window.location.replace('index.php'); 
			 </script>";
						} else {
							echo "<script type='text/javascript'>
			 alert('Password Lama Tidak cocok')
			 window.location.replace('./index.php'); 
			 </script>";
						}
					}
					?>


				</div>
			</div>
		</div>

		<!--end modal ganti password -->

		<!-- Modal pengaturan akun-->
		<div class="modal fade" id="pengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="akunAtur">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="akunAtur"><i class="fas fa-user-cog"></i> Pengaturan Akun</h3>
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="nama" class="form-control" value="<?= $data['nama_user'] ?>">
								<input type="hidden" name="id" value="<?= $data['id_user'] ?>">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="username" class="form-control" value="<?= $data['email'] ?>" readonly>
							</div>
							<div class="form-group">
								<label>Foto Profile</label>
								<p>
									<img src="../assets/img/user/<?= $data['foto'] ?>" class="img-thumbnail" style="height: 50px;width: 50px;">
								</p>
								<input type="file" name="foto">
							</div>
						</div>
						<div class="modal-footer">
							<button name="updateProfile" type="submit" class="btn text-white" style="background-color: #e96020;">Simpan</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
					<?php
					if (isset($_POST['updateProfile'])) {

						$gambar = @$_FILES['foto']['name'];
						if (!empty($gambar)) {
							move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
							$ganti = mysqli_query($con, "UPDATE tb_user SET foto='$gambar' WHERE id_user='[id]' ");
						}

						$sqlEdit = mysqli_query($con, "UPDATE tb_user SET nama_user='$_POST[nama]', email='$_POST[username]',foto='$gambar' WHERE id_user='$_POST[id]' ") or die(mysqli_error($konek));

						if ($sqlEdit) {
							echo "<script>
					 alert('Sukses ! Data berhasil diperbarui');
					 window.location='index.php';
					 </script>";
						}
					}
					?>
				</div>
			</div>
		</div>
		<!-- end modal pengaturan akun -->

	</div>
	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>



	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
</body>

</html>