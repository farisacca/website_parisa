@extends('public.dashboard')

@section('title', ($g->nama_guru ?? $g->nama) . ' - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">

        <h1 class="fw-bold mb-1" style="font-size: 2.2rem;">{{ $g->nama_guru ?? $g->nama }}</h1>
        <p class="text-white-50 mb-0" style="font-size: 0.95rem;">
            Tenaga Pengajar {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
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

                        <!-- Kolom Foto Guru -->
                        <div class="col-md-5 bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                            @if(isset($g->foto) && $g->foto)
                                <img src="{{ asset('storage/' . $g->foto) }}"
                                     class="w-100 h-100 object-fit-cover"
                                     style="min-height: 320px; max-height: 400px;"
                                     alt="{{ $g->nama_guru ?? $g->nama }}">
                            @elseif(isset($g->gambar) && $g->gambar)
                                <img src="{{ asset('storage/' . $g->gambar) }}"
                                     class="w-100 h-100 object-fit-cover"
                                     style="min-height: 320px; max-height: 400px;"
                                     alt="{{ $g->nama_guru ?? $g->nama }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted fw-bold display-1 py-5">
                                    {{ Str::limit($g->nama_guru ?? $g->nama ?? 'G', 2, '') }}
                                </div>
                            @endif
                        </div>

                        <!-- Kolom Informasi Detail -->
                        <div class="col-md-7 d-flex flex-column justify-content-between p-4 p-md-5">
                            <div>
                                <h3 class="fw-bold text-dark mb-1">{{ $g->nama_guru ?? $g->nama }}</h3>

                                <!-- Tambahan NIP Guru -->
                                <p class="text-muted mb-3" style="font-size: 0.85rem; letter-spacing: 0.3px;">
                                    NIP: <span class="fw-semibold text-secondary">{{ $g->nip ?? '-' }}</span>
                                </p>

                                <div class="mb-4">
                                    <span class="text-muted small d-block mb-1">Mata Pelajaran / Bidang Pengampu:</span>
                                    <div class="d-inline-block rounded-pill border border-warning px-3 py-1.5"
                                        style="background-color: #fffdf5; border-color: #fde047 !important;">
                                        <span class="fw-semibold text-dark" style="color: #854d0e !important; font-size: 0.85rem;">
                                            {{ $g->mapel->nama_mapel ?? $g->nama_mapel ?? $g->mapel ?? 'Mata Pelajaran Umum' }}
                                        </span>
                                    </div>
                                </div>

                                @if(isset($g->biografi) || isset($g->deskripsi))
                                <div class="mb-3">
                                    <span class="text-muted small d-block mb-1">Tentang Pengajar:</span>
                                    <p class="text-dark small" style="line-height: 1.6;">
                                        {{ $g->biografi ?? $g->deskripsi }}
                                    </p>
                                </div>
                                @endif
                            </div>

                            <!-- Tombol Kembali -->
                            <div class="mt-4 pt-3 border-top">
                                <a href="{{ route('public.guru') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                                    &larr; Kembali ke Daftar Guru
                                </a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
.transition-hover {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;
}
</style>
@endsection
