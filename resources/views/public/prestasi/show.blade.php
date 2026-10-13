@extends('public.dashboard')

@section('title', ($prestasi->nama_prestasi ?? 'Detail Prestasi') . ' - SMA Negeri 24 Bandung')

@section('content')

<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Prestasi Siswa & Sekolah</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Rangkaian pencapaian dan kebanggaan yang berhasil diraih oleh siswa-siswi serta civitas akademika {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section class="py-5 bg-white">
    <div class="container" style="max-width: 850px;">

        @php
            $imgFile = $prestasi->foto ?? $prestasi->gambar ?? $prestasi->file ?? null;
            $imgUrl = $imgFile ? asset('storage/' . $imgFile) : null;
        @endphp

        @if($imgUrl)
            <div class="mb-4 text-center">
                <img src="{{ $imgUrl }}"
                     class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover"
                     style="max-height: 480px;"
                     alt="{{ $prestasi->nama_prestasi }}">
            </div>
        @endif

        <div class="d-flex flex-wrap gap-2 mb-2">
            @if(isset($prestasi->kategori))
                <span class="badge bg-dark px-3 py-2 rounded-pill" style="font-size: 0.78rem;">
                    {{ strtoupper($prestasi->kategori) }}
                </span>
            @endif
            @if(isset($prestasi->tingkat))
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill" style="font-size: 0.78rem;">
                    Tingkat {{ $prestasi->tingkat }}
                </span>
            @endif
            @if(isset($prestasi->tahun))
                <span class="badge bg-secondary px-3 py-2 rounded-pill" style="font-size: 0.78rem;">
                    Tahun {{ $prestasi->tahun }}
                </span>
            @endif
        </div>

        <h2 class="fw-bold text-dark mb-3" style="color: #0f172a !important; font-size: 2rem; line-height: 1.35;">
            {{ $prestasi->nama_prestasi }}
        </h2>

     
        <div class="text-muted mb-4 pb-3 border-bottom" style="font-size: 0.95rem;">
            <p class="mb-1">
                <strong>Peraih / Pemenang:</strong> 👤 {{ $prestasi->pemenang ?? '-' }}
            </p>
            @if(isset($prestasi->event))
                <p class="mb-0">
                    <strong>Nama Event / Penyelenggara:</strong> 📍 {{ $prestasi->event }}
                </p>
            @endif
        </div>

  
        <div class="article-content text-dark" style="font-size: 1.05rem; line-height: 1.85; color: #334155;">
            <h5 class="fw-bold text-dark mb-3" style="color: #0f172a !important;">Deskripsi & Keterangan:</h5>
            <p class="mb-0" style="white-space: pre-line;">
                {!! e($prestasi->deskripsi ?? 'Belum ada keterangan deskripsi lengkap untuk prestasi ini.') !!}
            </p>
        </div>

      
        <div class="mt-5 pt-3 border-top">
            <a href="{{ route('public.prestasi') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold">
                &larr; Kembali ke Daftar Prestasi
            </a>
        </div>

    </div>
</section>
@endsection