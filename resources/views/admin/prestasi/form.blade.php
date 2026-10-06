@extends('layouts.app')

@section('title', isset($prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header bg-info">
                <h5 class="mb-0 text-white">
                    <i class="fa fa-{{ isset($prestasi) ? 'edit' : 'plus' }} me-2"></i>
                    {{ isset($prestasi) ? 'Form Edit Prestasi' : 'Form Tambah Prestasi' }}
                </h5>
            </div>

            <form action="{{ route('admin.prestasi.save', isset($prestasi) ? Crypt::encrypt($prestasi->id_prestasi) : null) }}"
                method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row mb-3">

                        <label for="nama_prestasi"
                            class="col-md-3 col-form-label">

                            Nama Prestasi
                            <span class="text-danger">*</span>

                        </label>

                        <div class="col-md-9">

                            <input type="text"
                                name="nama_prestasi"
                                id="nama_prestasi"
                                class="form-control @error('nama_prestasi') is-invalid @enderror"
                                value="{{ old('nama_prestasi', $prestasi->nama_prestasi ?? '') }}"
                                placeholder="Contoh: Juara 1 Olimpiade Sains"
                                required>

                            @error('nama_prestasi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    {{-- Pemenang --}}
                    <div class="form-group row mb-3">

                        <label for="pemenang"
                            class="col-md-3 col-form-label">

                            Pemenang
                            <span class="text-danger">*</span>

                        </label>

                        <div class="col-md-9">

                            <input type="text"
                                name="pemenang"
                                id="pemenang"
                                class="form-control @error('pemenang') is-invalid @enderror"
                                value="{{ old('pemenang', $prestasi->pemenang ?? '') }}"
                                placeholder="Masukkan nama pemenang"
                                required>

                            @error('pemenang')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    {{-- Event --}}
                    <div class="form-group row mb-3">

                        <label for="event"
                            class="col-md-3 col-form-label">

                            Nama Event / Kejuaraan
                            <span class="text-danger">*</span>

                        </label>

                        <div class="col-md-9">

                            <input type="text"
                                name="event"
                                id="event"
                                class="form-control @error('event') is-invalid @enderror"
                                value="{{ old('event', $prestasi->event ?? '') }}"
                                placeholder="Masukkan nama event atau kejuaraan"
                                required>

                            @error('event')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    {{-- Tingkat --}}
                    <div class="form-group row mb-3">

                        <label for="tingkat"
                            class="col-md-3 col-form-label">

                            Tingkat Kejuaraan
                            <span class="text-danger">*</span>

                        </label>

                        <div class="col-md-9">

                            <select name="tingkat"
                                id="tingkat"
                                class="form-control @error('tingkat') is-invalid @enderror"
                                required>

                                <option value="">
                                    -- Pilih Tingkat --
                                </option>

                                <option value="Sekolah"
                                    {{ old('tingkat', $prestasi->tingkat ?? '') == 'Sekolah' ? 'selected' : '' }}>
                                    Sekolah
                                </option>

                                <option value="Kecamatan"
                                    {{ old('tingkat', $prestasi->tingkat ?? '') == 'Kecamatan' ? 'selected' : '' }}>
                                    Kecamatan
                                </option>

                                <option value="Kabupaten/Kota"
                                    {{ old('tingkat', $prestasi->tingkat ?? '') == 'Kabupaten/Kota' ? 'selected' : '' }}>
                                    Kabupaten/Kota
                                </option>

                                <option value="Provinsi"
                                    {{ old('tingkat', $prestasi->tingkat ?? '') == 'Provinsi' ? 'selected' : '' }}>
                                    Provinsi
                                </option>

                                <option value="Nasional"
                                    {{ old('tingkat', $prestasi->tingkat ?? '') == 'Nasional' ? 'selected' : '' }}>
                                    Nasional
                                </option>

                                <option value="Internasional"
                                    {{ old('tingkat', $prestasi->tingkat ?? '') == 'Internasional' ? 'selected' : '' }}>
                                    Internasional
                                </option>

                            </select>

                            @error('tingkat')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    {{-- Kategori --}}
                    <div class="form-group row mb-3">

                        <label for="kategori"
                            class="col-md-3 col-form-label">

                            Kategori
                            <span class="text-danger">*</span>

                        </label>

                        <div class="col-md-9">

                            <input type="text"
                                name="kategori"
                                id="kategori"
                                class="form-control @error('kategori') is-invalid @enderror"
                                value="{{ old('kategori', $prestasi->kategori ?? '') }}"
                                placeholder="Contoh: Akademik / Olahraga / Seni"
                                required>

                            @error('kategori')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    {{-- Tahun --}}
                    <div class="form-group row mb-3">

                        <label for="tahun"
                            class="col-md-3 col-form-label">

                            Tahun
                            <span class="text-danger">*</span>

                        </label>

                        <div class="col-md-9">

                            <input type="number"
                                name="tahun"
                                id="tahun"
                                min="1900"
                                max="2100"
                                class="form-control @error('tahun') is-invalid @enderror"
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

                    {{-- Deskripsi --}}
                    <div class="form-group row mb-3">

                        <label for="deskripsi"
                            class="col-md-3 col-form-label">

                            Deskripsi

                        </label>

                        <div class="col-md-9">

                            <textarea name="deskripsi"
                                id="deskripsi"
                                rows="5"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan deskripsi prestasi">{{ old('deskripsi', $prestasi->deskripsi ?? '') }}</textarea>

                            @error('deskripsi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer">

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('admin.prestasi.index') }}"
                            class="btn btn-dark">

                            <i class="fa fa-arrow-left me-1"></i>
                            Kembali

                        </a>

                        <button type="submit"
                            class="btn {{ isset($prestasi) ? 'btn-warning' : 'btn-info' }}">

                            <i class="fa fa-save me-1"></i>

                            {{ isset($prestasi) ? 'Simpan Perubahan' : 'Simpan Prestasi' }}

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection
