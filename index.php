<!DOCTYPE html>
<html lang="en">
<?php
require 'controller/koneksi/koneksi_db.php';
$query_setting_app = "SELECT * FROM `setting_app`";
$result_setting_app = mysqli_query($conn, $query_setting_app);
$row_setting_app = mysqli_fetch_assoc($result_setting_app);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/<?php echo $row_setting_app['logo']; ?>" type="image/x-icon">
    <title><?php echo $row_setting_app['nama']; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
        @media (max-width: 767px) {
            .col-md-6 img {
                width: 65%;
            }
        }
    </style>
</head>

<body class="hold-transition login-page" style="background-color: white;">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto d-flex align-items-center justify-content-center">
                    <img src="assets/<?php echo $row_setting_app['logo']; ?>" class="" width="100%" style="background-repeat: no-repeat;background-size: cover;">
                </div>
                <div class="col-md-6 mx-auto d-flex align-items-center justify-content-center">
                    <div class="login-box">
                        <!-- /.login-logo -->
                        <div class="card card-outline card-danger">
                            <div class="card-header text-center">
                                <!-- <a href="index2.html" class="h3"><b>Manajemen</b>Laundry</a> -->
                                <p class="text-navy text-center text-lightblue h4"><b>Sistem Informasi Manajemen Laundry</b></p>
                            </div>
                            <div class="card-body">
                                <p class="h5 text-info text-center"><?php echo $row_setting_app['nama']; ?></p>
                                <p class="login-box-msg">Akses Login</p>
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="text-danger text-center">Username/ Password salah.</p>
                                <?php } ?>
                                <form action="web/route.php?page=login" method="post" class="needs-validation" novalidate autocomplete="off">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text" onclick="togglePasswordVisibility()">
                                                <span class="fas fa-eye-slash" id="togglePassword"></span>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Tidak boleh kosong.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>

</html>