<?php

if (isset($_POST['saveUser'])) {

	$pass = sha1($_POST['password']);
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = '../assets/img/user/';
	$nama_gambar = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_gambar);

	if ($pindah) {
		$save = mysqli_query($con, "INSERT INTO tb_user VALUES
		(NULL,'$_POST[nama]','$_POST[jabatan]','$_POST[email]','$pass','$nama_gambar') ");
		if ($save) {
			echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal( ' Data Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=user');
				} ,3000);   
				</script>";
		}
	}
} elseif (isset($_POST['editUser'])) {

	$gambar = @$_FILES['foto']['name'];
	if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
		$ganti = mysqli_query($con, "UPDATE tb_user SET foto='$gambar' WHERE id_user='$_POST[id]' ");
	}

	$editUser = mysqli_query($con, "UPDATE tb_user SET id_jabatan='$_POST[nama_jabatan]',nama_user='$_POST[nama]',foto ='$gambar' WHERE id_user='$_POST[id]' ");
	if ($editUser) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('Data Berhasil di Ubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-warning'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=user');
				} ,3000);   
				</script>";
	}
}
