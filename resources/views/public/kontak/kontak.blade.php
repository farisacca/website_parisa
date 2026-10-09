@extends('layouts.public')

@section('title', 'Kontak - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner -->
<section class="py-5 bg-primary text-white position-relative">
    <div class="container py-4 text-center">
        <h1 class="fw-bold display-5 mb-2">Hubungi Kami</h1>
        <p class="lead mb-0 text-white-50">Kami siap membantu dan menjawab setiap pertanyaan Anda mengenai SMA Negeri 24 Bandung.</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-4">
            
            <!-- Kolom Informasi Kontak -->
            <div class="col-lg-5">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                    <h4 class="fw-bold mb-4 text-dark">Informasi Sekolah</h4>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="badge bg-primary bg-opacity-10 text-primary p-3 rounded-3 me-3 fs-5">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Alamat</h6>
                            <p class="text-muted small mb-0">Jl. A.H. Nasution No.27, Pasir Endah, Kec. Ujungberung, Kota Bandung, Jawa Barat 40619</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="badge bg-primary bg-opacity-10 text-primary p-3 rounded-3 me-3 fs-5">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Telepon</h6>
                            <p class="text-muted small mb-0">(022) 7800584</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="badge bg-primary bg-opacity-10 text-primary p-3 rounded-3 me-3 fs-5">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="text-muted small mb-0">sman24bandung@gmail.com</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="badge bg-primary bg-opacity-10 text-primary p-3 rounded-3 me-3 fs-5">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Jam Operasional</h6>
                            <p class="text-muted small mb-0">Senin - Jumat: 07.00 - 15.30 WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Form Pesan -->
            <div class="col-lg-7">
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <h4 class="fw-bold mb-3 text-dark">Kirim Pesan</h4>
                    <p class="text-muted small mb-4">Silakan isi formulir di bawah ini untuk mengirim pesan, saran, atau pertanyaan.</p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="#" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold">Subjek</label>
                                <input type="text" name="subjek" class="form-control" placeholder="Contoh: Pertanyaan PPDB / Informasi" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold">Pesan</label>
                                <textarea name="pesan" rows="4" class="form-control" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Embed Google Maps SMAN 24 Bandung -->
            <div class="col-12 mt-4">
                <div class="bg-white p-3 rounded-4 shadow-sm overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.812373752187!2d107.6908027!3d-6.9130089!2m3!1f0!0f0!3f0!2m1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68dd263f15ec65%3A0x63353e1f14ec710b!2SMA%20Negeri%2024%20Bandung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="350" 
                        style="border:0; border-radius: 12px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection