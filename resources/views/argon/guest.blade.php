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
    <link rel="icon" href="{{ asset('images/ipnu-icon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

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

    <!-- Main content -->
    <div class="main-content d-print-none" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom py-2">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav main-nav align-items-center  mr-md-auto ">
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

                        @yield('navbar-item')
                        
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img alt="Image placeholder" src="{{ asset(Auth::user()->avatar) }}">
                                        </span>
                                        <div class="media-body  ml-2  d-none d-lg-block">
                                            <span class="mb-0 text-sm font-weight-bold">{{ ucwords(strtolower(auth()->user()->nama_lengkap)) }}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right ">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome!</h6>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('auth.logout') }}" method="POST">
                                        @csrf
                                        <button type='submit' class="dropdown-item">
                                            <i class="ni ni-user-run"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-sm text-uppercase font-weight-bold  pr-0" href="{{ route('auth.login') }}">
                                    <i class="fas fa-sign-in-alt mr-1"></i>
                                    Login
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <!-- Page content -->
        <div class="container-fluid">
            <footer class="footer py-4">
                
            </footer>
        </div>
    </div>

    <div class="print d-print-block pt-4">
        @yield('print')
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
