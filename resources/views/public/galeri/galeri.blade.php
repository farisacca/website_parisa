@extends('public.dashboard')

@section('title', 'Galeri Foto & Video - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">

        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Galeri Dokumentasi & Video</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Dokumentasi momen berharga, album foto kegiatan, dan video resmi {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="galeri" class="py-5" style="background-color: #f8fafc;">
    <div class="container">

        <!-- TAB NAVIGASI (Underline Style Tanpa Rounded-Pill & Tanpa Ikon) -->
        <div class="border-bottom mb-4">
            <ul class="nav nav-tabs border-0 gap-3" id="galeriTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold border-0 bg-transparent px-2 pb-3 position-relative"
                            id="foto-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#foto-content"
                            type="button"
                            role="tab"
                            aria-controls="foto-content"
                            aria-selected="true"
                            style="color: #1e293b; border-bottom: 2px solid #1e293b !important;">
                        Album Foto
                        <span class="badge rounded-pill bg-secondary bg-opacity-25 text-dark ms-1 px-2 py-1" style="font-size: 0.75rem;">
                            {{ count($galeriFoto) }}
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold border-0 bg-transparent px-2 pb-3 text-muted position-relative"
                            id="video-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#video-content"
                            type="button"
                            role="tab"
                            aria-controls="video-content"
                            aria-selected="false">
                        Video Dokumentasi
                        <span class="badge rounded-pill bg-secondary bg-opacity-25 text-dark ms-1 px-2 py-1" style="font-size: 0.75rem;">
                            {{ count($galeriVideo) }}
                        </span>
                    </button>
                </li>
            </ul>
        </div>

        <!-- TAB CONTENT -->
        <div class="tab-content" id="galeriTabContent">

            <!-- TAB 1: ALBUM FOTO -->
            <div class="tab-pane fade show active" id="foto-content" role="tabpanel" aria-labelledby="foto-tab">
                <div class="row g-4">
                    @forelse($galeriFoto as $index => $item)
                        @php
                            $imgFile = $item->file ?? $item->foto ?? $item->gambar ?? null;
                            $imgUrl = $imgFile ? asset('storage/' . $imgFile) : null;
                            $judulGaleri = $item->judul ?? 'Foto Kegiatan';
                            $tanggal = $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-';
                            $itemId = $item->id_galeri ?? $item->id ?? $index;
                        @endphp

                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card border-0 shadow-sm rounded-4 bg-white h-100 overflow-hidden d-flex flex-column justify-content-between"
                                 style="cursor: pointer; transition: transform 0.2s;"
                                 data-bs-toggle="modal"
                                 data-bs-target="#modalFoto{{ $itemId }}">

                                <div>
                                    <!-- Foto Cover -->
                                    <div class="position-relative w-100 bg-secondary" style="height: 220px; overflow: hidden;">
                                        @if($imgUrl)
                                            <img src="{{ $imgUrl }}" class="w-100 h-100 object-fit-cover" alt="{{ $judulGaleri }}">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white-50 fs-5 fw-bold">
                                                FOTO
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Tanggal & Judul -->
                                    <div class="p-3">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.78rem;">{{ $tanggal }}</small>
                                        <h6 class="fw-bold text-dark mb-0 line-clamp-2" style="font-size: 0.95rem; line-height: 1.4; color: #1e293b;" title="{{ $judulGaleri }}">
                                            {{ $judulGaleri }}
                                        </h6>
                                    </div>
                                </div>

                                <!-- Footer Author / Action -->
                                <div class="px-3 pb-3 pt-0 d-flex align-items-center justify-content-between border-top mt-2 pt-2">
                                    <small class="text-muted" style="font-size: 0.75rem;">Oleh: Administrator</small>
                                    <small class="text-dark fw-semibold" style="font-size: 0.78rem;">Lihat Album &rarr;</small>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Detail Foto -->
                        <div class="modal fade" id="modalFoto{{ $itemId }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content rounded-4 border-0">
                                    <div class="modal-header border-0 pb-0">
                                        <h6 class="fw-bold mb-0 text-dark">{{ $judulGaleri }}</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-3 text-center">
                                        @if($imgUrl)
                                            <img src="{{ $imgUrl }}" class="img-fluid rounded-3 mb-2" style="max-height: 75vh;" alt="{{ $judulGaleri }}">
                                        @endif
                                        @if(!empty($item->keterangan) || !empty($item->deskripsi))
                                            <p class="text-muted small mb-0 mt-2 text-start px-2">
                                                {{ $item->keterangan ?? $item->deskripsi }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5 text-muted">
                            <p class="mb-0 fs-5 fw-semibold">Belum ada foto dokumentasi yang diunggah.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- TAB 2: VIDEO DOKUMENTASI -->
            <div class="tab-pane fade" id="video-content" role="tabpanel" aria-labelledby="video-tab">
                <div class="row g-4">
                    @forelse($galeriVideo as $index => $item)
                        @php
                            $rawFile = $item->file ?? '';
                            $judulGaleri = $item->judul ?? 'Video Kegiatan';
                            $tanggal = $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-';
                            $itemId = $item->id_galeri ?? $item->id ?? $index;

                            // Regex Ambil YouTube ID
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $rawFile, $matches);
                            $ytId = $matches[1] ?? $rawFile;
                            $thumbUrl = "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg";
                        @endphp

                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card border-0 shadow-sm rounded-4 bg-white h-100 overflow-hidden d-flex flex-column justify-content-between"
                                 style="cursor: pointer; transition: transform 0.2s;"
                                 data-bs-toggle="modal"
                                 data-bs-target="#modalVideo{{ $itemId }}">

                                <div>
                                    <!-- Thumbnail Video YouTube -->
                                    <div class="position-relative w-100 bg-dark" style="height: 220px; overflow: hidden;">
                                        <img src="{{ $thumbUrl }}" class="w-100 h-100 object-fit-cover opacity-85" alt="{{ $judulGaleri }}">

                                        <!-- Play Button Overlay -->
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center shadow" style="width: 45px; height: 45px;">
                                                <span class="fs-6 ms-1">▶</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tanggal & Judul -->
                                    <div class="p-3">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.78rem;">{{ $tanggal }}</small>
                                        <h6 class="fw-bold text-dark mb-0 line-clamp-2" style="font-size: 0.95rem; line-height: 1.4; color: #1e293b;" title="{{ $judulGaleri }}">
                                            {{ $judulGaleri }}
                                        </h6>
                                    </div>
                                </div>

                                <!-- Footer Author / Action -->
                                <div class="px-3 pb-3 pt-0 d-flex align-items-center justify-content-between border-top mt-2 pt-2">
                                    <small class="text-muted" style="font-size: 0.75rem;">Oleh: Administrator</small>
                                    <small class="text-danger fw-semibold" style="font-size: 0.78rem;">Putar Video &rarr;</small>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Video Player YouTube -->
                        <div class="modal fade" id="modalVideo{{ $itemId }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content rounded-4 border-0">
                                    <div class="modal-header border-0 pb-0">
                                        <h6 class="fw-bold mb-0 text-dark">{{ $judulGaleri }}</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-3">
                                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
                                            <iframe src="https://www.youtube.com/embed/{{ $ytId }}" allowfullscreen></iframe>
                                        </div>
                                        @if(!empty($item->keterangan) || !empty($item->deskripsi))
                                            <p class="text-muted small mb-0 mt-3 px-2">
                                                {{ $item->keterangan ?? $item->deskripsi }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5 text-muted">
                            <p class="mb-0 fs-5 fw-semibold">Belum ada video dokumentasi yang diunggah.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Script switching border underline active -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabElList = document.querySelectorAll('button[data-bs-toggle="tab"]');
        tabElList.forEach(tabEl => {
            tabEl.addEventListener('shown.bs.tab', event => {
                tabElList.forEach(btn => {
                    btn.classList.remove('fw-bold', 'text-dark');
                    btn.classList.add('fw-semibold', 'text-muted');
                    btn.style.borderBottom = 'none';
                });
                event.target.classList.remove('fw-semibold', 'text-muted');
                event.target.classList.add('fw-bold');
                event.target.style.color = '#1e293b';
                event.target.style.borderBottom = '2px solid #1e293b';
            });
        });
    });
</script>
@endsection
