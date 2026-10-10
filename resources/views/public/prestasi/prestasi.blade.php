@extends('public.dashboard')

@section('title', 'Prestasi Sekolah - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Prestasi Siswa & Sekolah</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Rangkaian pencapaian dan kebanggaan yang berhasil diraih oleh siswa-siswi serta civitas akademika {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="prestasi" class="py-5" style="background-color: #f8fafc;">
    <div class="container">

        <!-- Cards Grid Prestasi (1 Baris Isi 4 Card) -->
        <div class="row g-4">
            @forelse(is_iterable($prestasi) ? $prestasi : [] as $index => $p)
                @if(is_object($p))
                    @php
                        $imgFile = $p->foto ?? $p->gambar ?? $p->file ?? null;
                        $imgUrl = $imgFile ? asset('storage/' . $imgFile) : null;
                        $modalId = $p->id_prestasi ?? $p->id ?? $index;
                    @endphp

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden transition-hover">

                            <div>
                                <!-- Foto / Icon Trophy -->
                                <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden; cursor: pointer;"
                                     data-bs-toggle="modal" data-bs-target="#modalPrestasi{{ $modalId }}">
                                    @if($imgUrl)
                                        <img src="{{ $imgUrl }}"
                                             class="w-100 h-100 object-fit-cover"
                                             alt="{{ $p->nama_prestasi }}">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning fs-1 fw-bold">
                                            🏆
                                        </div>
                                    @endif

                                    <!-- Badge Kategori (AKADEMIK / NON-AKADEMIK) -->
                                    @if(isset($p->kategori))
                                        <span class="position-absolute top-0 start-0 m-3 badge rounded-pill text-white px-3 py-2 shadow-sm"
                                              style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.5px;">
                                            {{ strtoupper($p->kategori) }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Detail Content -->
                                <div class="p-3 text-center">
                                    <!-- Nama Prestasi -->
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem; line-height: 1.35; color: #1e293b;" title="{{ $p->nama_prestasi }}">
                                        {{ $p->nama_prestasi }}
                                    </h6>

                                    <!-- Pemenang & Event -->
                                    <p class="text-muted small mb-1" style="font-size: 0.8rem; color: #64748b !important;">
                                        👤 <strong>{{ $p->pemenang ?? '-' }}</strong>
                                    </p>
                                    @if(isset($p->event))
                                        <p class="text-muted small mb-0" style="font-size: 0.73rem; color: #94a3b8 !important;">
                                            📍 {{ $p->event }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Bagian Bawah: Pill Tingkat & Tombol Baca Selengkapnya -->
                            <div class="px-3 pb-3 text-center mt-auto">
                                <div class="d-inline-block rounded-pill border border-warning px-3 py-1.5 mb-2"
                                     style="background-color: #fffdf5; border-color: #fde047 !important; max-width: 100%;">
                                    <span class="fw-semibold d-block text-wrap" style="color: #854d0e; font-size: 0.72rem;">
                                        Tingkat {{ $p->tingkat ?? 'Sekolah' }} &bull; {{ $p->tahun ?? '2026' }}
                                    </span>
                                </div>

                                <!-- Tombol Baca Selengkapnya -->
                                <div>
                                    <button type="button"
                                            class="btn btn-link text-decoration-none p-0 fw-semibold"
                                            style="font-size: 0.82rem; color: #334155;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalPrestasi{{ $modalId }}">
                                        Baca Selengkapnya &rarr;
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal Detail Prestasi -->
                    <div class="modal fade" id="modalPrestasi{{ $modalId }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0">
                                <div class="modal-header border-0 pb-0">
                                    <span class="badge rounded-pill text-white px-3 py-2" style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700;">
                                        {{ strtoupper($p->kategori ?? 'PRESTASI') }}
                                    </span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4 text-start">
                                    @if($imgUrl)
                                        <div class="text-center mb-3">
                                            <img src="{{ $imgUrl }}" class="rounded-3 object-fit-cover shadow-sm" style="max-height: 350px; width: 100%;" alt="{{ $p->nama_prestasi }}">
                                        </div>
                                    @endif

                                    <h4 class="fw-bold text-dark mb-2">{{ $p->nama_prestasi }}</h4>

                                    <div class="row g-2 my-3 p-3 rounded-3 bg-light" style="font-size: 0.88rem;">
                                        <div class="col-12 col-sm-6">
                                            <span class="text-muted">Peraih / Pemenang:</span><br>
                                            <strong class="text-dark">👤 {{ $p->pemenang ?? '-' }}</strong>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <span class="text-muted">Nama Event / Penyelenggara:</span><br>
                                            <strong class="text-dark">📍 {{ $p->event ?? '-' }}</strong>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-2">
                                            <span class="text-muted">Tingkat Kejuaraan:</span><br>
                                            <strong class="text-dark">🏆 {{ $p->tingkat ?? '-' }}</strong>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-2">
                                            <span class="text-muted">Tahun Pencapaian:</span><br>
                                            <strong class="text-dark">📅 {{ $p->tahun ?? '-' }}</strong>
                                        </div>
                                    </div>

                                    @if(isset($p->deskripsi) && $p->deskripsi)
                                        <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Deskripsi / Catatan:</h6>
                                        <p class="text-secondary small mb-0" style="line-height: 1.6; white-space: pre-line;">
                                            {{ $p->deskripsi }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <div class="display-1 mb-2">🏆</div>
                    <p class="mb-0">Belum ada data prestasi yang terdaftar.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(is_object($prestasi) && method_exists($prestasi, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $prestasi->links() }}
            </div>
        @endif

    </div>
</section>

<style>
.transition-hover {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;
}
</style>
@endsection
