@extends('public.dashboard')

@section('title', 'Berita & Informasi - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2" style="font-size: 0.85rem;">
                <li class="breadcrumb-item"><a href="{{ route('public.index') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item text-white-50">Informasi</li>
                <li class="breadcrumb-item active text-white" aria-current="page">Berita Utama</li>
            </ol>
        </nav>

        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Berita & Pengumuman Sekolah</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Dapatkan berita terkini, artikel akademis, serta dokumentasi kegiatan resmi dari {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="berita" class="py-5" style="background-color: #f8fafc;">
    <div class="container">

        <!-- Cards Grid -->
        <div class="row g-4">
            @forelse($berita as $b)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden">
                        <div>
                            <!-- Gambar Berita -->
                            <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden;">
                                @if($b->gambar)
                                    <img src="{{ asset('storage/' . $b->gambar) }}"
                                        class="w-100 h-100 object-fit-cover"
                                        alt="{{ $b->judul }}">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary bg-opacity-10 text-muted fs-5 text-center p-3">
                                        {{ Str::limit($b->judul, 20) }}
                                    </div>
                                @endif
                            </div>

                            <!-- Detail Content -->
                            <div class="p-4 pb-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge rounded-pill text-white px-3 py-2" style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.5px;">
                                        BERITA
                                    </span>
                                    <span class="text-muted small" style="font-size: 0.8rem;">
                                        {{ $b->tanggal ? \Carbon\Carbon::parse($b->tanggal)->format('d M Y') : $b->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <!-- Judul Berita -->
                                <h5 class="fw-bold text-dark mb-2" style="font-size: 1.05rem; line-height: 1.4;">
                                    {{ $b->judul }}
                                </h5>

                                <!-- Isi Berita -->
                                <p class="text-muted small mb-0" style="line-height: 1.6; font-size: 0.85rem;">
                                    {{ Str::limit(strip_tags($b->isi), 110) }}
                                </p>
                            </div>
                        </div>

                        <!-- Link Baca Selengkapnya (Buka Modal Detail) -->
                        <div class="p-4 pt-0 text-end">
                            <button type="button" class="btn btn-link p-0 fw-bold text-dark text-decoration-none small" data-bs-toggle="modal" data-bs-target="#modalBerita{{ $b->id }}">
                                Baca Selengkapnya &rarr;
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Detail Berita -->
                <div class="modal fade" id="modalBerita{{ $b->id }}" tabindex="-1" aria-labelledby="modalBeritaLabel{{ $b->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded-4 border-0">
                            <div class="modal-header border-0 pb-0">
                                <span class="badge rounded-pill text-white px-3 py-2" style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700;">
                                    BERITA
                                </span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                @if($b->gambar)
                                    <img src="{{ asset('storage/' . $b->gambar) }}" class="w-100 rounded-3 mb-3 object-fit-cover" style="max-height: 350px;" alt="{{ $b->judul }}">
                                @endif
                                <p class="text-muted small mb-2">
                                    📅 {{ $b->tanggal ? \Carbon\Carbon::parse($b->tanggal)->format('d M Y') : $b->created_at->format('d M Y') }}
                                </p>
                                <h4 class="fw-bold text-dark mb-3">{{ $b->judul }}</h4>
                                <div class="text-secondary" style="line-height: 1.7; font-size: 0.95rem;">
                                    {!! nl2br(e($b->isi)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4 text-muted">
                    <p class="mb-0">Belum ada berita terbaru.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($berita, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $berita->links() }}
            </div>
        @endif

    </div>
</section>
@endsection
