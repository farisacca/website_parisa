@extends('public.dashboard')

@section('title', ($eskul->nama_eskul ?? 'Detail Ekstrakurikuler') . ' - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <span class="badge rounded-pill bg-warning text-dark px-3 py-1.5 fw-semibold text-uppercase mb-2" style="font-size: 0.75rem;">
            Detail Ekstrakurikuler
        </span>
        <h1 class="fw-bold mb-1" style="font-size: 2.2rem;">
            {{ $eskul->nama_eskul }}
        </h1>
        <p class="text-white-50 mb-0" style="font-size: 0.95rem;">
            Kegiatan Ekstrakurikuler {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
        </p>
    </div>
</div>

<!-- Main Content Area -->
<div class="py-5" style="background-color: #f8fafc;">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="row g-0">

                        <!-- Kolom Gambar / Dokumentasi -->
                        <div class="col-md-5 bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                            @if(isset($eskul->gambar) && $eskul->gambar)
                                <img src="{{ asset('storage/' . $eskul->gambar) }}"
                                     class="w-100 h-100 object-fit-cover"
                                     style="min-height: 320px; max-height: 400px;"
                                     alt="{{ $eskul->nama_eskul }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning display-1 py-5">
                                    🎯
                                </div>
                            @endif
                        </div>

                        <!-- Kolom Informasi Detail -->
                        <div class="col-md-7 d-flex flex-column justify-content-between p-4 p-md-5">
                            <div>
                                <h3 class="fw-bold text-dark mb-3">
                                    {{ $eskul->nama_eskul }}
                                </h3>

                                <!-- Guru Pembina -->
                                @if(isset($eskul->guru))
                                <div class="mb-3">
                                    <span class="text-muted small d-block mb-1">Guru Pembina:</span>
                                    <div class="d-inline-block rounded-pill border border-warning px-3 py-1.5"
                                        style="background-color: #fffdf5; border-color: #fde047 !important;">
                                        <span class="fw-semibold text-dark" style="color: #854d0e !important; font-size: 0.85rem;">
                                            {{ $eskul->guru->nama_guru ?? $eskul->guru->nama }}
                                        </span>
                                    </div>
                                </div>
                                @endif

                                <!-- Jadwal Latihan -->
                                @if(isset($eskul->jadwal_latihan))
                                <div class="mb-3">
                                    <span class="text-muted small d-block mb-1">Jadwal Latihan:</span>
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill">
                                        {{ $eskul->jadwal_latihan }}
                                    </span>
                                </div>
                                @endif

                                <!-- Deskripsi -->
                                @if(isset($eskul->deskripsi))
                                <div class="mb-3">
                                    <span class="text-muted small d-block mb-1">Tentang Ekstrakurikuler:</span>
                                    <p class="text-dark small" style="line-height: 1.6;">
                                        {!! nl2br(e($eskul->deskripsi)) !!}
                                    </p>
                                </div>
                                @endif
                            </div>

                            <!-- Tombol Kembali -->
                            <div class="mt-4 pt-3 border-top">
                                <a href="{{ route('public.ekstrakurikuler') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                                    &larr; Kembali ke Daftar Ekstrakurikuler
                                </a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
