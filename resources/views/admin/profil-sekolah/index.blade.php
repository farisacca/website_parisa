@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container-fluid">

    {{-- Header & Tombol Edit Profil --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="text-dark font-weight-bold mb-0">Profil Sekolah</h3>
            <p class="text-muted small mb-0">Informasi detail profil dan identitas SMA Negeri 24 Bandung</p>
        </div>
        <a href="{{ route('admin.profil-sekolah.edit') }}" class="btn btn-primary px-4 shadow-sm">
            <i class="fa fa-edit mr-2"></i> Edit Profil Sekolah
        </a>
    </div>

    <div class="row align-items-start">

        {{-- Card 1: Identitas Ringkas (Kiri) --}}
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title text-white mb-0 font-weight-bold">
                        <i class="fa fa-info-circle mr-2"></i> Identitas Sekolah
                    </h5>
                </div>

                {{-- Padding diperkecil sedikit (p-3) agar lebih padat dan rapi --}}
                <div class="card-body text-center p-3">
                    {{-- Logo --}}
                    @if ($profilSekolah && $profilSekolah->logo && file_exists(public_path('storage/' . $profilSekolah->logo)))
                        <img src="{{ asset('storage/' . $profilSekolah->logo) }}"
                             width="90" height="90" class="mb-2 img-fluid" style="object-fit: contain;">
                    @else
                        <div class="bg-light p-3 rounded-circle mb-2 d-inline-block shadow-sm">
                            <i class="fa fa-university fa-2x text-primary"></i>
                        </div>
                    @endif

                    <h5 class="font-weight-bold text-dark mb-1">
                        {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                    </h5>
                    <p class="text-muted small mb-2">
                        <i class="fa fa-user mr-1 text-secondary"></i> {{ $profilSekolah->kepala_sekolah ?? '-' }}
                    </p>

                    <hr class="my-2">

                    <div class="text-left small">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted"><i class="fa fa-hashtag mr-1 text-primary"></i> NPSN</span>
                            <strong class="text-dark">{{ $profilSekolah->npsn ?? '-' }}</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted"><i class="fa fa-calendar mr-1 text-primary"></i> Tahun Berdiri</span>
                            <strong class="text-dark">{{ $profilSekolah->tahun_berdiri ?? '-' }}</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted"><i class="fa fa-phone mr-1 text-primary"></i> Kontak</span>
                            <strong class="text-dark">{{ $profilSekolah->kontak ?? '-' }}</strong>
                        </div>

                        <hr class="my-2">

                        <div>
                            <span class="text-muted d-block mb-1">
                                <i class="fa fa-map-marker-alt mr-1 text-primary"></i> <strong>Alamat:</strong>
                            </span>
                            <span class="text-dark d-block pl-3" style="line-height: 1.4;">{{ $profilSekolah->alamat ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sisi Kanan: Visi Misi & Deskripsi --}}
        <div class="col-lg-7 mb-4">

            {{-- Card 2: Foto Gedung --}}
            @if($profilSekolah && $profilSekolah->foto && file_exists(public_path('storage/' . $profilSekolah->foto)))
            <div class="card shadow-sm border-0 rounded-3 mb-4 overflow-hidden">
                <img src="{{ asset('storage/' . $profilSekolah->foto) }}" class="w-100 object-fit-cover" style="max-height: 220px;" alt="Gedung Sekolah">
            </div>
            @endif

            {{-- Card 3: Visi & Misi --}}
            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="card-title text-dark mb-0 font-weight-bold">
                        <i class="fa fa-bullseye mr-2 text-primary"></i> Visi & Misi Sekolah
                    </h5>
                </div>
                <div class="card-body p-4">
                    @if($profilSekolah && $profilSekolah->visi_misi)
                        <div class="text-dark" style="white-space: pre-line; line-height: 1.7;">
                            {!! e($profilSekolah->visi_misi) !!}
                        </div>
                    @else
                        <p class="text-muted italic mb-0">Belum ada data Visi & Misi.</p>
                    @endif
                </div>
            </div>

            {{-- Card 4: Deskripsi Sekolah --}}
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="card-title text-dark mb-0 font-weight-bold">
                        <i class="fa fa-file-alt mr-2 text-primary"></i> Deskripsi Sekolah
                    </h5>
                </div>
                <div class="card-body p-4">
                    @if($profilSekolah && $profilSekolah->deskripsi)
                        <p class="text-dark mb-0" style="white-space: pre-line; line-height: 1.7;">
                            {{ $profilSekolah->deskripsi }}
                        </p>
                    @else
                        <p class="text-muted italic mb-0">Belum ada deskripsi profil sekolah.</p>
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
