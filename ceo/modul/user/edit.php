<?php
$edit = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$_GET[id]' ");
foreach ($edit as $k)
?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">User</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Data User</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Edit User</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h2 class="h2 fw-bold">Form Edit User</h2>
				</div>
				<div class="card-body">
					<form action="?page=user&act=proses" method="post" enctype="multipart/form-data">
						<input name="id" type="hidden" value="<?= $k['id_user'] ?>">
						<div class="form-group">
							<label>Nama User</label>
							<input name="nama" type="text" class="form-control " value="<?= $k['nama_user']  ?>" autofocus>
						</div>

						<div class="form-group">
							<label for="jabatan">Jabatan</label>
							<select class="form-control" name="nama_jabatan">
								<?php
								$sqlJabatan = mysqli_query($con, "SELECT * FROM tb_jabatan ORDER BY id_jabatan ASC");
								while ($jabatan = mysqli_fetch_array($sqlJabatan)) {
									$selected = ($jabatan['id_jabatan'] == $k['id_jabatan']) ? "selected" : "";

									echo "<option value='$jabatan[id_jabatan]' $selected>$jabatan[nama_jabatan]</option>";
								}
								?>
							</select>
						</div>

						<!-- <div class="form-group">
							<label>E-mail</label>
							<input name="email" type="text" class="form-control " style="background: rgba(233, 97, 32, 0.53);" value="<?= $k['email'] ?>">
						</div> -->


						<div class="form-group">
							<label>Foto</label>
							<p>
								<img src="../assets/img/user/<?= $k['foto']; ?>" class="form-control" style="height: 65px; width: 65px;">
							</p>
							<input type="file" name="foto">
						</div>



						<div class="form-group">
							<button name="editUser" type="submit" class="btn text-white " style="background-color: #e96020;"><i class="fa fa-save"></i> Update</button>
							<a href="javascript:history.back()" class="btn btn-warning"><i class="fa "></i> Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>