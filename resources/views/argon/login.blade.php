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
    <title>Login - Admin PW IPNU </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('header-logo.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('thirdparty/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('thirdparty/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('thirdparty/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('css/argon.css?v=1.2.0') }}" type="text/css">
</head>

<body class="bg-default">
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-success py-4 py-lg-5 pt-lg-6">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <img src="{{ asset('header-logo.png') }}" style="height: 150px">
                            <h1 class="bg-dark text-white mt-4 pt-2 mb-0">Selamat Datang Admin!</h1>
                            <p class="bg-dark text-lead text-white pb-2">Silahkan masuk untuk mengelola sistem.</p>
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
                            <form action="{{ route('auth.login') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="form-control text-dark" value="{{ old('username') }}" @error('username') is-invalid @enderror placeholder="Username" name="username" type="text">
                                    </div>
                                    @error('username')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input class="form-control text-dark" @error('password') is-invalid @enderror placeholder="Password" name="password" type="password">
                                    </div>
                                    @error('password')
                                        <div class="text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                @error('login')
                                    <div class="form-group mb-0">
                                        <div class="text-center text-uppercase font-weight-bolder text-red pt-1" style="font-size: 8px">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="pb-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2021 <a href="javascript:void(0)" class="font-weight-bold ml-1">PCNU Malang</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.nu.or.id/" class="nav-link">NU Online</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('thirdparty/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('thirdparty/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('thirdparty/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('js/argon.js?v=1.2.0') }}"></script>
</body>

</html>