@extends('public.dashboard')

@section('title', 'Direktori Guru - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Direktori Guru</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Daftar profil tenaga pengajar {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<div class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        

        <!-- Tab Content -->
        <div class="tab-content" id="guruTabContent">

            <!-- Tab Pane: Guru & Pendidik -->
            <div class="tab-pane fade show active" id="guru-pane" role="tabpanel">
                <div class="row g-4">
                    @forelse(collect($guru ?? []) as $g)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Bungkus card dengan tag <a> menuju halaman detail (show) -->
                            <a href="{{ route('public.guru.show', Crypt::encrypt($g->id_guru)) }}" class="text-decoration-none h-100 d-block">
                                <div class="card border-0 shadow-sm rounded-4 bg-white h-100 d-flex flex-column justify-content-between overflow-hidden teacher-card transition-hover">
                                    <div>
                                        <!-- Foto Full di Atas -->
                                        <div class="position-relative w-100 bg-secondary bg-opacity-10" style="height: 240px; overflow: hidden;">
                                            @if(isset($g->foto) && $g->foto)
                                                <img src="{{ asset('storage/' . $g->foto) }}"
                                                     class="w-100 h-100 object-fit-cover"
                                                     alt="{{ $g->nama_guru ?? $g->nama }}">
                                            @elseif(isset($g->gambar) && $g->gambar)
                                                <img src="{{ asset('storage/' . $g->gambar) }}"
                                                     class="w-100 h-100 object-fit-cover"
                                                     alt="{{ $g->nama_guru ?? $g->nama }}">
                                            @else
                                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted fs-2 fw-bold">
                                                    {{ Str::limit($g->nama_guru ?? $g->nama ?? 'GURU', 2, '') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Detail Content (Nama Saja, NIP Dihapus) -->
                                        <div class="p-3 text-center">
                                            <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 0.92rem; line-height: 1.35; color: #1e293b;" title="{{ $g->nama_guru ?? $g->nama }}">
                                                {{ $g->nama_guru ?? $g->nama }}
                                            </h6>
                                        </div>
                                    </div>

                                    <!-- Rounded Pill Mapel & Tombol Detail -->
                                    <div class="px-3 pb-3 text-center mt-auto">
                                        <div class="d-inline-block rounded-pill border border-warning px-3 py-1.5 mb-2"
                                            style="background-color: #fffdf5; border-color: #fde047 !important; max-width: 100%;">
                                            <span class="fw-semibold d-block text-wrap"
                                                style="color: #854d0e; font-size: 0.73rem; line-height: 1.4;">
                                                {{ $g->mapel->nama_mapel ?? $g->nama_mapel ?? $g->mapel ?? 'Mata Pelajaran' }}
                                            </span>
                                        </div>

                                        <div class="small fw-bold">
                                            Lihat Detail &rarr;
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <p class="mb-0">Belum ada data guru.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if(method_exists($guru ?? [], 'links'))
                    <div class="d-flex justify-content-center mt-5">
                        {{ $guru->links() }}
                    </div>
                @endif
            </div>

            <!-- Tab Pane: Tenaga Kependidikan -->
            <div class="tab-pane fade" id="tendik-pane" role="tabpanel">
                <div class="text-center py-5 text-muted">
                    <p class="mb-0">Belum ada data tenaga kependidikan.</p>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Styling Tambahan untuk Efek Hover -->
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
