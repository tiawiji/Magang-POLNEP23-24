<?php
session_start();

$id_login = @$_SESSION['karyawan'];

$edit = mysqli_query($con, "SELECT tb_task.*, tb_user.nama_user 
                            FROM tb_task 
                            INNER JOIN tb_user ON tb_task.id_user = tb_user.id_user 
                            WHERE tb_task.id_task='$_GET[id]' AND tb_task.id_user='$id_login'");

foreach ($edit as $t) ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Task</h4>
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
				<a href="#">Data Task</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Edit Task</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h3 class="h4">Form Edit Task</h3>
				</div>
				<div class="card-body">

					<form action="?page=task&act=proses" method="post" enctype="multipart/form-data">
						<input name="id" type="hidden" value="<?= $t['id_task'] ?>">

						<table cellpadding="12" style="font-weight: bold; margin-bottom: 20px;">
							<tr>
								<td>Nama Task </td>
								<td>:</td>
								<td><input type="text" class="form-control" name="task" value="<?= $t['nama_task']  ?> " autofocus maxlength="255"></td>
							</tr>
							<tr>
								<td>Assigned</td>
								<td>:</td>
								<td><input name="nama" type="text" class="form-control" value="<?= $t['nama_user'] ?>" readonly> </td>
							</tr>
							<tr>
								<td>Posisi </td>
								<td>:</td>
								<td>
									<select class="form-control" name="posisi">
										<?php
										$sqlPosisi = mysqli_query($con, "SELECT * FROM tb_posisi ORDER BY id_posisi ASC");
										while ($posisi = mysqli_fetch_array($sqlPosisi)) {
											$selected = ($posisi['id_posisi'] == $t['id_posisi']) ? 'selected' : '';
											echo "<option value='$posisi[id_posisi]' $selected>$posisi[posisi]</option>";
										}
										?>
									</select>
								</td>

							</tr>
							<tr>
								<td>Diberikan</td>
								<td>:</td>
								<td><input name="tgl_mulai" type="date" class="form-control" value="<?= $t['tgl_mulai'] ?>"></td>
							</tr>
							<tr>
								<td>Deadline</td>
								<td>:</td>
								<td><input name="tgl_selesai" type="date" class="form-control" value="<?= $t['tgl_selesai'] ?>"></td>
							</tr>
							<tr>
								<td>Status </td>
								<td>:</td>
								<td>
									<select name="status" class="form-control">
										<option value="Not Started" <?= ($t['status'] == 'Not Started') ? 'selected' : ''; ?>>Not Started</option>
										<option value="In Progress" <?= ($t['status'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
										<option value="Done" <?= ($t['status'] == 'Done') ? 'selected' : ''; ?>>Done</option>
									</select>
								</td>

							</tr>
							<td colspan="4">
								<button name="editTask" type="submit" class="btn text-white" style="background-color: #e96020;"></i> Update</button>
								<a href="javascript:history.back()" class="btn text-white" style="background-color: darkblue;" class="fa "></i> Close</a>
							</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>