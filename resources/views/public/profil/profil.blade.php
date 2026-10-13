@extends('public.dashboard')

@section('title', 'Profil Sekolah - SMA Negeri 24 Bandung')

@section('content')

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

        
        <div class="text-center mb-5">
                <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-2" style="letter-spacing: 0.8px; font-size: 0.85rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    SAMBUTAN PIMPINAN
                </span>
            <h2 class="fw-bold text-dark" style="color: #0f172a !important; font-size: 2rem;">
                Sambutan Kepala Sekolah
            </h2>
            <div style="width: 60px; height: 3px; background-color: #f59e0b; margin: 8px auto 0;"></div>
        </div>

        <div class="row g-4 mb-5 align-items-center">

            <div class="col-lg-5 col-md-5">
                <div class="position-relative mx-auto">
                    @if(isset($profilSekolah->foto_kepala_sekolah) && $profilSekolah->foto_kepala_sekolah)
                        <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}"
                             alt="{{ $profilSekolah->nama_kepala_sekolah ?? 'Kepala Sekolah' }}"
                             class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover"
                             style="height: 520px;">
                    @else
                        <img src="{{ asset('storage/profil/kepala_sekolah.jpg') }}"
                             alt="{{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}"
                             class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover"
                             style="height: 520px;"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/380x520?text=Kepala+Sekolah';">
                    @endif
                </div>
            </div>

            <div class="col-lg-7 col-md-7">
                
              
                <h2 class="fw-bold text-dark mb-1" style="color: #0f172a !important; font-size: 2rem;">
                    {{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}
                </h2>

               
                <p class="text-secondary fw-semibold fs-6 mb-3">
                    Kepala {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </p>

              
                <div class="text-secondary lh-relaxed" style="font-size: 0.98rem; text-align: justify;">

                    <p class="fst-italic text-dark fw-bold mb-3" style="color: #0f172a !important; font-size: 1.05rem;">
                        "Assalamu'alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera bagi Kita Semua."
                    </p>

                    <p class="mb-3">
                        Puji dan syukur marilah kita panjatkan ke hadirat Allah SWT, Tuhan Yang Maha Esa. Merupakan suatu kehormatan bagi saya untuk menyambut seluruh peserta didik, orang tua, serta masyarakat di website resmi {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}.
                    </p>

                    <p class="mb-3">
                        Sekolah kami berkomitmen penuh untuk tidak hanya mencetak generasi yang unggul secara akademis, tetapi juga membina karakter, moral, serta potensi kepemimpinan peserta didik yang berlandaskan nilai-nilai Pancasila.
                    </p>

                    <p class="mb-4">
                        Melalui kolaborasi antarguru, orang tua, dan seluruh warga sekolah, kami terus berupaya menyediakan lingkungan pembelajaran yang inovatif, kondusif, dan inspiratif demi mewujudkan masa depan peserta didik yang cemerlang.
                    </p>

                  
                    <div class="pt-3 border-top border-light-subtle">
                        <p class="fw-bold text-dark mb-0" style="color: #0f172a !important;">
                            Kepala {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                        </p>
                        <p class="fw-bold text-primary mb-0" !important; font-size: 1.1rem;">
                            {{ $profilSekolah->nama_kepala_sekolah ?? 'Lia Aprilina, S.Pd, M.Pd' }}
                        </p>
                        <small class="text-muted">NIP: {{ $profilSekolah->nip_kepala_sekolah ?? '196904071995122001' }}</small>
                    </div>

                </div>
            </div>

        </div>

        <hr class="my-5" style="border-color: #e2e8f0; opacity: 1;">

      
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

      
        <div class="row">
            <div class="col-12">
                <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase mb-2" style="letter-spacing: 0.8px; font-size: 0.85rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                    INFORMASI SEKOLAH
                </span>
                <h3 class="fw-bold text-dark mb-4" style="color: #0f172a; font-size: 1.8rem;">
                    Sekilas Tentang {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                </h3>

                
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