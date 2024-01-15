<?php

if (isset($_POST['saveTask'])) {
    session_start();
    $id_login = @$_SESSION['karyawan'];

    $save = mysqli_query($con, "INSERT INTO tb_task (nama_task, id_user, id_posisi, tgl_mulai, tgl_selesai, status) 
                                VALUES ('$_POST[task]', '$id_login', '$_POST[posisi]', '$_POST[tgl_mulai]', '$_POST[tgl_selesai]', '$_POST[status]')");

    if ($save) {
        echo "
            <script type='text/javascript'>
            setTimeout(function () { 
                swal(' Data Berhasil disimpan', {
                    icon : 'success',
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-success'
                        }
                    },
                });    
            }, 10);  
            window.setTimeout(function(){ 
                window.location.replace('?page=task');
            }, 3000);   
            </script>";
    } else {
        echo "Error saving task: " . mysqli_error($con);
    }
} elseif (isset($_POST['editTask'])) {

    $editTask = mysqli_query($con, "UPDATE tb_task SET 
        nama_task='$_POST[task]',
        id_user='$id_login',  
        id_posisi='$_POST[posisi]',
        tgl_mulai='$_POST[tgl_mulai]',
        tgl_selesai='$_POST[tgl_selesai]',
        status='$_POST[status]' 
        WHERE id_task='$_POST[id]'
    ");
    if ($editTask) {
        echo "
            <script type='text/javascript'>
            setTimeout(function () { 
                swal(' Data Berhasil diubah', {
                    icon : 'success',
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-warning'
                        }
                    },
                });    
            }, 10);  
            window.setTimeout(function(){ 
                window.location.replace('?page=task');
            }, 3000);   
            </script>";
    } else {
        echo "Error updating task: " . mysqli_error($con);
    }
}
