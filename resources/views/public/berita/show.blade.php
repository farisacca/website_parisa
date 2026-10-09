@extends('public.dashboard')

@section('title', $berita->judul . ' - SMA Negeri 24 Bandung')

@section('content')
@php
    $tanggal = $berita->tanggal
        ? \Carbon\Carbon::parse($berita->tanggal)->format('d M Y')
        : ($berita->created_at ? $berita->created_at->format('d M Y') : '-');
    $imgUrl = $berita->gambar ? asset('storage/' . $berita->gambar) : null;
@endphp

<!-- Header Banner Detail Berita -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <!-- Tanggal -->
        <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-semibold small">
            <span> {{ $tanggal }}</span>
        </div>

        <!-- Judul Berita -->
        <h1 class="fw-bold mb-3 text-white" style="font-size: 2.2rem; line-height: 1.3;">
            {{ $berita->judul }}
        </h1>

        <!-- Publisher -->
        <div class="d-flex align-items-center gap-2">
            <span class="text-white-50 small">Dipublikasikan oleh:</span>
            <span class="badge rounded-pill bg-warning text-dark px-3 py-1 fw-bold" style="font-size: 0.78rem;">
                {{ $berita->user->name ?? 'Super Administrator' }}
            </span>
        </div>
    </div>
</div>

<!-- Main Content Area (Tanpa Wrapper Card) -->
<section class="py-5 bg-white">
    <div class="container" style="max-width: 850px;">

        <!-- Gambar Utama Berita -->
        @if($imgUrl)
            <div class="mb-4 text-center">
                <img src="{{ $imgUrl }}"
                     class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover"
                     style="max-height: 480px;"
                     alt="{{ $berita->judul }}">
            </div>
        @endif

        <!-- Isi Konten Berita -->
        <div class="article-content text-dark" style="font-size: 1.05rem; line-height: 1.85; color: #334155;">
            {!! nl2br(e($berita->isi)) !!}
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-5 pt-3 border-top">
            <a href="{{ route('public.berita') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold">
                &larr; Kembali ke Daftar Berita
            </a>
        </div>

    </div>
</section>
@endsection
