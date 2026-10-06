@extends('public.dashboard') 

@section('title', 'Beranda - SMA Negeri 24 Bandung')

@section('content')

{{-- =====================================================
     HERO SECTION
====================================================== --}}
<section class="bg-light py-5 border-bottom">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <span class="badge bg-primary-custom mb-2">Selamat Datang</span>
                <h1 class="display-5 fw-bold mb-3">
                    {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </h1>
                <p class="lead text-muted mb-4">
                    {{ $profilSekolah->deskripsi ?? 'Mewujudkan generasi penerus yang cerdas, berkarakter, inovatif, dan berdaya saing global.' }}
                </p>
                <div class="d-flex gap-2">
                    <a href="{{ url('/profil') }}" class="btn btn-primary bg-primary-custom border-0 btn-lg px-4 fs-6">
                        Jelajahi Profil
                    </a>
                    <a href="{{ url('/berita') }}" class="btn btn-outline-secondary btn-lg px-4 fs-6">
                        Berita Terbaru
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <img src="{{ asset('assets/images/hero-img.png') }}" class="img-fluid rounded-3 shadow-sm" alt="Foto Sekolah" onerror="this.src='https://via.placeholder.com/500x350?text=Foto+Sekolah'">
            </div>
        </div>
    </div>
</section>


{{-- =====================================================
     SAMBUTAN KEPALA SEKOLAH
====================================================== --}}
<section class="py-5">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img src="{{ asset('assets/images/kepala-sekolah.jpg') }}" class="img-fluid rounded-circle shadow-sm" style="width: 200px; height: 200px; object-fit: cover;" alt="Kepala Sekolah" onerror="this.src='https://via.placeholder.com/200x200?text=Kepala+Sekolah'">
            </div>
            <div class="col-md-8">
                <h6 class="text-primary-custom text-uppercase fw-bold mb-1">Sambutan Kepala Sekolah</h6>
                <h3 class="fw-bold mb-3">Selamat Datang di Website Resmi Sekolah Kami</h3>
                <p class="text-muted fs-6">
                    "Puji syukur kita panjatkan kehadirat Tuhan Yang Maha Esa atas terwujudnya situs resmi sekolah ini. Kami berharap sarana informasi berbasis web ini dapat memberikan manfaat yang maksimal bagi seluruh warga sekolah, alumni, serta masyarakat luas."
                </p>
                <p class="fw-bold mb-0">H. Nama Kepala Sekolah, M.Pd.</p>
                <small class="text-muted">Kepala SMA Negeri 24 Bandung</small>
            </div>
        </div>
    </div>
</section>


{{-- =====================================================
     STATISTIK SEKOLAH
====================================================== --}}
<section class="bg-light py-5 border-top border-bottom">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded shadow-sm">
                    <h2 class="fw-bold text-primary-custom mb-0">1.200+</h2>
                    <p class="text-muted mb-0 fs-6">Siswa Active</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded shadow-sm">
                    <h2 class="fw-bold text-primary-custom mb-0">75+</h2>
                    <p class="text-muted mb-0 fs-6">Guru & Staf</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded shadow-sm">
                    <h2 class="fw-bold text-primary-custom mb-0">36</h2>
                    <p class="text-muted mb-0 fs-6">Rombongan Belajar</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded shadow-sm">
                    <h2 class="fw-bold text-primary-custom mb-0">20+</h2>
                    <p class="text-muted mb-0 fs-6">Ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =====================================================
     BERITA TERBARU
====================================================== --}}
<section class="py-5">
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Berita & Informasi Terbaru</h3>
                <p class="text-muted mb-0">Ikuti perkembangan dan kegiatan terbaru di sekolah kami</p>
            </div>
            <a href="{{ url('/berita') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Berita</a>
        </div>

        <div class="row g-4">
            {{-- Loop data berita dari controller jika ada --}}
            @forelse($beritaTerbaru ?? [] as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $item->judul }}">
                        @else
                            <img src="https://via.placeholder.com/400x200?text=Berita" class="card-img-top" alt="Berita">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <small class="text-muted mb-2"><i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</small>
                            <h5 class="card-title fw-bold fs-6">{{ $item->judul }}</h5>
                            <p class="card-text text-muted fs-6 flex-grow-1">
                                {{ Str::limit(strip_tags($item->isi), 100) }}
                            </p>
                            <a href="{{ url('/berita/' . $item->slug) }}" class="text-primary-custom fw-bold text-decoration-none mt-2">
                                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Placeholder Contoh Berita jika data database masih kosong --}}
                @for($i = 1; $i <= 3; $i++)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="https://via.placeholder.com/400x200?text=Kegiatan+Sekolah+{{ $i }}" class="card-img-top" alt="Berita">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2"><i class="bi bi-calendar3 me-1"></i> {{ date('d F Y') }}</small>
                                <h5 class="card-title fw-bold fs-6">Kegiatan Prestasi dan Pembelajaran Siswa {{ $i }}</h5>
                                <p class="card-text text-muted fs-6 flex-grow-1">
                                    Deskripsi singkat kegiatan sekolah yang menarik dan penuh prestasi bagi seluruh civitas akademika...
                                </p>
                                <a href="{{ url('/berita') }}" class="text-primary-custom fw-bold text-decoration-none mt-2">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            @endforelse
        </div>
    </div>
</section>

@endsection