@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-12">
        <div class="card shadow-sm border-0">
            
            {{-- Header Card --}}
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="card-title text-white mb-0 font-weight-bold">
                    <i class="fa fa-newspaper-o mr-2"></i> Detail Berita
                </h5>
            </div>

            {{-- Isi Card --}}
            <div class="card-body p-4">

                {{-- Judul Berita --}}
                <h2 class="font-weight-bold text-dark mb-2">
                    {{ $berita->judul }}
                </h2>

                {{-- Slug --}}
                <p class="text-muted small mb-3">
                    <i class="fa fa-link mr-1"></i> Slug: <code>{{ $berita->slug }}</code>
                </p>

                {{-- Meta Information Bar --}}
                <div class="bg-light rounded p-3 mb-4 border">
                    <div class="row text-center text-md-left align-items-center">
                        <div class="col-md-4 mb-2 mb-md-0">
                            <span class="text-muted d-block small">Tanggal Terbit</span>
                            <strong class="text-dark">
                                <i class="fa fa-calendar text-info mr-1"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </strong>
                        </div>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <span class="text-muted d-block small">Penulis</span>
                            <strong class="text-dark">
                                <i class="fa fa-user text-info mr-1"></i>
                                {{ $berita->user->name ?? 'Admin' }}
                            </strong>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted d-block small mb-1">Status Publis</span>
                            @if (strtolower($berita->status) == 'publis' || strtolower($berita->status) == 'publish')
                                <span class="badge badge-success px-3 py-1">
                                    <i class="fa fa-check-circle mr-1"></i> Publis
                                </span>
                            @else
                                <span class="badge badge-warning px-3 py-1 text-white">
                                    <i class="fa fa-pencil-square-o mr-1"></i> Draf
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Gambar Utama --}}
                @if ($berita->gambar && file_exists(public_path('storage/' . $berita->gambar)))
                    <div class="text-center mb-4">
                        <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="img-fluid rounded shadow-sm border"
                                 style="max-height: 420px; width: 100%; object-fit: cover;">
                        </a>
                        <small class="text-muted d-block mt-1">Klik gambar untuk melihat ukuran penuh</small>
                    </div>
                @endif

                <hr class="my-4">

                {{-- Konten Berita --}}
                <div class="berita-content">
                    <h5 class="font-weight-bold text-dark mb-3">
                        <i class="fa fa-align-left text-info mr-2"></i> Isi Berita
                    </h5>
                    <div class="text-justify text-dark" style="line-height: 1.8; font-size: 1.05rem; white-space: pre-line;">
                        {{ $berita->isi }}
                    </div>
                </div>

            </div>

            {{-- Footer Card / Tombol Aksi --}}
            <div class="card-footer bg-light d-flex justify-content-between align-items-center py-3">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left mr-1"></i> Kembali ke Daftar
                </a>

                <div>
                    <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($berita->id_berita)) }}" class="btn btn-warning">
                        <i class="fa fa-pencil mr-1"></i> Edit Berita
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection