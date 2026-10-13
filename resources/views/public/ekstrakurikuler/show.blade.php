@extends('public.dashboard')

@section('title', ($eskul->nama_eskul ?? 'Detail Ekstrakurikuler') . ' - SMA Negeri 24 Bandung')

@section('content')

<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Ekstrakurikuler Sekolah</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Wadah pengembangan bakat, minat, dan potensi diri siswa {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }} di bidang akademik maupun non-akademik.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-md-5 mb-4">
                    <div class="mb-4">
                        @php
                            $fotoEskul = $eskul->foto ?? $eskul->gambar ?? $eskul->image ?? null;
                        @endphp

                        @if($fotoEskul)
                            <img src="{{ asset('storage/' . $fotoEskul) }}"
                                 alt="{{ $eskul->nama_eskul }}"
                                 class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover"
                                 style="max-height: 450px;">
                        @else
                            <div class="w-100 rounded-4 d-flex align-items-center justify-content-center bg-light text-muted border shadow-sm" style="height: 350px;">
                                <span>Tidak ada foto</span>
                            </div>
                        @endif
                    </div>

                    <h2 class="fw-bold text-dark mb-2" style="color: #0f172a !important; font-size: 2rem;">
                        {{ $eskul->nama_eskul }}
                    </h2>

                   
                    <div class="text-muted mb-4 pb-3 border-bottom" style="font-size: 0.95rem;">
                        <p class="mb-1">
                            <strong>Guru Pembina:</strong> {{ optional($eskul->guru)->nama_guru ?? optional($eskul->guru)->nama ?? $eskul->guru_pembina ?? $eskul->pembina ?? '-' }}
                        </p>
                        <p class="mb-0">
                            <strong>Jadwal Latihan:</strong> {{ $eskul->jadwal_latihan ?? $eskul->jadwal ?? '-' }}
                        </p>
                    </div>

                   
                    <div class="text-secondary lh-lg" style="font-size: 1rem; text-align: justify;">
                        <p class="mb-0" style="white-space: pre-line;">
                            {!! e($eskul->deskripsi ?? 'Belum ada deskripsi untuk ekstrakurikuler ini.') !!}
                        </p>
                    </div>

                </div>

               
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 px-2">
                    <a href="{{ route('public.ekstrakurikuler') }}" 
                       class="btn rounded-pill px-4 py-2 fw-semibold text-decoration-none shadow-sm"
                       style="background-color: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; font-size: 0.9rem;">
                        &larr; Kembali ke Daftar Ekstrakurikuler
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection