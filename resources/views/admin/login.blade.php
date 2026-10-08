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
        .auth-wrapper {
            min-height: 100vh;
            background-size: cover !important;
        }
        .auth-box {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .brand-logo {
            max-height: 85px;
            width: auto;
        }
        .btn-custom-primary {
            background-color: #003366;
            border-color: #003366;
            color: #ffffff;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .btn-custom-primary:hover {
            background-color: #002244;
            border-color: #002244;
            color: #ffffff;
        }
        .side-banner-container {
            background-color: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 0;
        }
        .side-banner-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
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


        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background: url('{{ asset('assets/images/big/auth-bg.jpg') }}') no-repeat center center;">
            <div class="auth-box row col-lg-8 col-md-10 bg-white m-3">

                <div class="col-lg-6 col-md-5 d-none d-md-block side-banner-container">
                    <img src="{{ asset('assets/images/big/bg-login.jpg') }}"
                        alt="SMA Negeri 24 Bandung"
                        class="side-banner-img">
                </div>

                <div class="col-lg-6 col-md-7 bg-white">
                    <div class="p-4 p-md-5">

                        <div class="text-center mb-4">
                            @if(isset($profilSekolah) && $profilSekolah->logo)
                                <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="SMA Negeri 24 Bandung" class="brand-logo mb-2">
                            @else
                                <img src="{{ asset('assets/images/big/icon.png') }}" alt="SMA Negeri 24 Bandung" class="brand-logo mb-2">
                            @endif

                            <h3 class="text-dark mt-2 mb-1">SMA Negeri 24 Bandung</h3>
                            <p class="text-dark small">Masuk Administrator & Operator</p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Form --}}
                        <form class="mt-3" action="{{ route('proses.login') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="text-dark" for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email resmi akun"
                                    required
                                    autofocus>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-dark" for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Masukkan kata sandi"
                                    required>

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-block btn-custom-primary shadow-sm">
                                Masuk
                            </button>

                            <div class="text-center mt-4">
                                <a href="{{ route('public.index') }}" class="text-secondary small">
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
