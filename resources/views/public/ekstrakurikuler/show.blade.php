@extends('public.dashboard')

@section('title', ($eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler ?? 'Detail') . ' - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <h1 class="fw-bold mb-0" style="font-size: 2.2rem;">
            {{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler ?? 'Detail Ekstrakurikuler' }}
        </h1>
    </div>
</div>

<!-- Main Content Area -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-5">
            <!-- Content Kiri: Gambar & Deskripsi Lengkap -->
            <div class="col-lg-8">
                <!-- Gambar Utama -->
                <div class="rounded-4 overflow-hidden mb-4 bg-light" style="max-height: 420px;">
                    @if(isset($eskul->gambar) && $eskul->gambar)
                        <img src="{{ asset('storage/' . $eskul->gambar) }}" class="w-100 h-100 object-fit-cover" alt="{{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler }}">
                    @elseif(isset($eskul->foto) && $eskul->foto)
                        <img src="{{ asset('storage/' . $eskul->foto) }}" class="w-100 h-100 object-fit-cover" alt="{{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler }}">
                    @else
                        <div class="p-5 text-center text-muted">Foto Ekstrakurikuler</div>
                    @endif
                </div>

                <h3 class="fw-bold text-dark mb-3">Tentang Ekstrakurikuler</h3>
                <div class="text-secondary" style="line-height: 1.8; font-size: 0.98rem; white-space: pre-line;">
                    {!! e($eskul->deskripsi ?? 'Belum ada deskripsi lengkap mengenai ekstrakurikuler ini.') !!}
                </div>
            </div>

            <!-- Sidebar Kanan: Metadata (Jam, Pembina, Status) -->
            <div class="col-lg-4">
                <div class="p-4 rounded-4 bg-light border">
                    <h5 class="fw-bold text-dark mb-3">Informasi Kegiatan</h5>
                    <hr class="my-3" style="border-color: #cbd5e1;">

                    <ul class="list-unstyled mb-0" style="font-size: 0.92rem; line-height: 2;">
                        <li class="mb-2">
                            <span class="text-muted d-block small">🕒 Jadwal Latihan:</span>
                            <strong class="text-dark">{{ $eskul->jadwal_latihan ?? $eskul->jadwal ?? 'Belum diatur' }}</strong>
                        </li>
                        <li class="mb-2">
                            <span class="text-muted d-block small">👨‍🏫 Pembina / Penanggung Jawab:</span>
                            <strong class="text-dark">{{ $eskul->guru->nama_guru ?? $eskul->pembina ?? '-' }}</strong>
                        </li>
                        <li class="mb-2">
                            <span class="text-muted d-block small">📌 Status Kegiatan:</span>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success px-2.5 py-1 rounded">
                                {{ $eskul->status ?? 'Aktif' }}
                            </span>
                        </li>
                    </ul>

                    <div class="mt-4 pt-2">
                        <a href="{{ route('public.ekstrakurikuler') }}" class="btn btn-outline-secondary w-100 rounded-pill btn-sm fw-semibold">
                            &larr; Kembali ke Daftar Eskul
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection