@extends('public.dashboard')

@section('title', 'Direktori Guru & Tendik - SMA Negeri 24 Bandung')

@section('content')

        <section class="position-relative overflow-hidden"
                style="background: url('{{ isset($profilSekolah->gambar_bg) ? asset('storage/' . $profilSekolah->gambar_bg) : asset('assets/images/gedung_sekolah.jpg') }}') center/cover no-repeat; padding: 120px 0 100px; min-height: 550px; display: flex; align-items: center;">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(15, 23, 42, 0.65); z-index: 1;"></div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-9">
                        <span class="badge rounded-pill border border-warning text-warning bg-dark bg-opacity-50 mb-3 px-3 py-2 text-uppercase fw-semibold" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                            <i class="fas fa-circle text-warning me-1" style="font-size: 8px;"></i> INFORMASI UNGGULAN
                        </span>
                        <h1 class="fw-bold display-4 mb-3 text-white" style="font-weight: 800; letter-spacing: -0.5px;">
                            Selamat Datang di<br>{{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                        </h1>
                        <p class="fs-5 text-white opacity-90 mb-4" style="max-width: 700px; line-height: 1.6;">
                            {{ $profilSekolah->deskripsi ?? 'Sekolah Berkarakter, Unggul dalam Prestasi Akademik & Non-Akademik, Berwawasan Global.' }}
                        </p>
                        <a href="{{ route('public.profil') }}" class="btn btn-warning text-dark px-4 py-2.5 fw-bold rounded-pill shadow-sm">
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

                <!-- Peserta Didik -->
                <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                    <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">
                        {{ number_format($totalSiswa ?? 1364, 0, ',', '.') }}
                    </h2>
                    <p class="text-uppercase text-light opacity-75 small mb-0 fw-semibold" style="letter-spacing: 0.8px; font-size: 0.72rem;">PESERTA DIDIK</p>
                </div>

                <!-- Guru & Tendik -->
                <div class="col-6 col-md-3 border-end-md border-secondary border-opacity-25">
                    <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">
                        {{ $totalGuru ?? 83 }}
                    </h2>
                    <p class="text-uppercase text-light opacity-75 small mb-0 fw-semibold" style="letter-spacing: 0.8px; font-size: 0.72rem;">GURU & TENDIK</p>
                </div>

                <!-- Total Ekstrakurikuler (Ganti dari Akreditasi) -->
                <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                    <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">
                        {{ $totalEskul ?? $totalEkstrakurikuler ?? \App\Models\Ekstrakurikuler::count() }}
                    </h2>
                    <p class="text-uppercase text-light opacity-75 small mb-0 fw-semibold" style="letter-spacing: 0.8px; font-size: 0.72rem;">EKSTRAKURIKULER</p>
                </div>

                <!-- Prestasi Terdaptar -->
                <div class="col-6 col-md-3">
                    <h2 class="fw-extrabold text-warning mb-1" style="font-weight: 800; font-size: 2rem;">
                        {{ $totalPrestasi ?? 1 }}
                    </h2>
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
                {{ strtoupper($profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG') }}
            </h1>
            <p class="text-secondary fw-medium mb-0" style="font-size: 1.05rem;">
                {{ $profilSekolah->alamat ?? 'Jl. A.H. Nasution No. 27 Bandung' }}
            </p>
        </div>

        <section id="sambutan" class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- Kolom Kiri: Foto Kepala Sekolah dengan Name Tag 2 Baris -->
            <div class="col-lg-5 col-md-5">
                <div class="position-relative mx-auto" style="max-width: 380px;">
                    <!-- Foto Kepala Sekolah -->
                    @if(isset($profilSekolah->foto_kepala_sekolah) && $profilSekolah->foto_kepala_sekolah)
                        <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}"
                             alt="{{ $profilSekolah->nama_kepala_sekolah ?? 'Kepala Sekolah' }}"
                             class="img-fluid rounded-4 shadow w-100 object-fit-cover"
                             style="height: 400px;">
                    @else
                        <img src="{{ asset('storage/profil/kepala_sekolah.jpg') }}"
                             alt="Lia Aprilina, S.Pd, M.Pd"
                             class="img-fluid rounded-4 shadow w-100 object-fit-cover"
                             style="height: 400px;"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/380x400?text=Kepala+Sekolah';">
                    @endif

                    <!-- Badge Nama & Jabatan (2 Baris Rapi) -->
                    <div class="position-absolute bottom-0 start-50 translate-middle-x w-90 mb-3 text-center">
                        <div class="bg-primary text-white py-2 px-3 rounded-3 shadow" style="background-color: #0f172a !important;">
                            <h6 class="fw-bold mb-0 text-white text-nowrap" style="font-size: 0.95rem;">
                                {{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}
                            </h6>
                            <small class="text-warning fw-semibold text-nowrap d-block" style="font-size: 0.8rem;">
                                Kepala {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Teks Sambutan Ringkas -->
            <div class="col-lg-7 col-md-7">
                <!-- Tag Headline Kuning -->
                <span class="badge bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    SAMBUTAN PIMPINAN
                </span>

                <!-- Judul Utama -->
                <h2 class="fw-bold text-dark mb-3" style="color: #0f172a !important; font-size: 2rem;">
                    Sambutan Kepala Sekolah
                </h2>

                <!-- Teks Salam -->
                <p class="fst-italic text-muted fw-semibold mb-3" style="font-size: 0.95rem;">
                    "Assalamu'alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera bagi Kita Semua."
                </p>


                <p class="text-secondary mb-3" style="line-height: 1.8; font-size: 0.95rem;">
                    Selamat datang di website resmi <strong>{{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}</strong>. Sebagai lembaga pendidikan menengah unggulan, kami berkomitmen mencetak lulusan yang tidak hanya unggul secara akademis, tetapi juga memiliki integritas moral serta karakter yang kuat.
                </p>


                <p class="text-secondary mb-4" style="line-height: 1.8; font-size: 0.95rem;">
                    Melalui kurikulum berbasis kompetensi yang diselaraskan dengan perkembangan zaman, didukung tenaga pendidik profesional dan sarana prasarana modern, kami optimis mampu membawa putra-putri Anda meraih cita-cita dan sukses di masa depan.
                </p>

                <!-- Tombol Action (Tanpa Motto) -->
                <div>
                    <a href="{{ route('public.profil') }}" class="btn btn-primary fw-bold px-4 py-2 rounded-3 shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #0f172a !important; border-color: #0f172a !important;">
                        Profil Lengkap <span>&rarr;</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>

    <!-- Section Visi & Misi di Beranda (Judul Tengah + Teks Lebih Pas + Tombol Hitam Tengah) -->
<section id="visi-misi" class="py-5 bg-white">
    <div class="container">

        <!-- Header Section Visi & Misi (Rata Tengah & Lebih Besar) -->
        <div class="text-center mb-4">
            <span class="text-warning fw-bold text-uppercase small tracking-wider mb-2 d-block" style="letter-spacing: 1px; font-size: 0.8rem; color: #b45309 !important;">
                PEDOMAN SEKOLAH
            </span>
            <h2 class="fw-bold text-dark mb-0" style="color: #0f172a !important; font-size: 2.25rem;">
                Visi & Misi
            </h2>
        </div>

        <!-- Teks Visi & Misi (Lebih Panjang & Pas) -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10 text-center">
                <p class="text-secondary lh-lg mb-0" style="font-size: 1rem; color: #475569;">
                    {{ Str::limit(strip_tags($profilSekolah->visi_misi ?? 'VISI: Terwujudnya lulusan unggul, berkarakter yang dilandasi ketaatan beragama, berbudaya, berbasis lingkungan dan berperilaku hidup bersih, sehat, sehingga mampu hidup selaras dengan tuntutan era global. MISI: 1. Mengembangkan pembelajaran yang aktif, inovatif, dan berbasis teknologi. 2. Meningkatkan kompetensi akademik dan non-akademik peserta didik secara berkelanjutan.'), 450) }}
                </p>
            </div>
        </div>

        <!-- Tombol Hitam 'Baca Selengkapnya' (Rata Tengah) -->
        <div class="text-center">
            <a href="{{ route('public.profil') }}" class="btn btn-dark fw-bold px-4 py-2 rounded-3 shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #0f172a !important; border-color: #0f172a !important; font-size: 0.95rem;">
                Baca Selengkapnya <span>&rarr;</span>
            </a>
        </div>

    </div>
</section>

       <!-- Section: Ekstrakurikuler (Ringkas untuk Beranda) -->
<section id="ekstrakurikuler" class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                    KEGIATAN SISWA
                </span>
                <h3 class="fw-bold text-dark mb-0" style="color: #0f172a !important;">
                    Ekstrakurikuler {{ $profilSekolah->nama_sekolah ?? 'SMAN 24 Bandung' }}
                </h3>
            </div>
            <a href="{{ route('public.ekstrakurikuler') }}" class="btn btn-outline-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3" style="border-color: #0f172a; color: #0f172a;">
                Lihat Semua Eskul &rarr;
            </a>
        </div>

        <!-- Cards Grid Eskul (Dibatasi Maksimal 3 dengan ->take(3)) -->
        <div class="row g-4">
            @forelse(collect($ekstrakurikuler)->take(3) as $eskul)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden">
                        <div>
                            <!-- Foto Full Atas -->
                            <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden;">
                                @if(isset($eskul->gambar) && $eskul->gambar)
                                    <img src="{{ asset('storage/' . $eskul->gambar) }}"
                                         class="w-100 h-100 object-fit-cover"
                                         alt="{{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler }}">
                                @elseif(isset($eskul->foto) && $eskul->foto)
                                    <img src="{{ asset('storage/' . $eskul->foto) }}"
                                         class="w-100 h-100 object-fit-cover"
                                         alt="{{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler }}">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary bg-opacity-10 text-muted fs-5 fw-bold text-center p-3">
                                        {{ Str::limit($eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler ?? 'ESKUL', 20) }}
                                    </div>
                                @endif
                            </div>

                            <!-- Detail Content: Judul & Deskripsi Singkat Saja -->
                            <div class="p-4 pb-2">
                                <!-- Nama Eskul -->
                                <h5 class="fw-bold text-dark mb-2" style="color: #0f172a; font-size: 1.15rem; line-height: 1.4;">
                                    <a href="{{ route('public.ekstrakurikuler.show', $eskul->slug ?? $eskul->id) }}" class="text-decoration-none text-dark hover-primary">
                                        {{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler ?? $eskul->nama }}
                                    </a>
                                </h5>

                                <!-- Deskripsi Singkat -->
                                <p class="text-muted small mb-0" style="line-height: 1.6; font-size: 0.85rem;">
                                    {{ Str::limit(strip_tags($eskul->deskripsi ?? ''), 110) }}
                                </p>
                            </div>
                        </div>

                        <!-- Footer Card: Tombol Baca Selengkapnya Warna Hitam -->
                        <div class="p-4 pt-0 text-end">
                            <hr class="my-3" style="border-color: #f1f5f9; opacity: 1;">
                            <a href="{{ route('public.ekstrakurikuler.show', $eskul->slug ?? $eskul->id) }}" class="fw-bold text-dark text-decoration-none small d-inline-block" style="color: #0f172a !important;">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4 text-muted">
                    <p class="mb-0">Belum ada data ekstrakurikuler.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

        <!-- Section: Berita Terbaru -->
        <section id="berita" class="py-5" style="background-color: #f8fafc;">
            <div class="container">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                            KABAR SEKOLAH
                        </span>
                        <h3 class="fw-bold text-dark mb-0" style="color: #1e293b;">Berita Terbaru</h3>
                    </div>
                    <a href="{{ route('public.berita')}}" class="btn btn-outline-warning text-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3">
                        Lihat Semua Berita &rarr;
                    </a>
                </div>

                <!-- Cards Grid -->
                <div class="row g-4">
                    @forelse($berita as $b)
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden">
                                <div>
                                    <!-- Gambar Berita -->
                                    <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden;">
                                        @if($b->gambar)
                                            <img src="{{ asset('storage/' . $b->gambar) }}"
                                                class="w-100 h-100 object-fit-cover"
                                                alt="{{ $b->judul }}">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary bg-opacity-10 text-muted fs-5 text-center p-3">
                                                {{ Str::limit($b->judul, 20) }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Detail Content -->
                                    <div class="p-4 pb-2">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="badge rounded-pill text-white px-3 py-2" style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.5px;">
                                                BERITA
                                            </span>
                                            <span class="text-muted small" style="font-size: 0.8rem;">
                                                {{ $b->tanggal ? \Carbon\Carbon::parse($b->tanggal)->format('d M Y') : $b->created_at->format('d M Y') }}
                                            </span>
                                        </div>

                                        <!-- Judul Berita -->
                                        <h5 class="fw-bold text-dark mb-2" style="font-size: 1.05rem; line-height: 1.4;">
                                            {{ $b->judul }}
                                        </h5>

                                        <!-- Isi Berita (Memakai atribut 'isi' dari Model) -->
                                        <p class="text-muted small mb-0" style="line-height: 1.6; font-size: 0.85rem;">
                                            {{ Str::limit(strip_tags($b->isi), 110) }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Link Baca Selengkapnya -->
                                <div class="p-4 pt-0 text-end">
                                    <a href="{{ route('public.berita.show', $b->slug) }}"
                                        class="btn btn-link p-0 text-dark fw-bold text-decoration-none small">
                                            Baca Selengkapnya &rarr;
                                        </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <p class="mb-0">Belum ada berita terbaru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Section: Prestasi Siswa & Sekolah -->
        <section id="prestasi" class="py-5" style="background-color: #ffffff;">
            <div class="container">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                            KEBANGGAAN SEKOLAH
                        </span>
                        <h3 class="fw-bold text-dark mb-0" style="color: #1e293b;">
                            Prestasi {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                        </h3>
                    </div>
                    <a href="{{ route('public.prestasi') }}" class="btn btn-outline-warning text-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3">
                        Lihat Semua Prestasi &rarr;
                    </a>
                </div>

                <!-- Cards Grid Prestasi (Dibatasi Hanya 3 Card) -->
                <div class="row g-4">
                    @forelse(collect($prestasi ?? [])->take(3) as $p)
                        @php
                            $imgFile = $p->foto ?? $p->gambar ?? $p->file ?? null;
                            $imgUrl = $imgFile ? asset('storage/' . $imgFile) : null;
                        @endphp
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden">
                                <div>
                                    <!-- Foto / Piala / Default Icon -->
                                    <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden;">
                                        @if($imgUrl)
                                            <img src="{{ $imgUrl }}"
                                                class="w-100 h-100 object-fit-cover"
                                                alt="{{ $p->nama_prestasi }}">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning fs-1 fw-bold">
                                                🏆
                                            </div>
                                        @endif

                                        <!-- Badge Kategori -->
                                        @if(isset($p->kategori))
                                            <span class="position-absolute top-0 start-0 m-3 badge rounded-pill text-white px-3 py-2 shadow-sm"
                                                style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.5px;">
                                                {{ strtoupper($p->kategori) }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Detail Content -->
                                    <div class="p-4 pb-2 text-start">
                                        <h6 class="fw-bold text-dark mb-1 line-clamp-2" style="font-size: 0.95rem; line-height: 1.35; color: #1e293b;" title="{{ $p->nama_prestasi }}">
                                            {{ $p->nama_prestasi }}
                                        </h6>
                                        <p class="text-muted small mb-1" style="font-size: 0.8rem; color: #64748b !important;">
                                            <strong>{{ $p->pemenang ?? '-' }}</strong>
                                        </p>
                                        @if(isset($p->event))
                                            <p class="text-muted small mb-0" style="font-size: 0.73rem; color: #94a3b8 !important;">
                                                {{ $p->event }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Footer Card: Tombol Baca Selengkapnya di Kanan -->
                                <div class="p-4 pt-0">
                                    <div class="d-inline-block rounded-pill border border-warning px-3 py-1 mb-3"
                                        style="background-color: #fffdf5; border-color: #fde047 !important;">
                                        <span class="fw-semibold d-block text-wrap" style="color: #854d0e; font-size: 0.72rem;">
                                            Tingkat {{ $p->tingkat ?? 'Sekolah' }} &bull; {{ $p->tahun ?? '2026' }}
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('public.prestasi.show', $p->id_prestasi ?? $p->id) }}"
                                        class="btn btn-link p-0 text-dark fw-bold text-decoration-none small">
                                            Baca Selengkapnya &rarr;
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <p class="mb-0">Belum ada data prestasi yang ditampilkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>


    <!-- Section: Direktori Guru -->
    <section id="guru" class="py-5" style="background-color: #f8fafc;">
        <div class="container">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                        TENAGA PENDIDIK
                    </span>
                    <h3 class="fw-bold text-dark mb-0" style="color: #1e293b;">
                        Direktori Guru {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                    </h3>
                </div>
                <a href="{{ route('public.guru') }}" class="btn btn-outline-warning text-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3">
                    Lihat Semua Guru &rarr;
                </a>
            </div>

            <!-- Grid Cards -->
            <div class="row g-4">
                @forelse(collect($guru ?? []) as $g)
                    <div class="col-12 col-sm-6 col-lg-3">
                        {{-- Menggunakan $g->id_guru sesuai primary key tabelmu --}}
                        <a href="{{ route('public.guru.show', $g->id_guru) }}" class="text-decoration-none h-100 d-block">
                            <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden teacher-card transition-hover">
                                <div>
                                    <!-- Foto Full di Atas -->
                                    <div class="position-relative w-100 bg-secondary bg-opacity-10" style="height: 240px; overflow: hidden;">
                                        @if(isset($g->foto) && $g->foto)
                                            <img src="{{ asset('storage/' . $g->foto) }}"
                                                class="w-100 h-100 object-fit-cover"
                                                alt="{{ $g->nama_guru ?? $g->nama }}">
                                        @elseif(isset($g->gambar) && $g->gambar)
                                            <img src="{{ asset('storage/' . $g->gambar) }}"
                                                class="w-100 h-100 object-fit-cover"
                                                alt="{{ $g->nama_guru ?? $g->nama }}">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted fs-2 fw-bold">
                                                {{ Str::limit($g->nama_guru ?? $g->nama ?? 'GURU', 2, '') }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Nama Guru -->
                                    <div class="p-3 text-center">
                                        <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 0.92rem; line-height: 1.35; color: #1e293b;" title="{{ $g->nama_guru ?? $g->nama }}">
                                            {{ $g->nama_guru ?? $g->nama }}
                                        </h6>
                                    </div>
                                </div>

                                <!-- Mapel & Tombol Detail -->
                                <div class="px-3 pb-3 text-center mt-auto">
                                    <div class="d-inline-block rounded-pill border border-warning px-3 py-1.5 mb-2"
                                        style="background-color: #fffdf5; border-color: #fde047 !important; max-width: 100%;">
                                        <span class="fw-semibold d-block text-wrap"
                                            style="color: #854d0e; font-size: 0.73rem; line-height: 1.4;">
                                            {{ $g->mapel->nama_mapel ?? $g->nama_mapel ?? $g->mapel ?? 'Mata Pelajaran' }}
                                        </span>
                                    </div>

                                    <div class="small fw-bold">
                                        Lihat Detail &rarr;
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        <p class="mb-0">Belum ada data guru.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

        <!-- Section: Galeri Kegiatan -->
<section id="galeri" class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="badge rounded-pill border border-warning text-warning bg-light px-3 py-2 fw-semibold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                    DOKUMENTASI
                </span>
                <h3 class="fw-bold text-dark mb-0" style="color: #1e293b;">
                    Galeri Kegiatan {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </h3>
            </div>
            <a href="{{ route('public.galeri')}}" class="btn btn-outline-warning text-dark fw-semibold btn-sm px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1 text-nowrap ms-3">
                Lihat Semua Galeri &rarr;
            </a>
        </div>

        <!-- Cards Grid Galeri (1 Baris Isi 4 Card) -->
        <div class="row g-4">
            @forelse(collect($galeri ?? [])->take(4) as $index => $item)
                @php
                    $kategori = strtolower($item->kategori ?? 'foto');
                    $rawFile = $item->file ?? $item->foto ?? $item->gambar ?? '';
                    $judulGaleri = $item->judul ?? $item->nama_kegiatan ?? 'Kegiatan Sekolah';
                    $itemId = $item->id_galeri ?? $item->id ?? $index;

                    // Regex untuk ekstrak YouTube Video ID jika kandungan bertipe video/berisi pautan youtube
                    $ytId = null;
                    if ($kategori === 'video' || str_contains($rawFile, 'youtu')) {
                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $rawFile, $matches);
                        $ytId = $matches[1] ?? $rawFile;
                    }

                    // Tentukan URL thumbnail
                    $imgUrl = $ytId
                        ? "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg"
                        : ($rawFile ? asset('storage/' . $rawFile) : null);
                @endphp

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 bg-white h-100 overflow-hidden d-flex flex-column justify-content-between"
                         style="cursor: pointer; transition: transform 0.2s;"
                         data-bs-toggle="modal"
                         data-bs-target="#modalLandingGaleri{{ $itemId }}">

                        <!-- Container Image / Thumbnail -->
                        <div class="position-relative w-100 bg-secondary" style="height: 220px; overflow: hidden;">
                            @if($imgUrl)
                                <img src="{{ $imgUrl }}"
                                     class="w-100 h-100 object-fit-cover {{ $ytId ? 'opacity-90' : '' }}"
                                     alt="{{ $judulGaleri }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white-50 fs-5 fw-bold">
                                    GALERI
                                </div>
                            @endif

                            <!-- Overlay ikon Play jika kategori Video -->
                            @if($ytId)
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center shadow" style="width: 45px; height: 45px;">
                                        <span class="fs-6 ms-1">▶</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Judul Galeri -->
                        <div class="p-3 text-center">
                            <h6 class="text-dark mb-0 text-truncate" style="font-size: 0.92rem; line-height: 1.35; color: #1e293b;" title="{{ $judulGaleri }}">
                                {{ $judulGaleri }}
                            </h6>
                        </div>
                    </div>
                </div>

                <!-- Modal Preview / Player Video -->
                <div class="modal fade" id="modalLandingGaleri{{ $itemId }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded-4 border-0">
                            <div class="modal-header border-0 pb-0">
                                <h6 class="fw-bold mb-0 text-dark">{{ $judulGaleri }}</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-3 text-center">
                                @if($ytId)
                                    <!-- Embedded Player YouTube -->
                                    <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
                                        <iframe src="https://www.youtube.com/embed/{{ $ytId }}" allowfullscreen></iframe>
                                    </div>
                                @elseif($imgUrl)
                                    <!-- Paparan Foto Penuh -->
                                    <img src="{{ $imgUrl }}" class="img-fluid rounded-3 mb-2" style="max-height: 75vh;" alt="{{ $judulGaleri }}">
                                @endif

                                @if(!empty($item->keterangan) || !empty($item->deskripsi))
                                    <p class="text-muted small mb-0 mt-3 text-start px-2">
                                        {{ $item->keterangan ?? $item->deskripsi }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4 text-muted">
                    <p class="mb-0">Belum ada galeri kegiatan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
