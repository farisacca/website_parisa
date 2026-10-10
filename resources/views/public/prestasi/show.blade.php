@extends('public.dashboard')

@section('title', ($prestasi->nama_prestasi ?? 'Detail Prestasi') . ' - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <span class="badge rounded-pill bg-warning text-dark px-3 py-1.5 fw-semibold text-uppercase mb-2" style="font-size: 0.75rem;">
            Detail Prestasi Sekolah
        </span>
        <h1 class="fw-bold mb-1" style="font-size: 2.2rem;">{{ $prestasi->nama_prestasi }}</h1>
        <p class="text-white-50 mb-0" style="font-size: 0.95rem;">
            Pencapaian & Kejuaraan {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">

                    <!-- Foto / Dokumentasi Prestasi -->
                    @php
                        $imgFile = $prestasi->foto ?? $prestasi->gambar ?? $prestasi->file ?? null;
                        $imgUrl = $imgFile ? asset('storage/' . $imgFile) : null;
                    @endphp

                    @if($imgUrl)
                        <div class="bg-light text-center">
                            <img src="{{ $imgUrl }}"
                                 class="w-100 object-fit-cover"
                                 style="max-height: 420px;"
                                 alt="{{ $prestasi->nama_prestasi }}">
                        </div>
                    @else
                        <div class="w-100 bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center" style="height: 250px; font-size: 4rem;">
                            🏆
                        </div>
                    @endif

                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge bg-dark px-3 py-2 rounded-pill">{{ strtoupper($prestasi->kategori ?? 'Prestasi') }}</span>
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Tingkat {{ $prestasi->tingkat }}</span>
                            <span class="badge bg-secondary px-3 py-2 rounded-pill">Tahun {{ $prestasi->tahun }}</span>
                        </div>

                        <h3 class="fw-bold text-dark mb-3">{{ $prestasi->nama_prestasi }}</h3>

                        <div class="mb-4 p-3 rounded-3 bg-light border">
                            <span class="text-muted small d-block mb-1">Peraih / Pemenang:</span>
                            <h5 class="fw-bold text-dark mb-0">👤 {{ $prestasi->pemenang }}</h5>
                        </div>

                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1">Nama Event / Penyelenggara:</span>
                            <p class="text-dark fw-semibold mb-0">📍 {{ $prestasi->event }}</p>
                        </div>

                        <hr class="my-4">

                        <div class="content-text text-secondary" style="line-height: 1.8;">
                            <span class="text-muted small d-block mb-2">Deskripsi / Keterangan:</span>
                            {!! nl2br(e($prestasi->deskripsi ?? 'Belum ada keterangan deskripsi lengkap untuk prestasi ini.')) !!}
                        </div>

                        <div class="mt-5 pt-3 border-top">
                            <a href="{{ route('public.prestasi') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                &larr; Kembali ke Daftar Prestasi
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
