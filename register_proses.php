<?php
session_start();
include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $hashed_password = sha1($password); // Melakukan hash pada password

    $jabatan = mysqli_real_escape_string($con, $_POST['jabatan']);

    // Cek apakah jabatan yang dimasukkan ada di dalam tabel tb_jabatan
    $checkJabatanQuery = "SELECT * FROM tb_jabatan WHERE nama_jabatan = '$jabatan'";
    $result = mysqli_query($con, $checkJabatanQuery);

    if (mysqli_num_rows($result) > 0) {
        // Jabatan tersedia, lanjutkan proses pendaftaran
        $jabatanRow = mysqli_fetch_assoc($result);
        $id_jabatan = $jabatanRow['id_jabatan'];

        $insertQuery = "INSERT INTO tb_user (nama_user, email, password, id_jabatan) VALUES ('$nama', '$username', '$hashed_password', '$id_jabatan')";

        if (mysqli_query($con, $insertQuery)) {
            // Registrasi berhasil
            $_SESSION['registered_email'] = $username;
            $_SESSION['registered_password'] = $password;
            echo "
                <script type='text/javascript'>
                    alert('Registrasi berhasil!');
                    window.location.replace('./index.php'); // Redirect ke halaman login
                </script>";
        } else {
            // Registrasi gagal
            echo "
                <script type='text/javascript'>
                    alert('Registrasi gagal. Mohon coba lagi.');
                    window.location.replace('./daftar.php'); // Redirect kembali ke formulir registrasi
                </script>";
        }
    } else {
        // Jabatan yang dimasukkan tidak tersedia di dalam tabel tb_jabatan
        echo "
            <script type='text/javascript'>
                alert('Jabatan tidak valid.');
                window.location.replace('./daftar.php'); // Redirect kembali ke formulir registrasi
            </script>";
    }
} else {
    // Mengatasi akses yang tidak valid
    echo "
        <script type='text/javascript'>
            alert('Akses tidak valid.');
            window.location.replace('./daftar.php'); // Redirect kembali ke formulir registrasi
        </script>";
}
