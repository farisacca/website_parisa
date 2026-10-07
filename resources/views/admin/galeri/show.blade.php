@extends('layouts.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-12">
        <div class="card shadow-sm border-0">
            
            {{-- Header Card --}}
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="card-title text-white mb-0 font-weight-bold">
                    <i class="fa fa-picture-o mr-2"></i> Detail Dokumentasi Galeri
                </h5>
            </div>

            {{-- Isi Card --}}
            <div class="card-body p-4">

                {{-- Judul Galeri --}}
                <h2 class="font-weight-bold text-dark mb-3">
                    {{ $galeri->judul }}
                </h2>

                {{-- Meta Information Bar --}}
                <div class="bg-light rounded p-3 mb-4 border">
                    <div class="row text-center text-md-left align-items-center">
                        <div class="col-md-4 mb-2 mb-md-0">
                            <span class="text-muted d-block small">Kategori Media</span>
                            @if ($galeri->kategori == 'Foto')
                                <span class="badge badge-success px-3 py-1">
                                    <i class="fa fa-camera mr-1"></i> Foto
                                </span>
                            @else
                                <span class="badge badge-danger px-3 py-1">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-2 mb-md-0">
                            <span class="text-muted d-block small">Tanggal Dokumentasi</span>
                            <strong class="text-dark">
                                <i class="fa fa-calendar text-info mr-1"></i>
                                {{ date('d F Y', strtotime($galeri->tanggal)) }}
                            </strong>
                        </div>

                        <div class="col-md-4">
                            <span class="text-muted d-block small">Nama File</span>
                            <code>{{ $galeri->file }}</code>
                        </div>
                    </div>
                </div>

                {{-- Media Utama (Foto / Video) --}}
                <div class="text-center mb-4">
                    @if ($galeri->kategori == 'Video' && $galeri->file && file_exists(public_path('storage/' . $galeri->file)))
                        <video controls class="rounded border shadow-sm w-100" style="max-height: 450px;">
                            <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                            Browser Anda tidak mendukung video HTML5.
                        </video>
                    @elseif ($galeri->file && file_exists(public_path('storage/' . $galeri->file)))
                        <a href="{{ asset('storage/' . $galeri->file) }}" target="_blank">
                            <img src="{{ asset('storage/' . $galeri->file) }}"
                                 alt="{{ $galeri->judul }}"
                                 class="img-fluid rounded shadow-sm border"
                                 style="max-height: 450px; width: 100%; object-fit: cover;">
                        </a>
                        <small class="text-muted d-block mt-1">Klik gambar untuk melihat ukuran penuh</small>
                    @else
                        <div class="p-5 bg-light rounded text-muted border">
                            <i class="fa fa-file-o fa-3x d-block mb-3"></i>
                            File media tidak ditemukan.
                        </div>
                    @endif
                </div>

                <hr class="my-4">

                {{-- Keterangan --}}
                <div class="galeri-content">
                    <h5 class="font-weight-bold text-dark mb-3">
                        <i class="fa fa-align-left text-info mr-2"></i> Keterangan
                    </h5>
                    <div class="text-justify text-dark" style="line-height: 1.8; font-size: 1.05rem; white-space: pre-line;">
                        {{ $galeri->keterangan ?? 'Tidak ada keterangan.' }}
                    </div>
                </div>

            </div>

            {{-- Footer Card --}}
            <div class="card-footer bg-light d-flex justify-content-between align-items-center py-3">
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left mr-1"></i> Kembali ke Daftar
                </a>

                <div>
                    <a href="{{ route('admin.galeri.addEdit', Crypt::encrypt($galeri->id_galeri)) }}" class="btn btn-warning">
                        <i class="fa fa-pencil mr-1"></i> Edit Galeri
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection