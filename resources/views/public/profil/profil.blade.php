@extends('public.dashboard')

@section('title', 'Profil Sekolah - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-2">
       
        <h1 class="fw-bold mb-1" style="font-size: 2rem;">
            Profil {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
        </h1>
        <p class="text-white-50 mb-0" style="max-width: 600px; font-size: 0.9rem;">
            Mengenal lebih dekat sejarah, kepemimpinan, serta visi dan misi {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section id="profil-sekolah" class="py-5 bg-white">
    <div class="container">

        <!-- Sambutan Penuh (2 Kolom Clean tanpa Card Kaku) -->
        <div class="row align-items-start g-5 mb-5">
            
            <!-- Kolom Kiri: Foto Kepala Sekolah dengan Name Tag 2 Baris -->
            <div class="col-lg-4 col-md-5">
                <div class="position-relative mx-auto sticky-top" style="max-width: 320px; top: 20px;">
                    <!-- Foto Kepala Sekolah -->
                    @if(isset($profilSekolah->foto_kepala_sekolah) && $profilSekolah->foto_kepala_sekolah)
                        <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}" 
                             alt="{{ $profilSekolah->nama_kepala_sekolah ?? 'Kepala Sekolah' }}" 
                             class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" 
                             style="height: 380px;">
                    @else
                        <img src="{{ asset('storage/profil/kepala_sekolah.jpg') }}" 
                             alt="Lia Aprilina, S.Pd, M.Pd" 
                             class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" 
                             style="height: 380px;" 
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/320x380?text=Kepala+Sekolah';">
                    @endif

                    <!-- Badge Nama & Jabatan (2 Baris Rapi di Bawah Foto) -->
                    <div class="position-absolute bottom-0 start-50 translate-middle-x w-90 mb-3 text-center">
                        <div class="bg-primary text-white py-2 px-3 rounded-3 shadow" style="background-color: #0f172a !important;">
                            <h6 class="fw-bold mb-0 text-white text-nowrap" style="font-size: 0.9rem;">
                                {{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}
                            </h6>
                            <small class="text-warning fw-semibold text-nowrap d-block" style="font-size: 0.75rem;">
                                Kepala {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Teks Sambutan Lengkap Menyatu dengan Halaman -->
            <div class="col-lg-8 col-md-7">
                <!-- Tag Headline -->
                <span class="badge bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    SAMBUTAN PIMPINAN
                </span>

                <!-- Judul Utama -->
                <h2 class="fw-bold text-dark mb-1" style="color: #0f172a !important; font-size: 1.85rem;">
                    Sambutan Kepala Sekolah
                </h2>
                <p class="text-secondary fw-semibold mb-3" style="font-size: 0.95rem;">
                    {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </p>

                <!-- Salam -->
                <p class="fst-italic text-muted fw-semibold mb-4" style="font-size: 0.95rem;">
                    "Assalamu'alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera bagi Kita Semua."
                </p>

                <!-- Isi Teks Sambutan Lengkap -->
                <div class="text-secondary lh-lg" style="font-size: 0.95rem; text-align: justify;">
                    <p class="mb-4">
                        Pertama-tama, marilah kita panjatkan puji syukur ke hadirat Allah SWT, Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya kita dapat berkumpul pada kesempatan yang baik ini. Saya merasa sangat bahagia dan terhormat untuk menyampaikan sambutan ini di hadapan Anda semua sebagai kepala sekolah.
                    </p>

                    <h5 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important;">
                        Sekolah sebagai Tempat Pembentukan Karakter dan Potensi Diri
                    </h5>
                    <p class="mb-4">
                        Sekolah adalah tempat di mana kita bersama-sama membangun masa depan yang lebih baik. Di sekolah, anak-anak kita tidak hanya belajar berbagai ilmu pengetahuan, tetapi juga dibimbing untuk membentuk karakter yang kuat, menjunjung tinggi etika, moral, dan nilai-nilai kebangsaan. Sebagai institusi pendidikan, sekolah ini berkomitmen untuk mendidik siswa-siswi menjadi individu yang cerdas, berakhlak mulia, serta memiliki kepedulian sosial yang tinggi.
                    </p>

                    <h5 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important;">
                        Kurikulum yang Holistik dan Seimbang
                    </h5>
                    <p class="mb-4">
                        Kami menyadari bahwa pendidikan tidak hanya sebatas pencapaian akademis. Oleh karena itu, di sekolah ini kami mengembangkan kurikulum yang tidak hanya fokus pada kecerdasan intelektual, tetapi juga memperhatikan perkembangan karakter, keterampilan sosial, serta kemampuan berpikir kritis dan kreatif. Melalui program Projek Penguatan Profil Pelajar Pancasila (P5), kami berupaya membentuk siswa-siswi yang tidak hanya berprestasi secara akademis, tetapi juga memiliki jiwa gotong royong, toleransi, dan semangat nasionalisme.
                    </p>

                    <h5 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important;">
                        Fasilitas dan Lingkungan Pembelajaran yang Kondusif
                    </h5>
                    <p class="mb-4">
                        Sekolah ini juga dilengkapi dengan berbagai fasilitas yang mendukung proses pembelajaran, baik secara akademis maupun non-akademis. Kami terus berusaha untuk menyediakan lingkungan yang nyaman, aman, dan inspiratif bagi seluruh siswa untuk mengembangkan potensi mereka. Fasilitas olahraga, laboratorium, perpustakaan, serta ruang kreatif tersedia untuk mendorong siswa mengeksplorasi bakat dan minat mereka.
                    </p>

                    <h5 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important;">
                        Kolaborasi antara Sekolah dan Orang Tua
                    </h5>
                    <p class="mb-4">
                        Kami juga sangat percaya bahwa pendidikan terbaik dapat dicapai melalui kerja sama yang baik antara sekolah dan orang tua. Orang tua memiliki peran yang sangat penting dalam mendukung perkembangan anak-anak di luar sekolah. Oleh karena itu, kami mengundang para orang tua untuk terus berpartisipasi aktif dalam berbagai kegiatan sekolah serta selalu memberikan dukungan kepada anak-anak kita dalam perjalanan pendidikannya.
                    </p>

                    <h5 class="fw-bold text-dark mt-4 mb-2" style="color: #0f172a !important;">
                        Harapan untuk Masa Depan
                    </h5>
                    <p class="mb-4">
                        Siswa-siswi Peserta didik {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }} yang saya banggakan, kalian adalah generasi penerus bangsa. Kalian adalah harapan kami untuk masa depan yang lebih baik. Saya berharap kalian semua memanfaatkan kesempatan untuk menggapai masa depan yang lebih baik dengan sebaik-baiknya. Belajarlah dengan sungguh-sungguh, hargailah waktu, dan manfaatkan fasilitas yang ada di sekolah ini untuk mengembangkan potensi diri kalian. Jadilah individu yang berkarakter, berprestasi, dan selalu bersemangat dalam mencapai cita-cita.
                    </p>

                    <div class="mt-4 pt-3 border-top border-light-subtle">
                        <p class="mb-1 fw-semibold">Salam sejahtera bagi kita semua,</p>
                        <p class="fw-bold text-dark mb-0" style="color: #0f172a !important;">
                            Kepala {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                        </p>
                        <p class="fw-bold text-primary mb-0" style="color: #0f172a !important;">
                            {{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}
                        </p>
                        <small class="text-muted">NIP: 196904071995122001</small>
                    </div>
                </div>

            </div>
        </div>

        <hr class="my-5" style="border-color: #e2e8f0; opacity: 1;">

        <!-- Visi & Misi Sekolah -->
        <div class="row">
            <div class="col-12">
                <span class="badge bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    PEDOMAN KAMI
                </span>
                <h3 class="fw-bold text-dark mb-3" style="color: #0f172a; font-size: 1.6rem;">
                    Visi & Misi Sekolah
                </h3>
                <div class="text-secondary p-4 rounded-4" style="background-color: #f8fafc; line-height: 1.8; font-size: 0.95rem; white-space: pre-line; border: 1px solid #e2e8f0;">
                    {!! e($profilSekolah->visi_misi ?? 'Belum ada data visi dan misi.') !!}
                </div>
            </div>
        </div>

    </div>
</section>
@endsection