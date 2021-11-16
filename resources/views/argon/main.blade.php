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
    <link rel="icon" href="{{ asset('header-logo.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('thirdparty/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('thirdparty/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('css_extend')
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header mt-2 align-items-center mb-2">
                <a class="navbar-brand p-0" href="https://www.lpnumalang.or.id">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('header-logo.png') }}" class="navbar-brand-img" alt="..." style="max-height: 70px;">
                        <div class="ml-2 text-left d-flex flex-column justify-content-center">
                            <h4 class="text-uppercase mb-0" style="font-size: 11pt; line-height: 15px; font-weight: bolder;">
                                Pengurus <br>Cabang <br>Nahdlatul Ulama'                            </h4> 
                            <div style="font-size: 10pt">Kab. Malang</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="https://www.lpnumalang.or.id/admin">
                                <i class="fas fa-users text-primary"></i>
                                <span class="nav-link-text">Data Anggota</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.lpnumalang.or.id/admin">
                                <i class="fas fa-clipboard text-primary"></i>
                                <span class="nav-link-text">Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.lpnumalang.or.id/admin">
                                <i class="fas fa-chart-bar text-primary"></i>
                                <span class="nav-link-text">Statistik</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Konfigurasi</span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                                <i class="fas fa-cog"></i>
                                <span class="nav-link-text">Konfigurasi Umum</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('argon/navbar')
        @yield('content')
        <!-- Page content -->
        <div class="container-fluid">
            <footer class="footer py-4">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2021 <a href="{{ url('/') }}" class="font-weight-bold ml-1" target="_blank">PCNU Kab. Malang</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('thirdparty/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('thirdparty/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('thirdparty/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('thirdparty/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('thirdparty/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('js/argon.js?v=1.2.0') }}"></script>

    @yield('js_scripts')
</body>

</html>
