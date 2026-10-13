@extends('public.dashboard')

@section('title', ($g->nama_guru ?? $g->nama) . ' - SMA Negeri 24 Bandung')

@section('content')

<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Profil Tenaga Pengajar</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Mengenal lebih dekat para guru dan tenaga pendidik {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section class="py-5 bg-white">
    <div class="container" style="max-width: 850px;">

        @php
            $imgFile = $g->foto ?? $g->gambar ?? null;
            $imgUrl = $imgFile ? asset('storage/' . $imgFile) : null;
        @endphp

        <div class="mb-4 text-center">
            @if($imgUrl)
                <img src="{{ $imgUrl }}"
                     class="img-fluid rounded-4 shadow-sm object-fit-cover"
                     style="max-height: 480px; width: 100%; max-width: 500px;"
                     alt="{{ $g->nama_guru ?? $g->nama }}">
            @else
                <div class="rounded-4 bg-light d-flex align-items-center justify-content-center mx-auto text-muted fw-bold display-1 shadow-sm"
                     style="height: 350px; max-width: 500px;">
                    {{ Str::limit($g->nama_guru ?? $g->nama ?? 'G', 2, '') }}
                </div>
            @endif
        </div>

    
        <h2 class="fw-bold text-dark mb-2 text-center text-md-start" style="color: #0f172a !important; font-size: 2rem; line-height: 1.35;">
            {{ $g->nama_guru ?? $g->nama }}
        </h2>

        
        <div class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.7;">
            <p class="mb-1">
                <strong>Mata Pelajaran / Pengampu:</strong> 
                <span class="text-dark fw-semibold">
                    {{ $g->mapel->nama_mapel ?? $g->nama_mapel ?? $g->mapel ?? 'Mata Pelajaran Umum' }}
                </span>
            </p>
            <p class="mb-0">
                <strong>NIP:</strong> {{ $g->nip ?? '-' }}
            </p>
        </div>

    
        @if(isset($g->biografi) && $g->biografi || isset($g->deskripsi) && $g->deskripsi)
            <div class="article-content text-dark mb-4" style="font-size: 1.05rem; line-height: 1.85; color: #334155;">
                <h5 class="fw-bold text-dark mb-3" style="color: #0f172a !important;">Tentang Pengajar:</h5>
                <p class="mb-0" style="white-space: pre-line;">
                    {!! e($g->biografi ?? $g->deskripsi) !!}
                </p>
            </div>
        @endif

        <div class="mt-4 pt-4 border-top">
            <a href="{{ route('public.guru') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold">
                &larr; Kembali ke Daftar Guru
            </a>
        </div>

    </div>
</section>
@endsection