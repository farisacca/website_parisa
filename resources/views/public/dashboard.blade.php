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
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }

        .navbar-custom {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 14px 0;
        }
        .navbar-custom .nav-link {
            font-weight: 600;
            font-size: 0.9rem;
            color: #475569;
            padding: 8px 12px !important;
            transition: color 0.2s ease;
        }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #ffb900 !important;
        }

        .hero-banner {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #ffffff;
            border-radius: 16px;
            padding: 48px 36px;
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08) !important;
        }
        .hover-blue:hover {
            color: #2563eb !important;
        }
        .card-teacher {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            background-color: #ffffff;
        }
        .card-teacher:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
        }
        .footer-simple {
            background-color: #0f172a;
            color: #94a3b8;
            padding: 60px 0 30px;
            font-size: 0.9rem;
        }
        .footer-simple h5, .footer-simple h6 {
            font-weight: 700;
            color: #ffffff;
        }
        .footer-simple a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease, padding-left 0.2s ease;
            display: block;
            padding: 4px 0;
        }
        .footer-simple a:hover {
            color: #ffffff;
            padding-left: 4px;
        }
        .footer-simple-visi-box {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .footer-simple-social-icon {
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            transition: background-color 0.2s, color 0.2s, transform 0.2s;
        }
        .footer-simple-social-icon:hover {
            background-color: #ffb900;
            color: #ffffff;
            transform: translateY(-2px);
        }
        .footer-simple-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
            color: #94a3b8;
        }
        .footer-simple-contact-item i {
            margin-top: 3px;
            font-size: 1rem;
        }
        .footer-simple-meta-school {
            color: #64748b;
            font-size: 0.8rem;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('public.index') }}">
                @if(isset($profilSekolah) && $profilSekolah->logo)
                    <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo {{ $profilSekolah->nama_sekolah }}" width="40" height="40" class="rounded-circle object-fit-cover">
                @else
                    <img src="{{ asset('storage/profil/logo_sekolah.png') }}" alt="Logo Sekolah" width="40" height="40" class="rounded-circle object-fit-cover" onerror="this.onerror=null; this.src='https://via.placeholder.com/40';">
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
                        <a class="nav-link active" href="{{ route('public.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.profil') }}">Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.ekstrakurikuler') }}">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.guru') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>

        @yield('content')
    </main>

    <footer id="kontak" class="footer-simple">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('storage/profil/logo_sekolah.png') }}" alt="Logo SMA Negeri 24 Bandung" width="50" height="50" class="rounded-circle object-fit-cover" onerror="this.onerror=null; this.src='{{ asset('assets/images/logo-icon.png') }}';">
                        <div>
                            <h5 class="mb-0 text-white">SMA Negeri 24 Bandung</h5>
                        </div>
                    </div>

                    <div class="footer-simple-visi-box">
                        <h6 class="fw-bold text-white mb-2" style="font-size: 0.95rem;">Visi Kami</h6>
                        <p class="small mb-0 text-slate-400">
                            Menjadi sekolah unggulan yang menghasilkan lulusan berkarakter, berprestasi, berwawasan global, dan berlandaskan ilmu pengetahuan serta ketakwaan.
                        </p>
                    </div>

                    <div>
                        <span class="d-block small fw-bold mb-2 text-white">Ikuti Kami</span>
                        <div class="d-flex gap-2">
                            <a href="#" class="footer-simple-social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="footer-simple-social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="footer-simple-social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="footer-simple-social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 ps-lg-5">
                    <h6 class="text-white fw-bold mb-3" style="letter-spacing: 0.3px;">Menu Utama</h6>
                    <div class="d-flex flex-column gap-1">
                        <a href="#">Beranda</a>
                        <a href="#profil">Tentang Kami</a>
                        <a href="#informasi">Kegiatan</a>
                        <a href="#ekstrakurikuler">Ekstrakurikuler</a>
                        <a href="#galeri">Galeri</a>
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
                        <span class="small text-slate-400">info@sman24bdg.sch.id</span>
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
                &copy; 2026 <strong>SMA Negeri 24 Bandung</strong>. All rights reserved.
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
