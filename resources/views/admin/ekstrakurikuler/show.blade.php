@extends('layouts.app')

@section('title', 'Detail Ekstrakurikuler')

@section('content')

<div class="card">
    <div class="card-body">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="card-title fw-semibold mb-1">
                    Detail Ekstrakurikuler
                </h5>

                <p class="card-subtitle text-muted mb-0">
                    Informasi lengkap ekstrakurikuler
                </p>
            </div>

            <a href="{{ route('admin.ekstrakurikuler.index') }}"
               class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i>
                Kembali
            </a>
        </div>

        <div class="row">

            {{-- Gambar --}}
            <div class="col-md-4 text-center mb-4">

                @if ($ekstrakurikuler->gambar)

                    <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                         alt="{{ $ekstrakurikuler->nama_eskul }}"
                         class="img-fluid rounded border"
                         style="max-height: 300px; object-fit: cover;">

                @else

                    <div class="border rounded p-5 text-muted">
                        <i class="fa fa-image fa-3x mb-3"></i>

                        <p class="mb-0">
                            Tidak ada gambar
                        </p>
                    </div>

                @endif

            </div>

            {{-- Data --}}
            <div class="col-md-8">

                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        Nama Ekstrakurikuler
                    </label>

                    <h4 class="mb-0">
                        {{ $ekstrakurikuler->nama_eskul }}
                    </h4>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        Guru Pembina
                    </label>

                    <p class="mb-0">
                        {{ $ekstrakurikuler->guru->nama_guru ?? '-' }}
                    </p>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        Jadwal Latihan
                    </label>

                    <p class="mb-0">
                        {{ $ekstrakurikuler->jadwal_latihan }}
                    </p>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        Deskripsi
                    </label>

                    <p class="mb-0">
                        {{ $ekstrakurikuler->deskripsi ?: '-' }}
                    </p>
                </div>

            </div>

        </div>

        {{-- Button Edit --}}
        <div class="mt-3 pt-3 border-top">

            <a href="{{ route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($ekstrakurikuler->id_eskul)) }}"
               class="btn btn-warning">

                <i class="fa fa-edit me-1"></i>
                Edit Ekstrakurikuler

            </a>

        </div>

    </div>
</div>

@endsection