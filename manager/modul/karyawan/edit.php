<?php
$edit = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user=$_GET[id] ");
foreach ($edit as $k)
?>
<div class="page-inner">
	<div class="page-header">
		<!-- <h4 class="page-title">User</h4> -->
		<!-- <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="#">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Data Pegawai</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Edit Pegawai</a>
              </li>
            </ul> -->
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h2 class="h2 fw-bold">Form Edit Karyawan</h2>
				</div>
				<div class="card-body">
					<form action="?page=karyawan&act=proses" method="post" enctype="multipart/form-data">
						<input name="id" type="hidden" value="<?= $k['id_user'] ?>">
						<div class="form-group">
							<label>Nama User</label>
							<input name="nama" type="text" class="form-control " style="background: rgba(233, 97, 32, 0.53);" value="<?= $k['nama_user'] ?>" readonly>
						</div>

						<div class="form-group">
							<label for="posisi">Posisi</label>
							<select class="form-control" name="posisi">
								<?php
								$sqlPosisi = mysqli_query($con, "SELECT * FROM tb_posisi ORDER BY id_posisi ASC");
								while ($posisi = mysqli_fetch_array($sqlPosisi)) {

									if ($posisi['id_posisi'] == $k['id_posisi']) {
										$selected = "selected";
									} else {
										$selected = '';
									}
									echo "<option value='$posisi[id_posisi]' $selected>$posisi[posisi]</option>";
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<button name="editKaryawan" type="submit" class="btn text-white " style="background-color: #e96020;"><i class="fa fa-save"></i> Update</button>
							<a href="javascript:history.back()" class="btn btn-warning"><i class="fa "></i> Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>