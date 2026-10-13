@extends('public.dashboard')

@section('title', 'Prestasi Sekolah - SMA Negeri 24 Bandung')

@section('content')

<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
   
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Prestasi Siswa & Sekolah</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Rangkaian pencapaian dan kebanggaan yang berhasil diraih oleh siswa-siswi serta civitas akademika {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="prestasi" class="py-5" style="background-color: #f8fafc;">
    <div class="container">
    
        <div class="row g-4">
            @forelse(is_iterable($prestasi) ? $prestasi : [] as $index => $p)
                @if(is_object($p))
                    @php
                        $imgFile = $p->foto ?? $p->gambar ?? $p->file ?? null;
                        $imgUrl = $imgFile ? asset('storage/' . $imgFile) : null;
                        $idPrestasi = $p->id_prestasi ?? $p->id ?? $index;
                    @endphp

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden transition-hover">

                            <div>
                               
                                <a href="{{ route('public.prestasi.show', encrypt($idPrestasi)) }}" class="d-block text-decoration-none">
                                    <div class="position-relative w-100 bg-light" style="height: 200px; overflow: hidden;">
                                        @if($imgUrl)
                                            <img src="{{ $imgUrl }}"
                                                 class="w-100 h-100 object-fit-cover"
                                                 alt="{{ $p->nama_prestasi }}">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning fs-1 fw-bold">
                                                🏆
                                            </div>
                                        @endif

                                       
                                        @if(isset($p->kategori))
                                            <span class="position-absolute top-0 start-0 m-3 badge rounded-pill text-white px-3 py-2 shadow-sm"
                                                  style="background-color: #1e293b; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.5px;">
                                                {{ strtoupper($p->kategori) }}
                                            </span>
                                        @endif
                                    </div>
                                </a>

                                <!-- Detail Content -->
                                <div class="p-3 text-center">
                                   
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem; line-height: 1.35; color: #1e293b;" title="{{ $p->nama_prestasi }}">
                                        <a href="{{ route('public.prestasi.show', encrypt($idPrestasi)) }}" class="text-decoration-none text-dark">
                                            {{ $p->nama_prestasi }}
                                        </a>
                                    </h6>

                               
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

                            <div class="px-3 pb-3 text-center mt-auto">
                                <div class="d-inline-block rounded-pill border border-warning px-3 py-1.5 mb-2"
                                     style="background-color: #fffdf5; border-color: #fde047 !important; max-width: 100%;">
                                    <span class="fw-semibold d-block text-wrap" style="color: #854d0e; font-size: 0.72rem;">
                                        Tingkat {{ $p->tingkat ?? 'Sekolah' }} &bull; {{ $p->tahun ?? '2026' }}
                                    </span>
                                </div>

                                
                                <div>
                                    <a href="{{ route('public.prestasi.show', encrypt($idPrestasi)) }}"
                                       class="btn btn-link text-decoration-none p-0 fw-semibold"
                                       style="font-size: 0.82rem; color: #334155;">
                                        Baca Selengkapnya &rarr;
                                    </a>
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