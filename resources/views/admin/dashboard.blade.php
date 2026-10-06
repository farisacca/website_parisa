@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
    <div class="col-12">

        <div class="p-4 rounded"
            style="background: linear-gradient(135deg, #eef5ff, #f8fbff);">

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
    {{-- START FIRST CARDS --}}
    {{-- ============================================================= --}}

    <div class="card-group">

        {{-- TOTAL GURU --}}
        <div class="card border-right">

            <div class="card-body">

                <div class="d-flex d-lg-flex d-md-block align-items-center">

                    <div>

                        <div class="d-inline-flex align-items-center">

                            <h2 class="text-info mb-1 font-weight-medium">
                                {{ $totalGuru }}
                            </h2>

                        </div>

                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                            Total Guru
                        </h6>

                        <a href="{{ route('admin.guru.index') }}"
                            class="font-12 text-info">

                            Kelola Guru
                            <i data-feather="arrow-right"></i>

                        </a>

                    </div>

                    <div class="ml-auto mt-md-3 mt-lg-0">

                        <span class="text-info">
                            <i data-feather="user"></i>
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL SISWA --}}
        <div class="card border-right">

            <div class="card-body">

                <div class="d-flex d-lg-flex d-md-block align-items-center">

                    <div>

                        <div class="d-inline-flex align-items-center">

                            <h2 class="text-success mb-1 font-weight-medium">
                                {{ $totalSiswa }}
                            </h2>

                        </div>

                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                            Total Siswa
                        </h6>

                        <a href="{{ route('admin.siswa.index') }}"
                            class="font-12 text-success">

                            Kelola Siswa
                            <i data-feather="arrow-right"></i>

                        </a>

                    </div>

                    <div class="ml-auto mt-md-3 mt-lg-0">

                        <span class="text-success">
                            <i data-feather="users"></i>
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL BERITA --}}
        <div class="card border-right">

            <div class="card-body">

                <div class="d-flex d-lg-flex d-md-block align-items-center">

                    <div>

                        <div class="d-inline-flex align-items-center">

                            <h2 class="text-warning mb-1 font-weight-medium">
                                {{ $totalBerita }}
                            </h2>

                        </div>

                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                            Total Berita
                        </h6>

                        <a href="{{ route('admin.berita.index') }}"
                            class="font-12 text-warning">

                            Kelola Berita
                            <i data-feather="arrow-right"></i>

                        </a>

                    </div>

                    <div class="ml-auto mt-md-3 mt-lg-0">

                        <span class="text-warning">
                            <i data-feather="file-text"></i>
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL EKSTRAKURIKULER --}}
        <div class="card border-right">

            <div class="card-body">

                <div class="d-flex d-lg-flex d-md-block align-items-center">

                    <div>

                        <div class="d-inline-flex align-items-center">

                            <h2 class="text-primary mb-1 font-weight-medium">
                                {{ $totalEkstrakurikuler }}
                            </h2>

                        </div>

                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                            Ekstrakurikuler
                        </h6>

                        <a href="{{ route('admin.ekstrakurikuler.index') }}"
                            class="font-12 text-primary">

                            Kelola Ekstrakurikuler
                            <i data-feather="arrow-right"></i>

                        </a>

                    </div>

                    <div class="ml-auto mt-md-3 mt-lg-0">

                        <span class="text-primary">
                            <i data-feather="award"></i>
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL GALERI --}}
        <div class="card">

            <div class="card-body">

                <div class="d-flex d-lg-flex d-md-block align-items-center">

                    <div>

                        <div class="d-inline-flex align-items-center">

                            <h2 class="text-danger mb-1 font-weight-medium">
                                {{ $totalGaleri }}
                            </h2>

                        </div>

                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                            Total Galeri
                        </h6>

                        <a href="{{ route('admin.galeri.index') }}"
                            class="font-12 text-danger">

                            Kelola Galeri
                            <i data-feather="arrow-right"></i>

                        </a>

                    </div>

                    <div class="ml-auto mt-md-3 mt-lg-0">

                        <span class="text-danger">
                            <i data-feather="image"></i>
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================================================= --}}
    {{-- PROFIL SEKOLAH + BERITA TERBARU --}}
    {{-- ============================================================= --}}

    <div class="row mt-4">

        {{-- PROFIL SEKOLAH --}}
        <div class="col-lg-4 col-md-12">

            <div class="card h-100">

                <div class="card-body">

                    <h4 class="card-title text-info">
                        <i data-feather="home" class="mr-1"></i>
                        Profil Sekolah
                    </h4>

                    @if ($profilSekolah)

                        <div class="text-center mt-4">

                            @if (
                                $profilSekolah->logo &&
                                file_exists(public_path('storage/' . $profilSekolah->logo))
                            )

                                <img src="{{ asset('storage/' . $profilSekolah->logo) }}"
                                    alt="Logo Sekolah"
                                    width="90"
                                    height="90"
                                    class="rounded-circle"
                                    style="object-fit: cover;">

                            @else

                                <img src="{{ asset('assets/images/logo-icon.png') }}"
                                    alt="Logo Sekolah"
                                    width="90"
                                    height="90"
                                    class="rounded-circle">

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

                            <span class="mr-3 text-info">
                                <i data-feather="user"></i>
                            </span>

                            <div>

                                <h6 class="mb-0 font-weight-medium">
                                    Kepala Sekolah
                                </h6>

                                <span class="text-muted font-14">
                                    {{ $profilSekolah->kepala_sekolah }}
                                </span>

                            </div>

                        </div>


                        {{-- ALAMAT --}}
                        <div class="d-flex align-items-start mb-3">

                            <span class="mr-3 text-info">
                                <i data-feather="map-pin"></i>
                            </span>

                            <div>

                                <h6 class="mb-0 font-weight-medium">
                                    Alamat
                                </h6>

                                <span class="text-muted font-14">
                                    {{ $profilSekolah->alamat }}
                                </span>

                            </div>

                        </div>


                        {{-- KONTAK --}}
                        <div class="d-flex align-items-start mb-3">

                            <span class="mr-3 text-info">
                                <i data-feather="phone"></i>
                            </span>

                            <div>

                                <h6 class="mb-0 font-weight-medium">
                                    Kontak
                                </h6>

                                <span class="text-muted font-14">
                                    {{ $profilSekolah->kontak }}
                                </span>

                            </div>

                        </div>


                        {{-- TAHUN BERDIRI --}}
                        <div class="d-flex align-items-start">

                            <span class="mr-3 text-info">
                                <i data-feather="calendar"></i>
                            </span>

                            <div>

                                <h6 class="mb-0 font-weight-medium">
                                    Tahun Berdiri
                                </h6>

                                <span class="text-muted font-14">
                                    {{ $profilSekolah->tahun_berdiri }}
                                </span>

                            </div>

                        </div>


                        <div class="mt-4">

                            <a href="{{ route('admin.profil-sekolah') }}"
                                class="btn btn-info btn-block">

                                <i data-feather="edit" class="mr-1"></i>
                                Kelola Profil Sekolah

                            </a>

                        </div>

                    @else

                        <div class="text-center mt-4">

                            <p class="text-muted">
                                Data profil sekolah belum tersedia.
                            </p>

                            <a href="{{ route('admin.profil-sekolah') }}"
                                class="btn btn-info">

                                Kelola Profil Sekolah

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- BERITA TERBARU --}}
        <div class="col-lg-8 col-md-12">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex align-items-start">

                        <h4 class="card-title text-info mb-0">

                            <i data-feather="file-text" class="mr-1"></i>
                            Berita Terbaru

                        </h4>

                        <div class="ml-auto">

                            <a href="{{ route('admin.berita.index') }}"
                                class="btn btn-link text-info">

                                Lihat Semua

                            </a>

                        </div>

                    </div>


                    <div class="mt-4">

                        @forelse ($beritaTerbaru as $item)

                            <div class="d-flex align-items-start border-bottom pb-3 mb-3">

                                {{-- GAMBAR --}}
                                <div>

                                    @if (
                                        $item->gambar &&
                                        file_exists(public_path('storage/' . $item->gambar))
                                    )

                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->judul }}"
                                            width="75"
                                            height="55"
                                            class="rounded"
                                            style="object-fit: cover;">

                                    @else

                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width:75px; height:55px;">

                                            <i data-feather="image"
                                                class="text-muted">
                                            </i>

                                        </div>

                                    @endif

                                </div>


                                {{-- INFORMASI BERITA --}}
                                <div class="ml-3">

                                    <a href="{{ route('admin.berita.show', Crypt::encrypt($item->id_berita)) }}"
                                        class="text-dark">

                                        <h5 class="font-weight-medium mb-1">

                                            {{ $item->judul }}

                                        </h5>

                                    </a>

                                    <p class="font-14 mb-1 text-muted">

                                        {{ Str::limit(strip_tags($item->isi), 90) }}

                                    </p>

                                    <span class="font-weight-light font-14 text-muted">

                                        <i data-feather="calendar"></i>

                                        {{ date('d M Y', strtotime($item->tanggal)) }}

                                        &nbsp;&nbsp;

                                        <i data-feather="user"></i>

                                        {{ $item->user->name ?? 'Admin' }}

                                    </span>

                                </div>

                            </div>

                        @empty

                            <div class="text-center py-5">

                                <span class="opacity-7 text-muted">

                                    <i data-feather="file-text"></i>

                                </span>

                                <p class="font-14 text-muted mt-2 mb-0">

                                    Belum ada berita.

                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection