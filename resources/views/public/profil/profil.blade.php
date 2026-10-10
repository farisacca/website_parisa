@extends('public.dashboard')

@section('title', 'Profil Sekolah - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-2">
        <h1 class="fw-bold mb-1" style="font-size: 2.25rem;">
            Profil {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
        </h1>
        <p class="text-white-50 mb-0" style="max-width: 600px; font-size: 0.95rem;">
            Mengenal lebih dekat sejarah, kepemimpinan, serta visi dan misi {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="profil-sekolah" class="py-5 bg-white">
    <div class="container">

        <!-- Bagian Atas: Foto di Kiri, Badge Pil + Nama Kepala Sekolah di Kanan -->
        <div class="row align-items-start g-4 mb-4">

            <!-- Kolom Kiri: Foto Kepala Sekolah Bersih (Tanpa Badge/Overlay) -->
            <div class="col-lg-4 col-md-5">
                <div class="position-relative mx-auto sticky-top" style="max-width: 340px; top: 20px;">
                    @if(isset($profilSekolah->foto_kepala_sekolah) && $profilSekolah->foto_kepala_sekolah)
                        <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}"
                             alt="{{ $profilSekolah->nama_kepala_sekolah ?? 'Kepala Sekolah' }}"
                             class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover"
                             style="height: 400px;">
                    @else
                        <img src="{{ asset('storage/profil/kepala_sekolah.jpg') }}"
                             alt="{{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}"
                             class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover"
                             style="height: 400px;"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/340x400?text=Kepala+Sekolah';">
                    @endif
                </div>
            </div>

            <!-- Kolom Kanan: Badge Pil Kuning & Nama Kepala Sekolah (Ukuran Besar) -->
            <div class="col-lg-8 col-md-7 pt-2">
                <!-- Badge Rounded Pil Kuning -->
                <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-3" style="letter-spacing: 0.8px; font-size: 0.85rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    SAMBUTAN PIMPINAN
                </span>

                <!-- Nama Kepala Sekolah dari Database (Ukuran Gede) -->
                <h1 class="fw-bold text-dark mb-2" style="color: #0f172a !important; font-size: 2.2rem;">
                    {{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}
                </h1>

                <!-- Jabatan & Instansi -->
                <p class="text-secondary fw-semibold fs-5 mb-0">
                    Kepala {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </p>
            </div>
        </div>

        <!-- Bagian Bawah: Salam Pembuka & Teks Sambutan Full Lebar -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="text-secondary lh-lg" style="font-size: 1rem; text-align: justify;">

                    <!-- Salam Pembuka -->
                    <p class="fst-italic text-dark fw-bold mb-4 mt-4" style="font-size: 1.15rem; color: #0f172a !important;">
                        "Assalamu'alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera bagi Kita Semua."
                    </p>

                    <p class="mb-4">
                        Pertama-tama, marilah kita panjatkan puji syukur ke hadirat Allah SWT, Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya kita dapat berkumpul pada kesempatan yang baik ini. Saya merasa sangat bahagia dan terhormat untuk menyampaikan sambutan ini di hadapan Anda semua sebagai kepala sekolah.
                    </p>

                    <h4 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important; font-size: 1.25rem;">
                        Sekolah sebagai Tempat Pembentukan Karakter dan Potensi Diri
                    </h4>
                    <p class="mb-4">
                        Sekolah adalah tempat di mana kita bersama-sama membangun masa depan yang lebih baik. Di sekolah, anak-anak kita tidak hanya belajar berbagai ilmu pengetahuan, tetapi juga dibimbing untuk membentuk karakter yang kuat, menjunjung tinggi etika, moral, dan nilai-nilai kebangsaan. Sebagai institusi pendidikan, sekolah ini berkomitmen untuk mendidik siswa-siswi menjadi individu yang cerdas, berakhlak mulia, serta memiliki kepedulian sosial yang tinggi.
                    </p>

                    <h4 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important; font-size: 1.25rem;">
                        Kurikulum yang Holistik dan Seimbang
                    </h4>
                    <p class="mb-4">
                        Kami menyadari bahwa pendidikan tidak hanya sebatas pencapaian akademis. Oleh karena itu, di sekolah ini kami mengembangkan kurikulum yang tidak hanya fokus pada kecerdasan intelektual, tetapi juga memperhatikan perkembangan karakter, keterampilan sosial, serta kemampuan berpikir kritis dan kreatif. Melalui program Projek Penguatan Profil Pelajar Pancasila (P5), kami berupaya membentuk siswa-siswi yang tidak hanya berprestasi secara akademis, tetapi juga memiliki jiwa gotong royong, toleransi, dan semangat nasionalisme.
                    </p>

                    <h4 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important; font-size: 1.25rem;">
                        Fasilitas dan Lingkungan Pembelajaran yang Kondusif
                    </h4>
                    <p class="mb-4">
                        Sekolah ini juga dilengkapi dengan berbagai fasilitas yang mendukung proses pembelajaran, baik secara akademis maupun non-akademis. Kami terus berusaha untuk menyediakan lingkungan yang nyaman, aman, dan inspiratif bagi seluruh siswa untuk mengembangkan potensi mereka. Fasilitas olahraga, laboratorium, perpustakaan, serta ruang kreatif tersedia untuk mendorong siswa mengeksplorasi bakat dan minat mereka.
                    </p>

                    <h4 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important; font-size: 1.25rem;">
                        Kolaborasi antara Sekolah dan Orang Tua
                    </h4>
                    <p class="mb-4">
                        Kami juga sangat percaya bahwa pendidikan terbaik dapat dicapai melalui kerja sama yang baik antara sekolah dan orang tua. Orang tua memiliki peran yang sangat penting dalam mendukung perkembangan anak-anak di luar sekolah. Oleh karena itu, kami mengundang para orang tua untuk terus berpartisipasi aktif dalam berbagai kegiatan sekolah serta selalu memberikan dukungan kepada anak-anak kita dalam perjalanan pendidikannya.
                    </p>

                    <h4 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important; font-size: 1.25rem;">
                        Harapan untuk Masa Depan
                    </h4>
                    <p class="mb-4">
                        Siswa-siswi Peserta didik {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }} yang saya banggakan, kalian adalah generasi penerus bangsa. Kalian adalah harapan kami untuk masa depan yang lebih baik. Saya berharap kalian semua memanfaatkan kesempatan untuk menggapai masa depan yang lebih baik dengan sebaik-baiknya. Belajarlah dengan sungguh-sungguh, hargailah waktu, dan manfaatkan fasilitas yang ada di sekolah ini untuk mengembangkan potensi diri kalian. Jadilah individu yang berkarakter, berprestasi, dan selalu bersemangat dalam mencapai cita-cita.
                    </p>

                    <div class="mt-4 pt-3 border-top border-light-subtle">
                        <p class="mb-1 fw-semibold">Salam sejahtera bagi kita semua,</p>
                        <p class="fw-bold text-dark mb-0" style="color: #0f172a !important;">
                            Kepala {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                        </p>
                        <p class="fw-bold text-primary mb-0" style="color: #0f172a !important; font-size: 1.1rem;">
                            {{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}
                        </p>
                        <small class="text-muted">NIP: {{ $profilSekolah->nip_kepala_sekolah ?? '196904071995122001' }}</small>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5" style="border-color: #e2e8f0; opacity: 1;">

        <!-- Visi & Misi Sekolah -->
        <div class="row mb-5">
            <div class="col-12">
                <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-2" style="letter-spacing: 0.8px; font-size: 0.85rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    PEDOMAN KAMI
                </span>
                <h3 class="fw-bold text-dark mb-3" style="color: #0f172a; font-size: 1.8rem;">
                    Visi & Misi Sekolah
                </h3>
                <div class="text-secondary p-4 rounded-4" style="background-color: #f8fafc; line-height: 1.8; font-size: 1rem; white-space: pre-line; border: 1px solid #e2e8f0;">
                    {!! e($profilSekolah->visi_misi ?? 'Belum ada data visi dan misi.') !!}
                </div>
            </div>
        </div>

        <!-- Informasi Singkat Sekolah dari Database (Hanya Tahun Berdiri & NPSN) -->
        <div class="row">
            <div class="col-12">
                <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-2" style="letter-spacing: 0.8px; font-size: 0.85rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    INFORMASI SEKOLAH
                </span>
                <h3 class="fw-bold text-dark mb-4" style="color: #0f172a; font-size: 1.8rem;">
                    Sekilas Tentang {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </h3>

                <!-- Grid Kartu Info Ringkas (Hanya 2 Kolom) -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6 col-sm-6">
                        <div class="p-3 bg-light rounded-3 border text-center">
                            <small class="text-muted d-block mb-1">Tahun Berdiri</small>
                            <h4 class="fw-bold text-dark mb-0">{{ $profilSekolah->tahun_berdiri ?? '1981' }}</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="p-3 bg-light rounded-3 border text-center">
                            <small class="text-muted d-block mb-1">NPSN</small>
                            <h4 class="fw-bold text-dark mb-0">{{ $profilSekolah->npsn ?? '20219736' }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi & Alamat Sekolah -->
                <div class="p-4 rounded-4 text-secondary" style="background-color: #f8fafc; border: 1px solid #e2e8f0; font-size: 1rem; line-height: 1.8;">
                    @if(isset($profilSekolah->deskripsi) && $profilSekolah->deskripsi)
                        <p class="mb-3">{{ $profilSekolah->deskripsi }}</p>
                    @endif

                    <div class="d-flex align-items-start gap-2 text-dark fw-semibold mt-2">
                        <i class="bi bi-geo-alt-fill text-danger mt-1"></i>
                        <span>
                            Alamat Lengkap: {{ $profilSekolah->alamat ?? 'Jl. A.H. Nasution No.27, Ujung Berung, Kota Bandung, Jawa Barat 40611' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
