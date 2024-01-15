<?php
@session_start();
include '../config/db.php';

if (!isset($_SESSION['manager'])) {
?>
	<script>
		alert('Maaf ! Anda Belum Login !!');
		window.location = '../user.php';
	</script>
<?php
}
?>


<?php
$id_login = @$_SESSION['manager'];
$sql = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

$jumlahTask = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_task WHERE id_task "));
// jumlah karyawan

$jumlahKaryawan = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_user WHERE id_jabatan='2' "));
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Manager | Aplikasi Laporan Manajemen</title>
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="path/to/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<style>
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
					<button class="btn btn-toggle toggle-sidebar"></button>
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

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper " style="background-color: #e96020;">
				<ul class="nav text-white">
					<li class="nav-item">
						<a href="index.php" class="nav-link active">
							<div class="d-flex align-items-center">
								<img src="../assets/img/ICON/ikon_dashboard-removebg-preview.png" alt="Dashboard Icon" width="24" height="24" class="me-2">
								<p class="fw-bold mb-0">Dashboard</p>
							</div>
						</a>
					</li>

					<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
					</li>

					<li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'task') ? 'active' : ''; ?>">
						<a href="?page=task" class="nav-link">
							<div class="d-flex align-items-center">
								<img src="../assets/img/ICON/ikon_data_task-removebg-preview.png" alt="Tasks Icon" width="24" height="24" class="me-2">
								<p class="mb-0">Data Task</p>
							</div>
						</a>
					</li>

					<li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'karyawan') ? 'active' : ''; ?>">
						<a href="?page=karyawan" class="nav-link">
							<div class="d-flex align-items-center">
								<img src="../assets/img/ICON/ikon_data_karyawan-removebg-preview.png" alt="Employees Icon" width="24" height="24" class="me-2">
								<p class="mb-0">Data Karyawan</p>
							</div>
						</a>
					</li>

					<li class="nav-item">
						<a href="logout.php" class="nav-link">
							<div class="d-flex align-items-center">
								<img src="../assets/img/ICON/ikon_logout-removebg-preview.png" alt="Logout Icon" width="24" height="24" class="me-2">
								<span>Logout</span>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<style>
			.nav-item img {
				margin-right: 8px;
			}

			.nav-item p {
				margin-bottom: 0;
			}
		</style>

		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<?php
				error_reporting();
				$page = @$_GET['page'];
				$act = @$_GET['act'];

				if ($page == 'karyawan') {
					if ($act == '') {
						include 'modul/karyawan/data.php';
					} elseif ($act == 'edit') {
						include 'modul/karyawan/edit.php';
					} elseif ($act == 'proses') {
						include 'modul/karyawan/proses.php';
					}
				} elseif ($page == 'akun') {
					include 'modul/akun/akun.php';
				} elseif ($page == '') {
					include 'modul/home.php';
				} elseif ($page == 'task') {
					if ($act == '') {
						include 'modul/task/data.php';
					}
				} else {
					echo "<b>Tidak ada Halaman</b>";
				}
				?>
			</div>
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
    $id_user = $_POST['id'];
    $nama_user = $_POST['nama'];
    $email = $_POST['username'];

    // Handle file upload
    $gambar = @$_FILES['foto']['name'];
    $temp_file = @$_FILES['foto']['tmp_name'];

    // Check if the file is an image
    $check = getimagesize($temp_file);
    if ($check !== false) {
        // Check if the image dimensions are 720x720 pixels
        list($width, $height) = $check;
        if ($width == 720 && $height == 720) {
            // Move the uploaded file
            move_uploaded_file($temp_file, "../assets/img/user/$gambar");

            // Update the user data in the database
            $sqlUpdate = mysqli_query($con, "UPDATE tb_user SET nama_user='$nama_user', email='$email', foto='$gambar' WHERE id_user='$id_user'");

            if ($sqlUpdate) {
                echo "<script>
                    alert('Sukses! Data berhasil diperbarui');
                    window.location='index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Gagal! Terjadi kesalahan saat memperbarui data');
                    window.location='index.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Gagal! Dimensi foto harus 720x720 piksel');
                window.location='index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Gagal! File yang diunggah bukan gambar');
            window.location='index.php';
        </script>";
    }
}
?>

			</div>
		</div>
	</div>
	<!-- end modal pengaturan akun -->



	<!-- Core JS Files -->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<!-- <script src="../assets/js/core/bootstrap.min.js"></script> -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>


	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="../assets/js/plugin/datatables/dataTables.js"></script>
	<script src="../assets/js/plugin/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/js/plugin/datatables/dataTables.buttons.min.js"></script>
	<script src="../assets/js/plugin/datatables/buttons.bootstrap4.min.js"></script>
	<script src="../assets/js/plugin/datatables/jszip.min.js"></script>
	<script src="../assets/js/plugin/datatables/pdfmake.min.js"></script>
	<script src="../assets/js/plugin/datatables/vfs_fonts.js"></script>
	<script src="../assets/js/plugin/datatables/buttons.html5.min.js"></script>
	<script src="../assets/js/plugin/datatables/buttons.print.min.js"></script>
	<script src="../assets/js/plugin/datatables/buttons.colVis.min.js"></script>


</body>

</html>