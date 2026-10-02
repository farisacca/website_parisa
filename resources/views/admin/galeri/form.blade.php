@extends('layouts.app')

@section('title', isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header bg-info">
                <h5 class="mb-0 text-white">
                    <i class="fa fa-{{ isset($galeri) ? 'edit' : 'plus' }} me-2"></i>
                    {{ isset($galeri) ? 'Form Edit Dokumentasi Galeri' : 'Form Tambah Dokumentasi Galeri' }}
                </h5>
            </div>

            <form action="{{ route('admin.galeri.save', isset($galeri) ? Crypt::encrypt($galeri->id_galeri) : null) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    {{-- Judul --}}
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-3 col-form-label">
                            Judul Kegiatan / Dokumentasi
                            <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text"
                                name="judul"
                                id="judul"
                                maxlength="50"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $galeri->judul ?? '') }}"
                                placeholder="Masukkan judul dokumentasi"
                                required>

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="form-text text-muted">
                                Maksimal 50 karakter.
                            </small>
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="form-group row mb-3">
                        <label for="kategori" class="col-md-3 col-form-label">
                            Kategori Media
                            <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <select name="kategori"
                                id="kategori"
                                class="form-control @error('kategori') is-invalid @enderror"
                                required>

                                <option value="">-- Pilih Kategori --</option>

                                <option value="Foto"
                                    {{ old('kategori', $galeri->kategori ?? '') == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>

                                <option value="Video"
                                    {{ old('kategori', $galeri->kategori ?? '') == 'Video' ? 'selected' : '' }}>
                                    Video
                                </option>
                            </select>

                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div class="form-group row mb-3">
                        <label for="tanggal" class="col-md-3 col-form-label">
                            Tanggal Dokumentasi
                            <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="date"
                                name="tanggal"
                                id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', isset($galeri) ? $galeri->tanggal : date('Y-m-d')) }}"
                                required>

                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- File --}}
                    <div class="form-group row mb-3">
                        <label for="file" class="col-md-3 col-form-label">
                            {{ isset($galeri) ? 'Ganti File Dokumentasi' : 'File Dokumentasi' }}

                            @if (!isset($galeri))
                                <span class="text-danger">*</span>
                            @endif
                        </label>

                        <div class="col-md-9">
                            <input type="file"
                                name="file"
                                id="file"
                                class="form-control @error('file') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/jpg,video/mp4"
                                {{ !isset($galeri) ? 'required' : '' }}>

                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="form-text text-muted">
                                Format yang didukung: JPG, JPEG, PNG, MP4.
                                Maksimal 10MB.
                                @if (isset($galeri))
                                    Biarkan kosong jika file tidak ingin diganti.
                                @endif
                            </small>

                            {{-- File lama --}}
                            @if (isset($galeri) && $galeri->file && file_exists(public_path('storage/' . $galeri->file)))
                                <div class="mt-3">
                                    <label class="d-block text-muted mb-2">
                                        File saat ini:
                                    </label>

                                    @if ($galeri->kategori == 'Video')
                                        <video controls
                                            style="width: 250px; max-height: 150px;"
                                            class="rounded border">
                                            <source src="{{ asset('storage/' . $galeri->file) }}"
                                                type="video/mp4">
                                        </video>
                                    @else
                                        <img src="{{ asset('storage/' . $galeri->file) }}"
                                            alt="{{ $galeri->judul }}"
                                            class="rounded border"
                                            style="width: 250px; height: 150px; object-fit: cover;">
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="form-group row mb-3">
                        <label for="keterangan" class="col-md-3 col-form-label">
                            Keterangan
                        </label>

                        <div class="col-md-9">
                            <textarea name="keterangan"
                                id="keterangan"
                                rows="4"
                                class="form-control @error('keterangan') is-invalid @enderror"
                                placeholder="Masukkan keterangan dokumentasi">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>

                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.galeri.index') }}"
                            class="btn btn-dark">
                            <i class="fa fa-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <button type="submit"
                            class="btn {{ isset($galeri) ? 'btn-warning' : 'btn-info' }}">
                            <i class="fa fa-save me-1"></i>
                            {{ isset($galeri) ? 'Simpan Perubahan' : 'Simpan Dokumentasi' }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection