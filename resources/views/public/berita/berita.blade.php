@extends('public.dashboard')

@section('title', 'Berita & Pengumuman - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">

        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Berita & Informasi Sekolah</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Dapatkan berita terkini, artikel akademis, serta dokumentasi kegiatan resmi dari {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="berita-list" class="py-5" style="background-color: #f8fafc;">
    <div class="container">

        <!-- Grid Cards Berita -->
        <div class="row g-4">
            @forelse($berita as $item)
                @php
                    $imgUrl = $item->gambar ? asset('storage/' . $item->gambar) : 'https://picsum.photos/600/400';
                    $tanggal = $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : ($item->created_at ? $item->created_at->format('d M Y') : '-');
                @endphp

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-white h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div>
                            <!-- Sampul Gambar Berita (Bisa Diklik Langsung ke Halaman Detail) -->
                            <a href="{{ route('public.berita.show', $item->slug) }}">
                                <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden;">
                                    <img src="{{ $imgUrl }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->judul }}">
                                </div>
                            </a>

                            <!-- Detail Konten -->
                            <div class="p-4">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge rounded-pill text-white px-3 py-1.5" style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700;">
                                        BERITA
                                    </span>
                                    <small class="text-muted" style="font-size: 0.78rem;">📅 {{ $tanggal }}</small>
                                </div>

                                <!-- Judul (Link ke Halaman Detail) -->
                                <h5 class="fw-bold text-dark mb-2 line-clamp-2" style="font-size: 1.05rem; line-height: 1.4;">
                                    <a href="{{ route('public.berita.show', $item->slug) }}" class="text-dark text-decoration-none">
                                        {{ $item->judul }}
                                    </a>
                                </h5>

                                <p class="text-secondary small mb-0 line-clamp-3" style="line-height: 1.6; font-size: 0.85rem;">
                                    {{ Str::limit(strip_tags($item->isi), 120) }}
                                </p>
                            </div>
                        </div>

                        <div class="px-4 pb-4 pt-0">
                            <a href="{{ route('public.berita.show', $item->slug) }}" class="btn btn-link p-0 text-dark fw-bold text-decoration-none small">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <p class="mb-0 fs-5 fw-semibold">Belum ada berita terbaru.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(is_object($berita) && method_exists($berita, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $berita->links() }}
            </div>
        @endif

    </div>
</section>
@endsection
