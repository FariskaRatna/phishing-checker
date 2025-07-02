<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Phishing URL Checker - BUMATARA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @yield('head')
</head>

<body>

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm position-fixed top-0 start-0 w-100 z-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">BUMATARA</a>

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
                                    <a href="#" class="fw-semibold text-decoration-none">About us</a>
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
                    <li class="nav-item"><a class="nav-link" href="/documentation">Documentasi</a></li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#signinModal">Sign In</a>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
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
                            <input type="email" class="form-control" id="emailSignin" name="email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="passwordSignin" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordSignin" name="password" required>
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

</body>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-md-2 mb-3">
                <img src="https://BUMATARA.com/logo.svg" alt="BUMATARA" height="30"><br>
                <a href="#" class="d-block mt-2 footer-links">LinkedIn</a>
                <a href="#" class="d-block footer-links">Contact Us</a>
            </div>
            <div class="col-md-2 mb-3 footer-links">
                <h6>Company</h6>
                <a href="#">About Us</a><br>
                <a href="#">Security</a><br>
                <a href="#">Newsroom</a><br>
                <a href="#">System Status</a><br>
                <a href="#">Terms & Conditions</a><br>
                <a href="#">Privacy Policy</a><br>
                <a href="#">GDPR</a>
            </div>
            <div class="col-md-2 mb-3 footer-links">
                <h6>BUMATARA</h6>
                <a href="#">Pricing</a><br>
                <a href="#">Partners</a><br>
                <a href="#">Contact</a>
            </div>
            <div class="col-md-2 mb-3 footer-links">
                <h6>Industries</h6>
                <a href="#">Government</a><br>
                <a href="#">Legal</a><br>
                <a href="#">Finance</a><br>
                <a href="#">Education</a><br>
                <a href="#">Startups</a><br>
                <a href="#">NGO</a><br>
                <a href="#">Healthcare</a>
            </div>
            <div class="col-md-4 mb-3 footer-links">
                <h6>Knowledgebase</h6>
                <a href="#">Blog</a><br>
                <a href="#">DMARC setup</a><br>
                <a href="#">DMARC Reports</a><br>
                <a href="#">DKIM setup</a><br>
                <a href="#">SPF setup</a>
            </div>
        </div>
        <div class="text-center mt-4">
            <small>Semarang, Indonesia — Copyright © 2025 BUMATARA, Inc.</small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')


</html>