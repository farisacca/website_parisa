@extends('layouts.app')

@section('title', 'Detail Prestasi')

@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-12">
        <div class="card shadow-sm border-0">
            
            {{-- Header Card --}}
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="card-title text-white mb-0 font-weight-bold">
                    <i class="fa fa-trophy mr-2"></i> Detail Prestasi
                </h5>
            </div>

            {{-- Isi Card --}}
            <div class="card-body p-4">

                {{-- Icon & Nama Prestasi --}}
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-info text-white rounded-circle mb-3 shadow-sm"
                         style="width: 80px; height: 80px;">
                        <i class="fa fa-trophy fa-3x"></i>
                    </div>
                    <h2 class="font-weight-bold text-dark mb-1">
                        {{ $prestasi->nama_prestasi }}
                    </h2>
                </div>

                {{-- Meta Information Bar (Sejajar ke Bawah) --}}
                <div class="bg-light rounded p-3 mb-4 border">
                    <div class="mb-3">
                        <span class="text-muted d-block small">Pemenang / Raihan</span>
                        <strong class="text-dark d-block mt-1">
                            <i class="fa fa-user text-info mr-1"></i>
                            {{ $prestasi->pemenang }}
                        </strong>
                    </div>

                    <hr class="my-2">

                    <div class="mb-3">
                        <span class="text-muted d-block small">Event / Kejuaraan</span>
                        <strong class="text-dark d-block mt-1">
                            <i class="fa fa-star text-info mr-1"></i>
                            {{ $prestasi->event }}
                        </strong>
                    </div>

                    <hr class="my-2">

                    <div class="mb-3">
                        <span class="text-muted d-block small">Tahun</span>
                        <strong class="text-dark d-block mt-1">
                            <i class="fa fa-calendar text-info mr-1"></i>
                            {{ $prestasi->tahun }}
                        </strong>
                    </div>

                    <hr class="my-2">

                    <div class="mb-3">
                        <span class="text-muted d-block small mb-1">Tingkat</span>
                        <span class="badge badge-info px-3 py-1">
                            {{ $prestasi->tingkat }}
                        </span>
                    </div>

                    <hr class="my-2">

                    <div>
                        <span class="text-muted d-block small mb-1">Kategori</span>
                        <span class="badge badge-success px-3 py-1">
                            {{ $prestasi->kategori }}
                        </span>
                    </div>
                </div>

                <hr class="my-4">

                {{-- Deskripsi Prestasi --}}
                <div class="prestasi-content">
                    <h5 class="font-weight-bold text-dark mb-3">
                        <i class="fa fa-align-left text-info mr-2"></i> Deskripsi Prestasi
                    </h5>
                    <div class="text-justify text-dark" style="line-height: 1.8; font-size: 1.05rem; white-space: pre-line;">
                        {{ $prestasi->deskripsi ?? 'Tidak ada deskripsi.' }}
                    </div>
                </div>

            </div>

            {{-- Footer Card --}}
            <div class="card-footer bg-light d-flex justify-content-between align-items-center py-3">
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left mr-1"></i> Kembali ke Daftar
                </a>

                <div>
                    <a href="{{ route('admin.prestasi.addEdit', Crypt::encrypt($prestasi->id_prestasi)) }}" class="btn btn-warning">
                        <i class="fa fa-pencil mr-1"></i> Edit Prestasi
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection