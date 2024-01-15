<?php

if (isset($_POST['saveKaryawan'])) {

	$save = mysqli_query($con, "INSERT INTO tb_task  VALUES ('$_POST[nama_user]', '$_POST[posisi]'");

	if ($save) {
		echo "
            <script type='text/javascript'>
            setTimeout(function () { 
                swal('Data Berhasil disimpan', {
                    icon : 'success',
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-success'
                        }
                    },
                });    
            }, 10);  
            window.setTimeout(function(){ 
                window.location.replace('?page=karyawan');
            }, 3000);   
            </script>";
	} else {
		echo "Error saving task: " . mysqli_error($con);
	}
} elseif (isset($_POST['editKaryawan'])) {

	$editKaryawan = mysqli_query($con, "UPDATE tb_task SET id_user='$_POST[nama]',id_posisi='$_POST[posisi]' WHERE id_task='$_POST[id]' ");

	if ($editKaryawan) {
		echo "
            <script type='text/javascript'>
            setTimeout(function () { 
                swal( 'Data Berhasil diubah', {
                    icon : 'success',
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-warning'
                        }
                    },
                });    
            }, 10);  
            window.setTimeout(function(){ 
                window.location.replace('?page=karyawan');
            }, 3000);   
            </script>";
	} else {
		echo "Error updating task: " . mysqli_error($con);
	}
}
