@extends('public.dashboard')

@section('title', 'Ekstrakurikuler - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">


        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Ekstrakurikuler Sekolah</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Wadah pengembangan bakat, minat, dan potensi diri siswa {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }} di bidang akademik maupun non-akademik.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="ekstrakurikuler" class="py-5" style="background-color: #f8fafc;">
    <div class="container">

        <!-- Cards Grid Eskul -->
        <div class="row g-4">
            @forelse(collect($ekstrakurikuler ?? $eskul ?? []) as $eskul)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden">
                        <div>
                            <!-- Foto Full Atas -->
                            <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden;">
                                @if(isset($eskul->gambar) && $eskul->gambar)
                                    <img src="{{ asset('storage/' . $eskul->gambar) }}"
                                        class="w-100 h-100 object-fit-cover"
                                        alt="{{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler }}">
                                @elseif(isset($eskul->foto) && $eskul->foto)
                                    <img src="{{ asset('storage/' . $eskul->foto) }}"
                                        class="w-100 h-100 object-fit-cover"
                                        alt="{{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler }}">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary bg-opacity-10 text-muted fs-5 fw-bold text-center p-3">
                                        {{ Str::limit($eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler ?? $eskul->nama ?? 'ESKUL', 20) }}
                                    </div>
                                @endif
                            </div>

                            <!-- Detail Content -->
                            <div class="p-4 pb-2">
                                <!-- Nama Eskul -->
                                <h5 class="fw-bold text-dark mb-2" style="color: #1e293b; font-size: 1.15rem; line-height: 1.4;">
                                    {{ $eskul->nama_eskul ?? $eskul->nama_ekstrakurikuler ?? $eskul->nama }}
                                </h5>

                                <!-- Jadwal Latihan -->
                                @php
                                    $jadwal = $eskul->jadwal_latihan ?? $eskul->jadwal;
                                @endphp
                                @if($jadwal)
                                    <div class="d-flex align-items-center text-muted small mb-2" style="font-size: 0.85rem; font-weight: 500;">
                                        <span class="me-2">🕒</span>
                                        <span>{{ $jadwal }}</span>
                                    </div>
                                @endif

                                <!-- Deskripsi Singkat -->
                                <p class="text-muted small mb-0" style="line-height: 1.6; font-size: 0.85rem;">
                                    {{ Str::limit(strip_tags($eskul->deskripsi ?? ''), 110) }}
                                </p>
                            </div>
                        </div>

                        <!-- Footer Card (Garis Pemisah, Pembina & Status) -->
                        <div class="p-4 pt-0">
                            <hr class="my-3" style="border-color: #f1f5f9; opacity: 1;">
                            <div class="d-flex justify-content-between align-items-center" style="font-size: 0.85rem;">
                                <div class="text-muted">
                                    Pembina: <strong class="text-dark">{{ $eskul->guru->nama_guru ?? $eskul->pembina ?? '-' }}</strong>
                                </div>
                                <span class="badge bg-light text-secondary border px-2.5 py-1 rounded" style="font-size: 0.72rem; font-weight: 600;">
                                    {{ $eskul->status ?? 'Aktif' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <p class="mb-0">Belum ada data ekstrakurikuler yang terdaftar.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination (Otomatis tampil jika Controller menggunakan ->paginate()) -->
        @if(method_exists($ekstrakurikuler ?? $eskul ?? [], 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ ($ekstrakurikuler ?? $eskul)->links() }}
            </div>
        @endif

    </div>
</section>
@endsection
