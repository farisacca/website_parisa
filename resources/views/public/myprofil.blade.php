@extends('public.dashboard')

@section('title', 'My Profile - ' . ($profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung'))

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-2">
        <h1 class="fw-bold mb-1" style="font-size: 2.25rem;">
            Profil Saya
        </h1>
        <p class="text-white-50 mb-0" style="max-width: 600px; font-size: 0.95rem;">
            Informasi identitas diri dan keanggotaan peserta didik.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="background-color: #ffffff; border: 1px solid #e2e8f0 !important;">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="{{ asset('assets/images/big/parisa.jpeg') }}" 
                                     alt="Parisa Nur Esa" class="rounded-circle shadow-sm object-fit-cover border border-4 border-white" 
                                     width="130" height="130">
                            </div>
                          
                            <div class="mb-2">
                                <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning-emphasis px-3 py-2 fw-bold text-uppercase" style="letter-spacing: 0.8px; font-size: 0.75rem; color: #b45309 !important; background-color: #fef3c7 !important;">
                                    PEMBUAT WEB
                                </span>
                            </div>

                            <h2 class="fw-bold text-dark mb-1" style="color: #0f172a !important; font-size: 1.8rem;">
                                Parisa Nur Esa
                            </h2>
                            <p class="text-secondary fw-semibold mb-0" style="font-size: 0.95rem;">
                                Siswa | Kelas XII IPA 2
                            </p>
                        </div>

                        <hr class="my-4" style="border-color: #e2e8f0; opacity: 0.8;">

                        <div class="row g-3 my-2">

                            <div class="col-md-6">
                                <div class="p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #f1f5f9;">
                                    <small class="text-muted d-block fw-semibold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                        NISN
                                    </small>
                                    <div class="fw-bold text-dark fs-6" style="color: #0f172a !important;">
                                        0089702831
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #f1f5f9;">
                                    <small class="text-muted d-block fw-semibold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                        Kelas
                                    </small>
                                    <div class="fw-bold text-dark fs-6" style="color: #0f172a !important;">
                                        XII IPA 1
                                    </div>
                                </div>
                            </div>

                       
                            <div class="col-md-6">
                                <div class="p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #f1f5f9;">
                                    <small class="text-muted d-block fw-semibold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                        Sekolah
                                    </small>
                                    <div class="fw-bold text-dark fs-6" style="color: #0f172a !important;">
                                        SMK YPC TASIKMALAYA
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #f1f5f9;">
                                    <small class="text-muted d-block fw-semibold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                        Hobi
                                    </small>
                                    <div class="fw-bold text-dark fs-6" style="color: #0f172a !important;">
                                        Badminton
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="text-center mt-4 pt-3">
                            <a href="{{ url('/') }}" 
                               class="btn rounded-pill px-4 py-2 fw-bold text-decoration-none d-inline-flex align-items-center justify-content-center shadow-sm"
                               style="background-color: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; font-size: 0.9rem; letter-spacing: 0.3px; transition: all 0.2s ease;">
                                <i class="bi bi-arrow-left-circle-fill me-2" style="font-size: 1.05rem;"></i>
                                Kembali ke Beranda
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection