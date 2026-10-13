<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}</title>
    @if(isset($profilSekolah) && $profilSekolah->logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $profilSekolah->logo) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_sekolah.png') }}">
    @endif

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

   
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('public.index') }}">
                @if(isset($profilSekolah) && $profilSekolah->logo)
                    <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo {{ $profilSekolah->nama_sekolah }}" width="40" height="40" class="rounded-circle object-fit-cover">
                @else
                    <img src="{{ asset('storage/profil/logo_sekolah.png') }}" alt="Logo Sekolah" width="40" height="40" class="rounded-circle object-fit-cover" onerror="this.onerror=null; this.src='{{ asset('assets/images/logo_sekolah.png') }}';">
                @endif
                <div>
                    <div class="fw-bold text-dark lh-1" style="font-size: 1.1rem; letter-spacing: -0.3px;">
                        {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                    </div>
                    <small class="text-muted d-block" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.3px;">
                        {{ $profilSekolah->motto ?? 'WE CREATE OUR FUTURE' }}
                    </small>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-lg-2 mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.index') ? 'active' : '' }}" href="{{ route('public.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.profil') ? 'active' : '' }}" href="{{ route('public.profil') }}">Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.ekstrakurikuler*') ? 'active' : '' }}" href="{{ route('public.ekstrakurikuler') }}">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.berita*') ? 'active' : '' }}" href="{{ route('public.berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.guru*') ? 'active' : '' }}" href="{{ route('public.guru') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.siswa') ? 'active' : '' }}" href="{{ route('public.siswa') }}">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.galeri*') ? 'active' : '' }}" href="{{ route('public.galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.prestasi*') ? 'active' : '' }}" href="{{ route('public.prestasi') }}">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-profil">My Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer id="kontak" class="footer-simple">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('storage/profil/logo_sekolah.png') }}" alt="Logo {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}" width="50" height="50" class="rounded-circle object-fit-cover" onerror="this.onerror=null; this.src='{{ asset('assets/images/logo_sekolah.png') }}';">
                        <div>
                            <h5 class="mb-0 text-white">{{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}</h5>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="small mb-0 text-slate-400" style="line-height: 1.7;">
                            {{ $profilSekolah->deskripsi ?? 'SMA Negeri 24 Bandung merupakan salah satu sekolah menengah atas negeri unggulan di Kota Bandung.' }}
                        </p>
                    </div>

                    <div class="mt-4">
                        <span class="d-block small fw-bold mb-2 text-white" style="letter-spacing: 0.5px;">Ikuti Kami</span>
                        <div class="d-flex align-items-center gap-3">
                            <a href="https://instagram.com/sman24.bdg" target="_blank" class="text-white fs-5 text-decoration-none hover-warning" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://facebook.com/profile.php?id=100087550277138" target="_blank" class="text-white fs-5 text-decoration-none hover-warning" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://tiktok.com/@sman24bdg" target="_blank" class="text-white fs-5 text-decoration-none hover-warning" title="TikTok"><i class="fab fa-tiktok"></i></a>
                            <a href="https://youtube.com/@sman24bdg" target="_blank" class="text-white fs-5 text-decoration-none hover-warning" title="YouTube"><i class="fab fa-youtube"></i></a>
                            <a href="mailto:sman24bandung@gmail.com" class="text-white fs-5 text-decoration-none hover-warning" title="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 ps-lg-5">
                    <h6 class="text-white fw-bold mb-3" style="letter-spacing: 0.3px;">Menu Utama</h6>
                    <div class="d-flex flex-column gap-1">
                        <a href="{{ route('public.index') }}">Beranda</a>
                        <a href="{{ route('public.profil') }}">Profil Sekolah</a>
                        <a href="{{ route('public.ekstrakurikuler') }}">Ekstrakurikuler</a>
                        <a href="{{ route('public.berita') }}">Berita</a>
                        <a href="{{ route('public.galeri') }}">Galeri</a>
                        <a href="#kontak">Kontak</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3" style="letter-spacing: 0.3px;">Kontak Kami</h6>

                    <div class="footer-simple-contact-item">
                        <i class="fas fa-map-marker-alt text-warning"></i>
                        <span class="small text-slate-400">Jl. A.H. Nasution No. 27, Ujung Berung,<br>Kota Bandung, Jawa Barat 40611</span>
                    </div>
                    <div class="footer-simple-contact-item">
                        <i class="fas fa-phone-alt text-warning"></i>
                        <span class="small text-slate-400">(022) 7800195</span>
                    </div>
                    <div class="footer-simple-contact-item">
                        <i class="fas fa-envelope text-warning"></i>
                        <span class="small text-slate-400">sman24bandung@gmail.com</span>
                    </div>
                    <div class="footer-simple-contact-item">
                        <i class="fas fa-clock text-warning"></i>
                        <span class="small text-slate-400">Senin - Jumat: 07:00 - 16:00<br>Sabtu - Minggu: Libur</span>
                    </div>

                    <hr class="my-3" style="border-color: rgba(255,255,255,0.08);">

                    <div class="footer-simple-meta-school">
                        <div>NPSN: 20219660</div>
                        <div>Akreditasi: A</div>
                        <div>ISO 9001:2015 Certified</div>
                    </div>
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,0.08);">
            <div class="text-center small text-slate-500 pt-2">
                &copy; 2026 <strong>{{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}</strong>. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>