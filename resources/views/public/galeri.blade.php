@extends('public.dashboard')

@section('title', 'Galeri Kegiatan - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2" style="font-size: 0.85rem;">
                <li class="breadcrumb-item"><a href="{{ route('public.index') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item text-white-50">Informasi</li>
                <li class="breadcrumb-item active text-white" aria-current="page">Galeri Kegiatan</li>
            </ol>
        </nav>

        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Galeri & Dokumentasi Kegiatan</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Kumpulan foto dokumentasi kegiatan, acara, serta momen terbaik di {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="galeri" class="py-5" style="background-color: #f8fafc;">
    <div class="container">

        <!-- Cards Grid Galeri (1 Baris Isi 4 Card) -->
        <div class="row g-4">
            @forelse(collect($galeri ?? []) as $index => $item)
                @php
                    $imgUrl = null;
                    if(isset($item->file) && $item->file) {
                        $imgUrl = asset('storage/' . $item->file);
                    } elseif(isset($item->foto) && $item->foto) {
                        $imgUrl = asset('storage/' . $item->foto);
                    } elseif(isset($item->gambar) && $item->gambar) {
                        $imgUrl = asset('storage/' . $item->gambar);
                    }
                @endphp

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 bg-white h-100 overflow-hidden"
                         style="cursor: pointer; transition: transform 0.2s;"
                         data-bs-toggle="modal"
                         data-bs-target="#modalGaleri{{ $item->id ?? $index }}">

                        <!-- Foto Galeri -->
                        <div class="position-relative w-100 bg-secondary" style="height: 220px; overflow: hidden;">
                            @if($imgUrl)
                                <img src="{{ $imgUrl }}"
                                     class="w-100 h-100 object-fit-cover"
                                     alt="{{ $item->judul ?? 'Galeri' }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white-50 fs-4 fw-bold">
                                    GALERI
                                </div>
                            @endif
                        </div>

                        <!-- Judul Galeri -->
                        <div class="p-3 text-center">
                            <h6 class="text-dark mb-0 text-truncate" style="font-size: 0.92rem; line-height: 1.35; color: #1e293b;" title="{{ $item->judul ?? 'Kegiatan Sekolah' }}">
                                {{ $item->judul ?? 'Kegiatan Sekolah' }}
                            </h6>
                        </div>
                    </div>
                </div>

                <!-- Modal Preview Foto (Klik Foto untuk Memperbesar) -->
                @if($imgUrl)
                    <div class="modal fade" id="modalGaleri{{ $item->id ?? $index }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0">
                                <div class="modal-header border-0 pb-0">
                                    <h6 class="fw-bold mb-0 text-dark">{{ $item->judul ?? 'Kegiatan Sekolah' }}</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-3 text-center">
                                    <img src="{{ $imgUrl }}" class="img-fluid rounded-3" style="max-height: 80vh;" alt="{{ $item->judul ?? 'Galeri' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <p class="mb-0">Belum ada foto galeri yang diunggah.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination (Otomatis Tampil jika Controller menggunakan ->paginate()) -->
        @if(method_exists($galeri ?? [], 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $galeri->links() }}
            </div>
        @endif

    </div>
</section>
@endsection
