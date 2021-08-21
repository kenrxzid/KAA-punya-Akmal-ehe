<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>KAA 2021</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-white navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="../assets/img/brand/kaa fix biru dongker1.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="/">
                                <img src="../assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <span class="nav-link-inner--text">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">
                            <span class="nav-link-inner--text">Register</span>
                        </a>
                    </li>
                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
                            <i class="fab fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Selamat Datang di KAA 2021</h1>
                            <p class="text-lead text-white">Registrasi Dulu Ya.</p>
                            <!-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-muted text-center mt-2 mb-3"><small>Register</small></div>
                            <form method="post" action="/postregister">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" type="text" class="username" id="username" placeholder="Masukan Username" name="username" required minlength="8" maxlength="15" value="{{ old('username') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" type="text" class="nama_pendaftar" id="nama_pendaftar" placeholder="Masukan Nama Lengkap" name="nama_pendaftar" required minlength="3" maxlength="30" value="{{ old('nama_pendaftar') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" type="text" class="asal_univ_pendaftar" id="asal_univ_pendaftar" placeholder="Masukan Asal Universitas" name="asal_univ_pendaftar" required minlength="8" maxlength="40" value="{{ old('asal_univ_pendaftar') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" type="email" class="email_pendaftar" id="email_pendaftar" placeholder="Masukan Email" name="email_pendaftar" required minlength="8" maxlength="50" value="{{ old('email_pendaftar') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" type="password" class="password_user" id="password_user" placeholder="Masukan Password" name="password_user" required minlength="8">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">KAA 2021</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">KAA 2021</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
    <!-- JQuery Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#username').on('keydown', function(e) {
                if (e.key === ' ' || e.key === 'Spacebar' || e.keyCode == 32) {
                    $('#username').val($('#username').val().replace(/[^\d]/g, ''));
                    return false;
                }
            });
            $("#username").on("input", function() {
                $("#username").val($("#username").val().toLowerCase());
                if ($("#username").val().length >= 5) {
                    $.ajax({
                        type: 'GET',
                        url: "{{url('/cekusername/')}}" + "/" + $("#username").val(),
                        success: function(results) {
                            if (results.success === true) {
                                $("#text-username").html("Username telah terpakai");
                                $("#btn-daftar").prop('disabled', true);
                            } else {
                                $("#text-username").html("Username dapat dipakai");
                                $("#btn-daftar").prop('disabled', false);
                            }
                        }
                    });
                } else {
                    $("#text-username").html("Minimal 5 karakter tanpa spasi");
                    $("#btn-daftar").prop('disabled', true);
                }
            });
            $("#password_user").on("input", function() {
                if ($("#password_user").val().length > 5) {
                    if ($("#password_user").val().length < 8) {
                        $("#text-password").html("Minimal 8 karakter");
                    } else {
                        $("#text-password").html("");
                    }
                }
            });
            $("#email_pendaftar").on("input", function() {
                if ($("#email_pendaftar").val().length > 5) {
                    if ($("#email_pendaftar").val().length < 8) {
                        $("#text-email").html("Minimal 8 karakter");
                    } else {
                        $("#text-email").html("");
                    }
                }
            });
            $("#email_pendaftar").on("input", function() {
                if ($("#email_pendaftar").val().length > 5) {
                    if ($("#email_pendaftar").val().length < 8) {
                        $("#text-email").html("Minimal 8 karakter");
                    } else {
                        $("#text-email").html("");
                    }
                }
            });
            $("#asal_univ_pendaftar").on("input", function() {
                if ($("#asal_univ_pendaftar").val().length > 5) {
                    if ($("#asal_univ_pendaftar").val().length < 8) {
                        $("#text-univ").html("Minimal 8 karakter");
                    } else {
                        $("#text-univ").html("");
                    }
                }
            });
            $("#nama_pendaftar").on("input", function() {
                if ($("#nama_pendaftar").val().length < 3) {

                    $("#text-nama").html("Minimal 3 karakter");

                } else {

                    $("#text-nama").html("");
                }
            });
        });
    </script>
</body>

</html>