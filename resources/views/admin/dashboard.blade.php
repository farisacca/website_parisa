@extends('layouts.app')

@section('title', $title ?? 'Dashboard')

@section('content')

<div class="container-fluid">
    {{-- UCAPAN SELAMAT DATANG --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 rounded" style="background: linear-gradient(135deg, #eef5ff, #f8fbff);">
                <h3 class="font-weight-medium mb-1 text-info">
                    Hello, {{ auth()->user()->name ?? 'Admin' }}!
                </h3>
                <h6 class="font-weight-normal mb-0 text-muted">
                    Selamat datang di Dashboard Admin
                    <span class="text-info font-weight-medium">
                        {{ $profilSekolah->nama_sekolah ?? 'Sekolah' }}
                    </span>.
                </h6>
            </div>
        </div>
    </div>

    {{-- ============================================================= --}}
    {{-- START KARTU STATISTIK (RESPONSIF - GRID STATISTIK) --}}
    {{-- ============================================================= --}}
    <div class="row">
        {{-- TOTAL GURU --}}
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-info mb-1 font-weight-medium">
                                {{ $totalGuru }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-1 text-truncate">
                                Total Guru
                            </h6>
                            <a href="{{ route('admin.guru.index') }}" class="font-12 text-info">
                                Kelola Guru <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="text-info">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL SISWA --}}
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-success mb-1 font-weight-medium">
                                {{ $totalSiswa }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-1 text-truncate">
                                Total Siswa
                            </h6>
                            <a href="{{ route('admin.siswa.index') }}" class="font-12 text-success">
                                Kelola Siswa <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="text-success">
                            <i data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL PRESTASI --}}
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-danger mb-1 font-weight-medium">
                                {{ $totalPrestasi ?? 0 }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-1 text-truncate">
                                Total Prestasi
                            </h6>
                            <a href="{{ route('admin.prestasi.index') }}" class="font-12 text-danger">
                                Kelola Prestasi <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="text-danger">
                            <i data-feather="award"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL BERITA --}}
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-warning mb-1 font-weight-medium">
                                {{ $totalBerita }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-1 text-truncate">
                                Total Berita
                            </h6>
                            <a href="{{ route('admin.berita.index') }}" class="font-12 text-warning">
                                Kelola Berita <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="text-warning">
                            <i data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- EKSTRAKURIKULER --}}
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-primary mb-1 font-weight-medium">
                                {{ $totalEkstrakurikuler }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-1 text-truncate">
                                Ekstrakurikuler
                            </h6>
                            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="font-12 text-primary">
                                Kelola Ekskul <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="text-primary">
                            <i data-feather="activity"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL GALERI --}}
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-purple mb-1 font-weight-medium" style="color: #6f42c1;">
                                {{ $totalGaleri }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-1 text-truncate">
                                Galeri Foto
                            </h6>
                            <a href="{{ route('admin.galeri.index') }}" class="font-12" style="color: #6f42c1;">
                                Kelola Galeri <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div style="color: #6f42c1;">
                            <i data-feather="image"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================= --}}
    {{-- PROFIL SEKOLAH + BERITA TERBARU + PRESTASI TERBARU --}}
    {{-- ============================================================= --}}
    <div class="row">
        {{-- PROFIL SEKOLAH --}}
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title text-info">
                        <i data-feather="home" class="mr-1"></i> Profil Sekolah
                    </h4>

                    @if ($profilSekolah)
                        <div class="text-center mt-4">
                            @if ($profilSekolah->logo && file_exists(public_path('storage/' . $profilSekolah->logo)))
                                <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo Sekolah" width="90" height="90" class="rounded-circle" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="Logo Sekolah" width="90" height="90" class="rounded-circle">
                            @endif

                            <h4 class="mt-3 mb-1 font-weight-medium">
                                {{ $profilSekolah->nama_sekolah }}
                            </h4>
                            <p class="text-info mb-4">
                                NPSN: {{ $profilSekolah->npsn }}
                            </p>
                        </div>

                        {{-- KEPALA SEKOLAH --}}
                        <div class="d-flex align-items-start mb-3">
                            <span class="mr-3 text-info"><i data-feather="user"></i></span>
                            <div>
                                <h6 class="mb-0 font-weight-medium">Kepala Sekolah</h6>
                                <span class="text-muted font-14">{{ $profilSekolah->kepala_sekolah }}</span>
                            </div>
                        </div>

                        {{-- ALAMAT --}}
                        <div class="d-flex align-items-start mb-3">
                            <span class="mr-3 text-info"><i data-feather="map-pin"></i></span>
                            <div>
                                <h6 class="mb-0 font-weight-medium">Alamat</h6>
                                <span class="text-muted font-14">{{ $profilSekolah->alamat }}</span>
                            </div>
                        </div>

                        {{-- KONTAK --}}
                        <div class="d-flex align-items-start mb-3">
                            <span class="mr-3 text-info"><i data-feather="phone"></i></span>
                            <div>
                                <h6 class="mb-0 font-weight-medium">Kontak</h6>
                                <span class="text-muted font-14">{{ $profilSekolah->kontak }}</span>
                            </div>
                        </div>

                        {{-- TAHUN BERDIRI --}}
                        <div class="d-flex align-items-start mb-3">
                            <span class="mr-3 text-info"><i data-feather="calendar"></i></span>
                            <div>
                                <h6 class="mb-0 font-weight-medium">Tahun Berdiri</h6>
                                <span class="text-muted font-14">{{ $profilSekolah->tahun_berdiri }}</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('admin.profil-sekolah.index') }}" class="btn btn-info btn-block">
                                <i data-feather="edit" class="mr-1"></i> Kelola Profil Sekolah
                            </a>
                        </div>
                    @else
                        <div class="text-center mt-4 py-4">
                            <p class="text-muted">Data profil sekolah belum tersedia.</p>
                            <a href="{{ route('admin.profil-sekolah.index') }}" class="btn btn-info">Kelola Profil Sekolah</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- SEKSI KANAN: BERITA TERBARU & PRESTASI TERBARU --}}
        <div class="col-lg-8 col-md-12">
            <div class="row">
                {{-- BERITA TERBARU --}}
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title text-info mb-0">
                                    <i data-feather="file-text" class="mr-1"></i> Berita Terbaru
                                </h4>
                                <a href="{{ route('admin.berita.index') }}" class="btn btn-link text-info p-0">
                                    Lihat Semua
                                </a>
                            </div>

                            <div class="mt-3">
                                @forelse ($beritaTerbaru as $item)
                                    <div class="d-flex align-items-start border-bottom pb-3 mb-3">
                                        <div class="flex-shrink-0">
                                            @if ($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="75" height="55" class="rounded" style="object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width:75px; height:55px;">
                                                    <i data-feather="image" class="text-muted"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="ml-3 flex-grow-1">
                                            <a href="{{ route('admin.berita.show', Crypt::encrypt($item->id_berita)) }}" class="text-dark">
                                                <h5 class="font-weight-medium mb-1">{{ $item->judul }}</h5>
                                            </a>
                                            <p class="font-14 mb-1 text-muted">
                                                {{ Str::limit(strip_tags($item->isi), 90) }}
                                            </p>
                                            <span class="font-weight-light font-14 text-muted">
                                                <i data-feather="calendar"></i> {{ date('d M Y', strtotime($item->tanggal)) }}
                                                &nbsp;&nbsp;
                                                <i data-feather="user"></i> {{ $item->user->name ?? 'Admin' }}
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-3">
                                        <p class="font-14 text-muted mb-0">Belum ada berita.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PRESTASI TERBARU --}}
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title text-danger mb-0">
                                    <i data-feather="award" class="mr-1"></i> Prestasi Terbaru
                                </h4>
                                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-link text-danger p-0">
                                    Lihat Semua
                                </a>
                            </div>

                            <div class="mt-3">
                                @forelse ($prestasiTerbaru ?? [] as $prestasi)
                                    <div class="d-flex align-items-start border-bottom pb-3 mb-3">
                                        <div class="flex-shrink-0">
                                            <div class="bg-light-danger rounded d-flex align-items-center justify-content-center" style="width:55px; height:55px; background-color: #fce8e6;">
                                                <i data-feather="award" class="text-danger"></i>
                                            </div>
                                        </div>

                                        <div class="ml-3 flex-grow-1">
                                            <a href="{{ route('admin.prestasi.show', Crypt::encrypt($prestasi->id_prestasi)) }}" class="text-dark">
                                                <h5 class="font-weight-medium mb-1">{{ $prestasi->nama_prestasi }}</h5>
                                            </a>
                                            <p class="font-14 mb-1 text-muted">
                                                Pemenang: <strong>{{ $prestasi->pemenang }}</strong>
                                                @if($prestasi->event)
                                                    ({{ $prestasi->event }})
                                                @endif
                                                &nbsp;|&nbsp; Tingkat: <span class="badge badge-danger">{{ $prestasi->tingkat }}</span>
                                            </p>
                                            <span class="font-weight-light font-14 text-muted">
                                                <i data-feather="calendar"></i> Tahun {{ $prestasi->tahun }}
                                                @if($prestasi->kategori)
                                                    &nbsp;&nbsp;<i data-feather="tag"></i> {{ $prestasi->kategori }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-3">
                                        <p class="font-14 text-muted mb-0">Belum ada data prestasi.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
