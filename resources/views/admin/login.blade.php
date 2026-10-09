<!DOCTYPE html>
<html dir="ltr" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login Administrator dan Operator SMA Negeri 24 Bandung">
    <meta name="author" content="SMA Negeri 24 Bandung">
    @if(isset($profilSekolah) && $profilSekolah->logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $profilSekolah->logo) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_sekolah.png') }}">
    @endif

    <title>{{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }} | @yield('title', 'Login')</title>

    {{-- Custom CSS Template --}}
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        /* Background Asli Bawaan */
        .auth-wrapper {
            min-height: 100vh;
            background: url('{{ asset('assets/images/big/auth-bg.jpg') }}') no-repeat center center;
            background-size: cover !important;
            padding: 1.5rem;
        }

        /* Card Utama Lengkung dan Pas */
        .auth-box {
            border-radius: 20px !important;
            overflow: hidden !important; /* Kunci agar isi di dalam mengikuti lengkuran card */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: none;
            max-width: 750px;
            width: 100%;
        }

        /* Container Foto Kiri */
        .side-banner-container {
            background-color: #ffffff;
            padding: 0;
            margin: 0;
            overflow: hidden;
            display: flex;
        }

        .side-banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .brand-logo {
            max-height: 75px;
            width: auto;
            object-fit: contain;
        }

        /* Form Input Rapih */
        .form-control {
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            border: 1px solid #cbd5e1;
            font-size: 0.9rem;
        }

        .form-control:focus {
            border-color: #334155;
            box-shadow: 0 0 0 0.2rem rgba(51, 65, 85, 0.15);
        }

        .btn-custom-primary {
            background-color: #334155;
            border-color: #334155;
            color: #ffffff;
            padding: 0.7rem 1.2rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .btn-custom-primary:hover {
            background-color: #1e293b;
            border-color: #1e293b;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative">
            <div class="auth-box row bg-white m-3 g-0">

                <!-- Sisi Kiri: Banner Gambar Pas dengan Card -->
                <div class="col-md-6 d-none d-md-flex side-banner-container">
                    <img src="{{ asset('assets/images/big/bg-login.jpg') }}"
                        alt="SMA Negeri 24 Bandung"
                        class="side-banner-img">
                </div>

                <!-- Sisi Kanan: Form Login -->
                <div class="col-md-6 bg-white d-flex align-items-center">
                    <div class="p-4 p-lg-5 w-100">

                        <div class="text-center mb-4">
                            @if(isset($profilSekolah) && $profilSekolah->logo)
                                <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="SMA Negeri 24 Bandung" class="brand-logo mb-2">
                            @else
                                <img src="{{ asset('assets/images/big/icon.png') }}" alt="SMA Negeri 24 Bandung" class="brand-logo mb-2">
                            @endif

                            <h4 class="text-dark fw-bold mb-1">SMA Negeri 24 Bandung</h4>
                            <p class="text-muted small mb-0">Masuk Administrator & Operator</p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show small rounded-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show small rounded-3" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Form Login --}}
                        <form class="mt-3" action="{{ route('proses.login') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="text-dark fw-semibold small" for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email resmi akun"
                                    required
                                    autofocus>

                                @error('email')
                                    <div class="invalid-feedback small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-dark fw-semibold small" for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Masukkan kata sandi"
                                    required>

                                @error('password')
                                    <div class="invalid-feedback small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-block btn-custom-primary w-100 shadow-sm">
                                Masuk
                            </button>

                            <div class="text-center mt-4">
                                <a href="{{ route('public.index') }}" class="text-secondary small text-decoration-none">
                                    &larr; Kembali ke Beranda Utama
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script>
        $(".preloader").fadeOut();
    </script>
</body>

</html>
