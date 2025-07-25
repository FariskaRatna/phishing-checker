<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Cross-browser support -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta -->
    <title>Phishing URL Checker | BUMATARA - Cegah Serangan Phishing dengan AI</title>
    <meta name="description"
        content="BUMATARA Phishing URL Checker membantu Anda mendeteksi dan menghindari serangan phishing dengan teknologi AI canggih. Cek URL sekarang untuk keamanan online Anda.">
    <meta name="keywords"
        content="Phishing URL Checker, Deteksi Phishing, Keamanan Siber Indonesia, AI Cybersecurity, BUMATARA">
    <meta name="author" content="BUMATARA Team">
    <meta name="robots" content="index, follow"> <!-- Allow indexing -->

    <!-- Canonical URL -->
    <link rel="canonical" href="https://bumatara.com/">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://bumatara.com/phishing-url-checker">
    <meta property="og:title" content="Phishing URL Checker | BUMATARA">
    <meta property="og:description"
        content="Cegah serangan phishing dengan BUMATARA Phishing URL Checker berbasis AI. Amankan data pribadi Anda sekarang.">
    <meta property="og:image" content="https://bumatara.com/images/og-bumatara.png">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://bumatara.com/phishing-url-checker">
    <meta name="twitter:title" content="Phishing URL Checker | BUMATARA">
    <meta name="twitter:description"
        content="Cegah serangan phishing dengan BUMATARA Phishing URL Checker berbasis AI. Amankan data pribadi Anda sekarang.">
    <meta name="twitter:image" content="https://bumatara.com/images/twitter-bumatara.png">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/icon-bumatara.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/icon-bumatara.png') }}">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .hero {
            background-color: #0e1625;
            color: white;
            padding: 100px 20px 160px;
            text-align: center;
            position: relative;
        }

        .hero2 {
            background-color: #0e1625;
            color: white;
            padding: 100px 20px 20px;
            text-align: center;
            position: relative;
        }

        .url-checker-box {
            background: white;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);

            position: absolute;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 600px;
        }

        .quote-box {
            background-color: #f8f9fa;
            border-left: 5px solid #e0e0e0;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        footer {
            background-color: #0e1625;
            color: white;
            padding: 40px 0;
        }

        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .radius1 {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        #urlList li:hover {
            cursor: pointer;
            background-color: #b7ff64;
        }

        .dropdown-menu.show {
            display: block !important;
        }

        .position-static {
            position: static !important;
        }

        @media (max-width: 768px) {
            .dropdown-menu {
                max-width: 100% !important;
            }
        }
    </style>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('head')

    @stack('styles')
</head>

<body>

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm position-fixed top-0 start-0 w-100 z-3">
        <div class="container">
            <!-- <a class="navbar-brand fw-bold" href="/">BUMATARA</a> -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo-bumatara.png') }}" alt="BUMATARA Logo" style="height: 50px;">
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Dropdown Solutions -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle" href="#" id="solutionsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Solutions
                        </a>

                        <div class="dropdown-menu w-100 p-4 border-0 shadow-lg mt-2 mx-auto "
                            aria-labelledby="solutionsDropdown" style="max-width: 900px; ">

                            <div class="row">
                                <div class="col-md-4 border-end">
                                    <h5 class="fw-bold">BUMATARA's Solutions</h5>
                                    <p class="text-muted">Industry tailored email authentication, deliverability, and
                                        brand identity solutions.</p>
                                    <a href="about" class="fw-semibold text-decoration-none">About us</a>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <!-- Item -->
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2 text-primary fs-5">
                                                    <i class="bi bi-search"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fw-bold">Monitor</h6>
                                                    <p class="text-muted mb-0">Identify email compromise attempts and
                                                        troubleshoot delivery issues.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2 text-warning fs-5">
                                                    <i class="bi bi-shield-lock"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fw-bold">Protect</h6>
                                                    <p class="text-muted mb-0">Automate DMARC enforcement for
                                                        unparalleled security.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2 text-danger fs-5">
                                                    <i class="bi bi-check-circle"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fw-bold">Validate</h6>
                                                    <p class="text-muted mb-0">Eliminate email bounce and false contact
                                                        submissions.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2 text-info fs-5">
                                                    <i class="bi bi-clipboard-check"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fw-bold">Comply</h6>
                                                    <p class="text-muted mb-0">Comply with Microsoft, Google and Yahoo
                                                        sending standards.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2 text-success fs-5">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fw-bold">Certify</h6>
                                                    <p class="text-muted mb-0">Certify your brand with the highest
                                                        identity standard globally.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tambah item lain di sini jika dibutuhkan -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- End Dropdown -->
                    <li class="nav-item"><a class="nav-link" href="/product">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About US</a></li>
                    <li class="nav-item"><a class="nav-link" href="/documentation">Documentation</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    @auth
                    <span class="me-3">👋 Hi, {{ Auth::user()->name }}</span>
                    <!-- Tombol Logout -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#confirmLogoutModal">
                        Logout
                    </button>

                    @else
                    <a href="#" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#signinModal">Sign In</a>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
                    @endauth
                </div>


            </div>
        </div>
    </nav>


    @yield('main-panel')

    <div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signinModalLabel">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="emailSignin" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="passwordSignin" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required autocomplete="username">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="new-password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>

                        <!-- Already registered -->
                        <!-- <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Already registered? Login</a>
                        </div> -->
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal Konfirmasi Logout -->
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmLogoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin logout?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->has('status'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            handleResponse({
                status: "error",
                message: "{{ $errors->first('status') }}"
            });
        });
    </script>
    @endif

    @if (session('welcome'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            handleResponse({
                status: "success",
                message: "{{ session('welcome') }}"
            });
        });
    </script>
    @endif
    @if (session('logoutSuccess'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            handleResponse({
                status: "success",
                message: "{{ session('logoutSuccess') }}"
            });
        });
    </script>
    @endif
    @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            handleResponse({
                status: "success",
                message: "{{ session('success') }}"
            });
        });
    </script>
    @endif


</body>
<!-- Footer -->
<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row align-items-center text-center text-md-start">
            <!-- Logo dan Social -->
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="{{ asset('images/bumatara-bw.png') }}" alt="BUMATARA" height="40" class="mb-2">
                <div>
                    <a href="#" class="text-light me-3 text-decoration-none">LinkedIn</a>
                    <a href="#" class="text-light text-decoration-none">Contact Us</a>
                </div>
            </div>

            <!-- Copyright -->
            <div class="col-md-6 text-center text-md-end">
                <small class="d-block">Semarang, Indonesia — Copyright © 2025 BUMATARA, Inc.</small>
                <small class="d-block">Created by: Rizki Abdillah, Fariska Ratna Fauziah, Malinda Ratnaduhita</small>
            </div>
        </div>
    </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

</script>

@stack('scripts')


</html>