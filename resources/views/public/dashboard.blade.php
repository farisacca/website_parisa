<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @if(isset($profilSekolah) && $profilSekolah->logo)
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $profilSekolah->logo) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    @endif
    <title>{{ $profilSekolah->nama_sekolah ?? 'Website Sekolah' }} | @yield('title')</title>

    <meta name="description" content="Website resmi SMA Negeri 24 Bandung">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
    
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #1f2937;
        }

        main {
            min-height: 70vh;
        }

        .public-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #eeeeee;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        }

        .navbar-brand {
            color: #1f2937 !important;
            font-weight: 600;
        }

        .navbar-brand img {
            width: 42px;
            height: 42px;
            object-fit: contain;
            margin-right: 10px;
        }

        .school-name {
            font-size: 16px;
            font-weight: 600;
            line-height: 1.2;
        }

        .navbar-nav .nav-link {
            color: #4b5563 !important;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 13px !important;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #1d4ed8 !important;
        }

    
        .btn-login {
            background-color: #1b2536; 
            color: #ffffff !important;
            border-radius: 6px;
            padding: 9px 18px !important;
            font-weight: 500 !important;
            transition: background-color 0.2s ease;
        }

        .btn-login:hover {
            background-color: #0f172a;
            color: #ffffff !important;
        }

      
        .section-title {
            color: #1f2937;
            font-weight: 600;
        }

        .section-subtitle {
            color: #64748b;
        }

        .text-primary-custom {
            color: #1d4ed8 !important;
        }

        .bg-primary-custom {
            background-color: #1d4ed8 !important;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

      
        .public-footer {
            background-color: #1b2536; 
            color: #ffffff;
            margin-top: 60px;
        }

        .public-footer h5 {
            color: #ffffff;
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .public-footer p {
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 8px;
        }

        .public-footer a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .public-footer a:hover {
            color: #ffffff;
        }

        .footer-logo {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        /* Box Visi Kami gaya Labschool */
        .visi-misi-box {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 16px;
            margin-top: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .visi-misi-box h6 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #ffffff;
        }

        .visi-misi-box p {
            font-size: 13px;
            margin-bottom: 0;
            color: #cbd5e1;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            padding: 18px 0;
            margin-top: 25px;
        }

        /* =========================
           MOBILE
        ========================= */
        @media (max-width: 991px) {
            .navbar-nav {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .navbar-nav .nav-link {
                margin-left: 0;
            }

            .btn-login {
                display: inline-block;
                margin-top: 5px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg public-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                @if(isset($profilSekolah) && $profilSekolah->logo)
                    <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo {{ $profilSekolah->nama_sekolah }}">
                @else
                    <img src="{{ asset('assets/images/logo-icon.png') }}" alt="Logo Sekolah">
                @endif
                <span class="school-name">
                    {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar"
                aria-controls="publicNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="publicNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/guru') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/siswa') }}">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ekskul') }}">Ekskul</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="nav-link btn-login" href="{{ route('admin.login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="public-footer">
        <div class="container py-5">
            <div class="row">

            
                <div class="col-lg-5 col-md-6 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        @if(isset($profilSekolah) && $profilSekolah->logo)
                            <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo" class="footer-logo me-3">
                        @else
                            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="Logo Sekolah" class="footer-logo me-3">
                        @endif
                        <h5 class="mb-0">
                            {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                        </h5>
                    </div>

                    <p>
                        {{ $profilSekolah->deskripsi ?? 'Website resmi sekolah sebagai media informasi dan komunikasi sekolah.' }}
                    </p>

                    <div class="visi-misi-box">
                        <h6>Visi Kami</h6>
                        <p>
                            {{ $profilSekolah->visi ?? 'Menjadi sekolah unggulan yang menghasilkan lulusan berkarakter, berprestasi, dan siap menghadapi tantangan global.' }}
                        </p>
                    </div>
                </div>

                {{-- KOLOM 2: MENU UTAMA --}}
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Menu Utama</h5>

                    <p><a href="{{ url('/') }}">Beranda</a></p>
                    <p><a href="{{ url('/profil') }}">Profil Sekolah</a></p>
                    <p><a href="{{ url('/berita') }}">Berita</a></p>
                    <p><a href="{{ url('/guru') }}">Guru</a></p>
                    <p><a href="{{ url('/siswa') }}">Siswa</a></p>
                    <p><a href="{{ url('/ekskul') }}">Ekstrakurikuler</a></p>
                </div>

                {{-- KOLOM 3: KONTAKS KAMI --}}
                <div class="col-lg-4 col-md-12 mb-4">
                    <h5>Kontak Kami</h5>

                    <p>
                        <i class="bi bi-geo-alt me-2"></i>
                        {{ $profilSekolah->alamat ?? '-' }}
                    </p>

                    <p>
                        <i class="bi bi-telephone me-2"></i>
                        {{ $profilSekolah->kontak ?? '-' }}
                    </p>

                    <p>
                        <i class="bi bi-building me-2"></i>
                        NPSN: {{ $profilSekolah->npsn ?? '-' }}
                    </p>
                </div>

            </div>

            {{-- COPYRIGHT --}}
            <div class="footer-bottom text-center">
                <p class="mb-0">
                    &copy; {{ date('Y') }} {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>