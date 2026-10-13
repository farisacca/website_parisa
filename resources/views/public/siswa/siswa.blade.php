@extends('public.dashboard')

@section('title', 'Direktori Siswa - SMA Negeri 24 Bandung')

@section('content')
<!-- Header Banner / Hero Section -->
<div class="py-5 text-white" style="background-color: #334155;">
    <div class="container py-3">
        <!-- Judul & Subjudul -->
        <h1 class="fw-bold mb-2" style="font-size: 2.2rem;">Daftar Siswa</h1>
        <p class="text-white-50 mb-0" style="max-width: 650px; font-size: 0.95rem;">
            Daftar siswa {{ $profilSekolah->nama_sekolah ?? 'SMA NEGERI 24 BANDUNG' }}.
        </p>
    </div>
</div>

<!-- Main Content Area -->
<div class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        
  
        <div class="tab-content" id="siswaTabContent">
            <div class="tab-pane fade show active" id="siswa-pane" role="tabpanel">
                <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-uppercase fs-7 text-secondary">
                                <tr>
                                    <th scope="col" class="py-3 px-4" style="width: 5%;">No</th>
                                    <th scope="col" class="py-3 px-4">Nama Siswa</th>
                                    <th scope="col" class="py-3 px-4">NISN / NIS</th>
                                    <th scope="col" class="py-3 px-4">Kelas</th>
                                    <th scope="col" class="py-3 px-4">Jenis Kelamin</th>
                                    <th scope="col" class="py-3 px-4">Tahun Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(collect($siswa ?? []) as $index => $s)
                                    <tr>
                                        <td class="py-3 px-4 text-secondary">
                                            {{ method_exists($siswa, 'firstItem') ? $siswa->firstItem() + $index : $index + 1 }}
                                        </td>
                                        <td class="py-3 px-4">
                                            <span class="fw-bold text-dark" style="color: #1e293b;">
                                                {{ $s->nama_siswa ?? $s->nama }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: #fffdf5; color: #854d0e; border: 1px solid #fde047;">
                                                {{ $s->nisn ?? $s->nis ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <span class="fw-bold text-dark" style="color: #1e293b;">
                                                {{ optional($s->kelas)->nama_kelas ?? $s->nama_kelas ?? '-' }}
                                            </span>
                                        </td>

                                        <td class="py-3 px-4 fw-semibold text-secondary">
                                            {{ $s->jenis_kelamin ?? $s->jenis ?? '-' }}
                                        </td>
                                        <td class="py-3 px-4 fw-semibold text-secondary">
                                            {{ $s->tahun_masuk ?? $s->tahun ?? '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <p class="mb-0">Belum ada data siswa.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                @if(method_exists($siswa ?? [], 'links'))
                    <div class="d-flex justify-content-center mt-5">
                        {{ $siswa->links() }}
                    </div>
                @endif
            </div>

    
            <div class="tab-pane fade" id="tendik-pane" role="tabpanel">
                <div class="text-center py-5 text-muted">
                    <p class="mb-0">Belum ada data siswa.</p>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Styling Tambahan -->
<style>
.fs-7 {
    font-size: 0.8rem;
    letter-spacing: 0.05em;
}
</style>
@endsection