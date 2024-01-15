<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Pendaftaran User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/mystyle.css">
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
        min-height: 108vh;
        display: flex;
        align-items: center;
        background-image: url('./assets/img/bg2.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        /* background-attachment: fixed; */
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
                    <form method="post" action="register_proses.php" class="login100-form validate-form">
                        <span class="login100-form-title b-15">
                            <!-- Your logos or titles -->
                          
							<!-- <i class="zmdi zmdi-font"></i> -->

							<img src="assets/img/LOGOPOLNEP.png" alt="Polnep Logo" class="mb-4" width="40">
							<img src="assets/img/idekitelogo-removebg-preview.png" alt="Idekite Logo" class="mb-4" width="90"><br><br>

                            <h5>REGISTRASI AKUN</h5><br>
                        </span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="nama" required>
                            <span class="focus-input100" data-placeholder="Nama"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="username" required>
                            <span class="focus-input100" data-placeholder="Email"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password" required>
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <select class="input100" name="jabatan" required>
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Manager">Manager</option>
                                <option value="Karyawan">Karyawan</option>
                                <option value="CEO">CEO</option>
                                <!-- Tambahkan pilihan jabatan lainnya jika diperlukan -->
                            </select>
                        </div>


                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" class="login100-form-btn" style="background-color: #e96020;">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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