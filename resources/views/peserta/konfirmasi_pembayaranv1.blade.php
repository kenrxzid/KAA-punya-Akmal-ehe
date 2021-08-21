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
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->pendaftaran->nama_pendaftar}}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ url('/logout') }}" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-12 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/peserta/dashboard_user') }}">Dashboards</a></li>
                                </ol>
                            </nav>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/peserta/alur_pembayaran') }}">Alur Pembayaran</a></li>
                                </ol>
                            </nav>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/peserta/konfirmasi_pembayaran') }}">Konfirmasi Pembayaran</a></li>
                                </ol>
                            </nav>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/peserta/cetak_kartu_peserta') }}">Cetak Kartu</a></li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                    <!-- Card stats -->


                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <h1 class="mb-0 ">Konfirmasi Pembayaran</h1>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-12">
                        <div class="card">

                            <div class="card-body border-0">
                                <div class="row align-items-center">
                                    <div class="col-sm-12 d-flex justify-content-center">

                                        @if(Auth::user()->pendaftaran->pembayarans != null && Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                                        <h3 style="text-align: center; padding: 10px;"> Pembayaranmu telah diterima. Langkah selanjutnya yaitu melengkapi data pada form pendaftaran. </h3>
                                        @elseif(Auth::user()->pendaftaran->pembayarans != null && Auth::user()->pendaftaran->pembayarans->status_pembayaran == 0)
                                        <h3 style="text-align: center; padding: 10px;"> Pembayaranmu sedang dalam proses verifikasi. Mohon tunggu email selanjutnya dan cek website secara berkala. </h3>
                                        @elseif(session()->has('success'))
                                        <div style="text-align:center; border-radius:20px" class="alert alert-success alert-dismissible">
                                            <strong>{{ session('success') }}</strong>
                                        </div>
                                        @elseif(Auth::user()->pendaftaran->pembayarans == null || Auth::user()->pendaftaran->pembayarans->status_pembayaran == 2)

                                        <form method="post" action="{{ url('/peserta/konfirmasi_pembayaran')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-6 d-flex justify-content-start">
                                                    <div class="form-group mb-3" style="width: 500px;">
                                                        <div class="input-group input-group-merge input-group-alternative">
                                                            <!-- <div class="input-group-prepend">
                                                            </div> -->
                                                            <input class="form-control" type="text" class="atas_nama_rekening" id="atas_nama_rekening" placeholder="Masukan Atas Nama Rekening" name="atas_nama_rekening" value="{{ old('atas_nama_rekening') }}" required maxlength="50">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <div class="input-group input-group-merge input-group-alternative">
                                                            <!-- <div class="input-group-prepend">
                                                            </div> -->
                                                            <input class="form-control" type="text" class="bank_asal" id="bank_asal" placeholder="Masukan Bank Asal" name="bank_asal" value="{{ old('bank_asal') }}" required maxlength="25">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <div class="input-group input-group-merge input-group-alternative">
                                                            <!-- <div class="input-group-prepend">
                                                            </div> -->
                                                            <input class="form-control" type="number" class="nomor_rekening" id="nomor_rekening" placeholder="Masukan Nomor Rekening" name="nomor_rekening" value="{{ old('nomor_rekening') }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <div class="input-group input-group-merge input-group-alternative">
                                                            <!-- <div class="input-group-prepend">
                                                            </div> -->
                                                            <input class="form-control" type="number" class="total_pembayaran" id="total_pembayaran" placeholder="Masukan Total Pembayaran" name="total_pembayaran" value="{{ old('total_pembayaran') }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <label>Bukti Pembayaran</label><br>
                                            <input type="file" class="bukti_pembayaran" name="bukti_pembayaran" id="bukti_pembayaran" required accept=".jpg,.jpeg,.png"><br><br>

                                            <button type="submit" class="btn btn-primary my-4">Submit</button>
                                        </form>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="footer pt-0">
                    <div class="row alig n-items-center justify-content-lg-between">
                        <div class="col-lg-6">
                            <div class="copyright text-center  text-lg-left  text-muted">
                                &copy; 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">KAA</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">KAA 2021</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Instagram</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- Argon JS -->
        <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>