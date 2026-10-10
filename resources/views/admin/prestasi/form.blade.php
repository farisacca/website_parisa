@extends('layouts.app')

@section('title', isset($prestasi->id_prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">

            {{-- HEADER WARNA BIRU --}}
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0 text-white font-weight-bold">
                    <i class="fa {{ isset($prestasi->id_prestasi) ? 'fa-pencil-alt' : 'fa-plus' }} mr-2"></i>
                    {{ isset($prestasi->id_prestasi) ? 'Form Edit Data Prestasi' : 'Form Tambah Data Prestasi Baru' }}
                </h4>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.prestasi.save', isset($prestasi->id_prestasi) ? Crypt::encrypt($prestasi->id_prestasi) : null) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body p-4">
                    <div class="form-body">

                        {{-- NAMA PRESTASI --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="nama_prestasi" class="col-md-3 col-form-label font-weight-semibold">
                                Nama Prestasi <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('nama_prestasi') is-invalid @enderror"
                                    id="nama_prestasi"
                                    name="nama_prestasi"
                                    value="{{ old('nama_prestasi', $prestasi->nama_prestasi ?? '') }}"
                                    placeholder="Contoh: Juara 1 Lomba Karya Tulis Ilmiah"
                                    required>
                                @error('nama_prestasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- PEMENANG --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="pemenang" class="col-md-3 col-form-label font-weight-semibold">
                                Pemenang <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('pemenang') is-invalid @enderror"
                                    id="pemenang"
                                    name="pemenang"
                                    value="{{ old('pemenang', $prestasi->pemenang ?? '') }}"
                                    placeholder="Masukkan nama pemenang / tim"
                                    required>
                                @error('pemenang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- EVENT --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="event" class="col-md-3 col-form-label font-weight-semibold">
                                Nama Event / Kejuaraan <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('event') is-invalid @enderror"
                                    id="event"
                                    name="event"
                                    value="{{ old('event', $prestasi->event ?? '') }}"
                                    placeholder="Masukkan nama event"
                                    required>
                                @error('event')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- TINGKAT KEJUARAAN --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="tingkat" class="col-md-3 col-form-label font-weight-semibold">
                                Tingkat Kejuaraan <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="tingkat"
                                    id="tingkat"
                                    class="form-control custom-select @error('tingkat') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Tingkat --</option>
                                    @foreach(['Sekolah', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'] as $item)
                                        <option value="{{ $item }}" {{ old('tingkat', $prestasi->tingkat ?? '') == $item ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tingkat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- KATEGORI --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="kategori" class="col-md-3 col-form-label font-weight-semibold">
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('kategori') is-invalid @enderror"
                                    id="kategori"
                                    name="kategori"
                                    value="{{ old('kategori', $prestasi->kategori ?? '') }}"
                                    placeholder="Contoh: AKADEMIK"
                                    required>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- TAHUN --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="tahun" class="col-md-3 col-form-label font-weight-semibold">
                                Tahun <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="number"
                                    class="form-control @error('tahun') is-invalid @enderror"
                                    id="tahun"
                                    name="tahun"
                                    min="1900"
                                    max="2100"
                                    value="{{ old('tahun', $prestasi->tahun ?? date('Y')) }}"
                                    placeholder="Contoh: 2026"
                                    required>
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- GAMBAR / FOTO (DITAMBAHKAN DI SINI) --}}
                        <div class="form-group row mb-3">
                            <label for="gambar" class="col-md-3 col-form-label font-weight-semibold">
                                Gambar / Foto Prestasi
                            </label>
                            <div class="col-md-9">
                                @if(!empty($prestasi->gambar))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->nama_prestasi ?? '' }}" class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file"
                                    class="form-control-file @error('gambar') is-invalid @enderror"
                                    id="gambar"
                                    name="gambar"
                                    accept="image/*">
                                <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2 MB.</small>
                                @error('gambar')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="form-group row mb-3">
                            <label for="deskripsi" class="col-md-3 col-form-label font-weight-semibold">
                                Deskripsi
                            </label>
                            <div class="col-md-9">
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi prestasi">{{ old('deskripsi', $prestasi->deskripsi ?? '') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                {{-- FOOTER / ACTIONS --}}
                <div class="card-footer bg-light text-right py-3">
                    <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> {{ isset($prestasi->id_prestasi) ? 'Simpan Perubahan' : 'Simpan Data Prestasi' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
