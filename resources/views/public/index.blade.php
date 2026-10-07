<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="{{ asset('storage/profil/logo_sekolah.png') }}" alt="Logo SMA Negeri 24 Bandung" width="40" height="40" class="rounded-circle object-fit-cover" onerror="this.onerror=null; this.src='{{ asset('assets/images/logo-icon.png') }}';">
                <div>
                    <div class="fw-bold text-dark lh-1" style="font-size: 1.1rem; letter-spacing: -0.3px;">SMA Negeri 24 Bandung</div>
                    <small class="text-muted d-block" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.3px;">WE CREATE OUR FUTURE</small>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-lg-2 mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ekstrakurikuler">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="position-relative overflow-hidden"
                style="background: url('{{ asset('assets/images/gedung_sekolah.jpg') }}') center/cover no-repeat; padding: 120px 0 100px; min-height: 550px; display: flex; align-items: center;">

            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(15, 23, 42, 0.65); z-index: 1;"></div>

            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-9">
                        <span class="badge rounded-pill border border-warning text-warning bg-dark bg-opacity-50 mb-3 px-3 py-2 text-uppercase fw-semibold" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                            <i class="fas fa-circle text-warning me-1" style="font-size: 8px;"></i> INFORMASI UNGGULAN
                        </span>

                        <h1 class="fw-bold display-4 mb-3 text-white" style="font-weight: 800; letter-spacing: -0.5px;">
                            Selamat Datang di SMA<br>Negeri 24 Bandung
                        </h1>

                        <p class="fs-5 text-white opacity-90 mb-4" style="max-width: 700px; line-height: 1.6;">
                            Sekolah Berkarakter, Unggul dalam Prestasi Akademik & Non-Akademik, Berwawasan Global.
                        </p>

                        <a href="#profil" class="btn btn-warning text-dark px-4 py-2.5 fw-bold rounded-pill shadow-sm">
                            Jelajahi Profil Sekolah &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container position-relative mb-5" style="margin-top: -50px; z-index: 10;">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background-color: #1a2332;">
                <div class="card-body p-4">
                    <div class="row text-center text-white g-3 align-items-center">

                        <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                            <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">1.364</h2>
                            <p class="text-uppercase text-light opacity-75 small mb-0 fw-semibold" style="letter-spacing: 0.8px; font-size: 0.72rem;">PESERTA DIDIK</p>
                        </div>

                        <div class="col-6 col-md-3 border-end-md border-secondary border-opacity-25">
                            <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">83+</h2>
                            <p class="text-uppercase text-light opacity-75 small mb-0 fw-semibold" style="letter-spacing: 0.8px; font-size: 0.72rem;">GURU & TENDIK</p>
                        </div>

                        <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                            <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">A (Unggul)</h2>
                            <p class="text-uppercase text-light opacity-75 small mb-0 fw-semibold" style="letter-spacing: 0.8px; font-size: 0.72rem;">AKREDITASI BAN-S/M</p>
                        </div>

                        <div class="col-6 col-md-3">
                            <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">1+</h2>
                            <p class="text-uppercase text-light opacity-75 small mb-0 fw-semibold" style="letter-spacing: 0.8px; font-size: 0.72rem;">PRESTASI TERDAFTAR</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <div class="text-center py-5">
        <span class="badge rounded-pill border border-primary-subtle text-primary bg-light px-3 py-2 fw-semibold text-uppercase mb-3" style="letter-spacing: 0.5px; font-size: 0.75rem;">
            IDENTITAS SEKOLAH
        </span>

        <h1 class="fw-extrabold text-dark display-5 mb-2" style="font-weight: 800; color: #1e293b; letter-spacing: -0.5px;">
            SMA NEGERI 24 BANDUNG
        </h1>

        <p class="text-secondary fw-medium mb-0" style="font-size: 1.05rem;">
            Jl. A.H. Nasution No. 27 Bandung
        </p>
    </div>

    <section id="sambutan" class="py-4">
        <div class="container">
            <div class="card border-0 shadow-lg rounded-4 text-white p-4 p-md-5" style="background-color: #1e293b;">
                <div class="row align-items-center g-4">
                    <div class="col-md-4 text-center">
                        <img src="/storage/profil/kepala_sekolah.jpg"
                            alt="Lia Aprilina, S.Pd, M.Pd"
                            class="img-fluid rounded-4 border border-2 border-warning shadow"
                            style="max-height: 380px; width: 100%; object-fit: cover;">
                    </div>

                    <div class="col-md-8">
                        <span class="text-warning fw-bold text-uppercase small" style="letter-spacing: 0.5px;">SAMBUTAN PIMPINAN</span>
                        <h2 class="fw-bold text-white mb-1">Lia Aprilina, S.Pd, M.Pd</h2>
                        <p class="text-white-50 mb-3">Kepala SMA Negeri 24 Bandung</p>

                        <div class="p-4 rounded-4 mb-4" style="background-color: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.15);">
                            <p class="mb-0 text-light fst-italic lh-lg" style="font-size: 1rem;">
                                "Pertama-tama, marilah kita panjatkan puji syukur ke hadirart Allah SWT, Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya kita dapat berkumpul pada kesempatan yang baik ini. Saya merasa sangat bahagia dan terhormat untuk..."
                            </p>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
                            <div class="d-flex align-items-center text-warning fw-bold">
                                <span class="me-2"></span> SMAN 24 Bandung
                            </div>
                            <a href="#profil" class="btn btn-warning text-dark fw-bold px-4 py-2 rounded-pill d-inline-flex align-items-center justify-content-center shadow-sm">
                                Baca Selengkapnya <span class="ms-2">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ekstrakurikuler" class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                     <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                        KEGIATAN SISWA
                    </span>
                    <h3 class="fw-bold text-dark mb-0" style="color: #1e293b;">Ekstrakurikuler SMAN 24 Bandung</h3>
                </div>
                 <a href="#" class="btn btn-outline-warning text-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3">Lihat Semua Eskul &rarr;</a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <div class="position-relative w-100 bg-secondary" style="height: 200px;">
                            <img src="{{ asset('storage/ekstrakurikuler/paskibra.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Paskibra" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x200?text=Paskibra';">

                            <span class="position-absolute bottom-0 start-0 m-3 badge bg-dark bg-opacity-75 text-white rounded-pill px-3 py-2 font-monospace fw-normal" style="font-size: 0.75rem; backdrop-filter: blur(4px);">
                                 Setiap Rabu & Sabtu 15:30 WIB
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold text-dark fs-5 mb-2" style="color: #1e293b; line-height: 1.4;">
                                    Paskibra SMAN 24 Bandung
                                </h5>

                                <p class="text-muted small mb-3" style="line-height: 1.6; font-size: 0.875rem;">
                                    Pasukan Pengibar Bendera SMA Negeri 24 Bandung.
                                </p>
                            </div>

                            <div class="pt-3 border-top border-light d-flex justify-content-between align-items-center">
                                <span class="text-muted small" style="font-size: 0.78rem;">
                                    Pembina: <strong class="text-dark">Dedi Kurniawan, S.Pd.</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <div class="position-relative w-100 bg-secondary" style="height: 200px;">
                            <img src="{{ asset('storage/ekstrakurikuler/Pramuka.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Pramuka" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x200?text=Pramuka';">

                            <span class="position-absolute bottom-0 start-0 m-3 badge bg-dark bg-opacity-75 text-white rounded-pill px-3 py-2 font-monospace fw-normal" style="font-size: 0.75rem; backdrop-filter: blur(4px);">
                                Setiap Jumat 15:00 WIB
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold text-dark fs-5 mb-2" style="color: #1e293b; line-height: 1.4;">
                                    Pramuka Ambalan
                                </h5>

                                <p class="text-muted small mb-3" style="line-height: 1.6; font-size: 0.875rem;">
                                    Wadah pembinaan kepramukaan dan kepemimpinan siswa.
                                </p>
                            </div>

                            <div class="pt-3 border-top border-light d-flex justify-content-between align-items-center">
                                <span class="text-muted small" style="font-size: 0.78rem;">
                                    Pembina: <strong class="text-dark">-</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <div class="position-relative w-100 bg-secondary" style="height: 200px;">
                            <img src="{{ asset('storage/ekstrakurikuler/PMR.jpg') }}" class="w-100 h-100 object-fit-cover" alt="PMR" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x200?text=PMR';">

                            <span class="position-absolute bottom-0 start-0 m-3 badge bg-dark bg-opacity-75 text-white rounded-pill px-3 py-2 font-monospace fw-normal" style="font-size: 0.75rem; backdrop-filter: blur(4px);">
                                 Setiap Kamis 15:30 WIB
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold text-dark fs-5 mb-2" style="color: #1e293b; line-height: 1.4;">
                                    Palang Merah Remaja (PMR)
                                </h5>

                                <p class="text-muted small mb-3" style="line-height: 1.6; font-size: 0.875rem;">
                                    Mengembangkan jiwa kemanusiaan dan keterampilan pertolongan pertama.
                                </p>
                            </div>

                            <div class="pt-3 border-top border-light d-flex justify-content-between align-items-center">
                                <span class="text-muted small" style="font-size: 0.78rem;">
                                    Pembina: <strong class="text-dark">-</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="informasi" class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                        KABAR SEKOLAH
                    </span>
                    <h2 class="fw-extrabold text-dark mb-0" style="font-weight: 800; color: #1e293b; letter-spacing: -0.5px;">
                        Berita Terbaru
                    </h2>
                </div>

                <a href="#" class="btn btn-outline-warning text-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3">
                    Lihat Semua Berita &rarr;
                </a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <img src="{{ asset('storage/berita/steam.jpg') }}" class="card-img-top object-fit-cover" alt="GIAT Steam" style="height: 220px;" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x230?text=Steam';">

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #334155; color: #ffffff; font-size: 0.7rem; letter-spacing: 0.5px;">
                                    BERITA
                                </span>
                                <small class="text-muted fw-medium" style="font-size: 0.8rem;">03 Sep 2026</small>
                            </div>

                            <h5 class="fw-bold text-dark fs-6 mb-2" style="color: #1e293b; line-height: 1.4;">
                                GIAT Steam di SMAN 4 Bandung
                            </h5>

                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.6; font-size: 0.875rem;">
                                SMAN 4 Bandung baru saja menjadi tuan rumah program internasional International BijakTech yang berfokus pada pendidikan digital, inovasi, dan...
                            </p>

                            <div class="pt-3 border-top border-light d-flex justify-content-end align-items-center">
                                <a href="#" class="text-decoration-none fw-semibold text-dark small hover-blue">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <img src="{{ asset('storage/berita/milangkala.jpg') }}" class="card-img-top object-fit-cover" alt="Milangkala" style="height: 220px;" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x230?text=Milangkala';">

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #334155; color: #ffffff; font-size: 0.7rem; letter-spacing: 0.5px;">
                                    BERITA
                                </span>
                                <small class="text-muted fw-medium" style="font-size: 0.8rem;">27 Aug 2026</small>
                            </div>

                            <h5 class="fw-bold text-dark fs-6 mb-2" style="color: #1e293b; line-height: 1.4;">
                                Milangkala SMAN 24 Bandung
                            </h5>

                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.6; font-size: 0.875rem;">
                                Milangkala SMAN 24 Bandung
                            </p>

                            <div class="pt-3 border-top border-light d-flex justify-content-end align-items-center">
                                <a href="#" class="text-decoration-none fw-semibold text-dark small hover-blue">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <img src="{{ asset('storage/berita/kurikulum.jpg') }}" class="card-img-top object-fit-cover" alt="Kurikulum" style="height: 220px;" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x230?text=Kurikulum';">

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #334155; color: #ffffff; font-size: 0.7rem; letter-spacing: 0.5px;">
                                    BERITA
                                </span>
                                <small class="text-muted fw-medium" style="font-size: 0.8rem;">15 Aug 2026</small>
                            </div>

                            <h5 class="fw-bold text-dark fs-6 mb-2" style="color: #1e293b; line-height: 1.4;">
                                Sosialisasi Kurikulum Pembelajaran
                            </h5>

                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.6; font-size: 0.875rem;">
                                SMAN 24 Bandung sudah menerapkan Kurikulum Merdeka sejak tahun 2023
                            </p>

                            <div class="pt-3 border-top border-light d-flex justify-content-end align-items-center">
                                <a href="#" class="text-decoration-none fw-semibold text-dark small hover-blue">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="guru" class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                        TENAGA PENDIDIK
                    </span>
                    <h3 class="fw-bold text-dark mb-0">Direktori Guru SMA NEGERI 24 BANDUNG</h3>
                </div>
                 <a href="#" class="btn btn-outline-warning text-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3">Lihat Semua Guru &rarr;</a>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <div class="position-relative w-100 bg-secondary" style="height: 220px;">
                            <img src="{{ asset('storage/guru/arin_tentrem.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Arin Tentrem">
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-2">
                                    <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #334155; color: #ffffff; font-size: 0.7rem;">
                                        KIMIA
                                    </span>
                                </div>

                                <h5 class="fw-bold text-dark fs-6 mb-1" style="color: #1e293b; line-height: 1.4;">
                                    Arin Tentrem Mawati S.Pd, M.M.Pd
                                </h5>

                                <small class="text-muted d-block mb-3" style="font-size: 0.8rem;">
                                    NIP: 197001312008012009
                                </small>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <div class="position-relative w-100 bg-secondary" style="height: 220px;">
                            <img src="{{ asset('storage/guru/baran.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Baran Bhuana">
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-2">
                                    <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #334155; color: #ffffff; font-size: 0.7rem;">
                                        SENI & BUDAYA
                                    </span>
                                </div>

                                <h5 class="fw-bold text-dark fs-6 mb-1" style="color: #1e293b; line-height: 1.4;">
                                    Baran Bhuana S.Pd
                                </h5>

                                <small class="text-muted d-block mb-3" style="font-size: 0.8rem;">
                                    NIP: 198706112024211011
                                </small>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <div class="position-relative w-100 bg-secondary" style="height: 220px;">
                            <img src="{{ asset('storage/guru/cucu.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Cucu">
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-2">
                                    <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #334155; color: #ffffff; font-size: 0.7rem;">
                                        BAHASA INDONESIA
                                    </span>
                                </div>

                                <h5 class="fw-bold text-dark fs-6 mb-1" style="color: #1e293b; line-height: 1.4;">
                                    Cucu S.Pd
                                </h5>

                                <small class="text-muted d-block mb-3" style="font-size: 0.8rem;">
                                    NIP: 197503122005012004
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover">
                        <div class="position-relative w-100 bg-secondary" style="height: 220px;">
                            <img src="{{ asset('storage/guru/dedy.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Dedy">
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-2">
                                    <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #334155; color: #ffffff; font-size: 0.7rem;">
                                        MATEMATIKA
                                    </span>
                                </div>

                                <h5 class="fw-bold text-dark fs-6 mb-1" style="color: #1e293b; line-height: 1.4;">
                                    Dedy S.Pd
                                </h5>

                                <small class="text-muted d-block mb-3" style="font-size: 0.8rem;">
                                    NIP: 198005152010011008
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


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