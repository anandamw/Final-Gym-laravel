<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/farol/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2024 07:17:28 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('') }}assets/css/remixicon.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/sidebar-menu.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/simplebar.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/apexcharts.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/prism.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/rangeslider.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/sweetalert.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/quill.snow.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">

    <link rel="icon" type="image/png" href="{{ asset('') }}assets/images/favicon.png">

    <title>Register</title>
</head>

<body>


    <div class="container-fluid">
        <div class="main-content d-flex flex-column px-0">

            <div class="m-auto mw-510 py-5">
                <form action="/register" method="POST">
                    @csrf
                    
                    <div class="d-flex align-items-center gap-4 mb-3">
                        <h4 class="fs-3 mb-0">Get’s started.</h4>
                        <a href="index.html">
                            <img src="{{ asset('') }}assets/images/logo.svg" alt="logo">
                        </a>
                    </div>
                    <p class="fs-18 mb-5">Have an account? <a href="/login"
                            class="text-decoration-none text-primary">Login</a></p>
                    <div class="d-sm-flex gap-3 mb-4">
                        <a href="https://www.google.com/" target="_blank"
                            class="btn btn-outline-primary fs-16 fw-semibold text-dark heading-fornt py-2 py-md-3 px-4 hover-white w-sm-100">
                            <img src="{{ asset('') }}assets/images/google.svg" alt="google">
                            <span class="ms-2">Sign In With Google</span>
                        </a>
                        <a href="https://www.facebook.com/" target="_blank"
                            class="btn btn-primary fs-16 fw-semibold text-dark heading-fornt py-2 py-md-3 px-4 text-white w-sm-100 mt-3 mt-sm-0">
                            <img src="{{ asset('') }}assets/images/facebook.svg" alt="google">
                            <span class="ms-2">Sign In With Facebook</span>
                        </a>
                    </div>
                    <span class="d-block fs-18 fw-semibold text-center or mb-4">
                        <span class="bg-body-bg d-inline-block py-1 px-3">or</span>
                    </span>
                    
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $item )
                                <li class="ms-3">{{ $item }}</li>
                            @endforeach
                        </ul>

                    @endif
                    <div class="card bg-white border-0 rounded-10 mb-4">
                        <div class="card-body p-4">
                            <div class="form-group mb-4">
                                <label class="label">Username</label>
                                <input type="username" name="username" value="{{ old('username') }}" class="form-control h-58" placeholder="Your username">
                            </div>
                            <div class="form-group mb-4">
                                <label class="label">Name</label>
                                <input type="name" name="name" value="{{ old('name') }}" class="form-control h-58" placeholder="Your name">
                            </div>
                            <div class="form-group mb-0">
                                <label class="label">Password</label>
                                <div class="form-group">
                                    <div class="password-wrapper position-relative">
                                        <input type="password" name="password" id="password"
                                            class="form-control h-58 text-dark" value="{{ old('password') }}" placeholder="Your Password">
                                        <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                                            class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                                            aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input position-relative" style="top: 1.1px;" type="checkbox" value
                                id="flexCheckDefault">
                            <label class="form-check-label fs-16 text-gray-light" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                        <a href="forget-password.html"
                            class="fs-16 text-primary text-decoration-none mt-2 mt-sm-0 d-block">
                            Forgot your password?
                        </a>
                    </div>
                    <button type="submit" class="btn btn-primary fs-16 fw-semibold text-dark heading-fornt py-2 py-md-3 px-4 text-white w-100">
                        Login
                    </button>
                </form>
            </div>

        </div>
    </div>


    <script src="{{ asset('') }}assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/js/sidebar-menu.js"></script>
    <script src="{{ asset('') }}assets/js/dragdrop.js"></script>
    <script src="{{ asset('') }}assets/js/rangeslider.min.js"></script>
    <script src="{{ asset('') }}assets/js/sweetalert.js"></script>
    <script src="{{ asset('') }}assets/js/quill.min.js"></script>
    <script src="{{ asset('') }}assets/js/data-table.js"></script>
    <script src="{{ asset('') }}assets/js/prism.js"></script>
    <script src="{{ asset('') }}assets/js/clipboard.min.js"></script>
    <script src="{{ asset('') }}assets/js/feather.min.js"></script>
    <script src="{{ asset('') }}assets/js/simplebar.min.js"></script>
    <script src="{{ asset('') }}assets/js/fslightbox.js"></script>
    <script src="{{ asset('') }}assets/js/custom/custom.js"></script>
</body>

</html>
