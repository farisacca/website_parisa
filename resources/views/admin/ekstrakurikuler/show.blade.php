@extends('layouts.app')

@section('title', 'Detail Ekstrakurikuler')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            {{-- Header Card --}}
            <div class="card-header bg-info text-white">
                <h4 class="card-title text-white mb-0">
                    <i class="fa fa-users mr-2"></i> Detail Ekstrakurikuler
                </h4>
            </div>

            {{-- Isi Card --}}
            <div class="card-body">

                {{-- Nama Ekstrakurikuler (Judul Utama) --}}
                <h3 class="font-weight-bold mb-3">
                    {{ $ekstrakurikuler->nama_eskul }}
                </h3>

                {{-- Informasi Meta --}}
                <div class="border-bottom pb-3 mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <small class="text-muted d-block">Guru Pembina</small>
                            <span>
                                <i class="fa fa-user mr-1 text-info"></i>
                                {{ $ekstrakurikuler->guru->nama_guru ?? '-' }}
                            </span>
                        </div>

                        <div class="col-md-6 mb-2">
                            <small class="text-muted d-block">Jadwal Latihan</small>
                            <span>
                                <i class="fa fa-calendar mr-1 text-info"></i>
                                {{ $ekstrakurikuler->jadwal_latihan ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Gambar (Posisi di Tengah Seperti Berita) --}}
                @if ($ekstrakurikuler->gambar)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                             alt="{{ $ekstrakurikuler->nama_eskul }}"
                             class="img-fluid rounded"
                             style="max-height: 400px; width: 100%; object-fit: cover;">
                    </div>
                @endif

                {{-- Deskripsi Ekstrakurikuler --}}
                <div>
                    <div class="mb-2 text-muted">Deskripsi Ekstrakurikuler</div>
                    <div style="white-space: pre-line; line-height: 1.8;">
                        {{ $ekstrakurikuler->deskripsi ?: '-' }}
                    </div>
                </div>

            </div>

            {{-- Footer Card (Hanya 1 Tombol Kembali) --}}
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left mr-1"></i> Kembali
                </a>

                <a href="{{ route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($ekstrakurikuler->id_eskul)) }}" class="btn btn-warning">
                    <i class="fa fa-pencil mr-1"></i> Edit Ekstrakurikuler
                </a>
            </div>

        </div>
    </div>
</div>
@endsection