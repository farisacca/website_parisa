@extends('layouts.app')

@section('title', isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">

            {{-- HEADER --}}
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0 text-white font-weight-bold">
                    <i class="fa {{ isset($galeri) ? 'fa-pencil-alt' : 'fa-plus' }} mr-2"></i>
                    {{ isset($galeri) ? 'Form Edit Dokumentasi Galeri' : 'Form Tambah Dokumentasi Galeri Baru' }}
                </h4>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.galeri.save', isset($galeri) ? Crypt::encrypt($galeri->id_galeri) : null) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body p-4">
                    <div class="form-body">

                        {{-- JUDUL --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="judul" class="col-md-3 col-form-label font-weight-semibold">
                                Judul Kegiatan / Dokumentasi
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
                                <small class="form-text text-muted">Maksimal 50 karakter.</small>
                            </div>
                        </div>

                        {{-- KATEGORI --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="kategori" class="col-md-3 col-form-label font-weight-semibold">
                                Kategori Media
                            </label>
                            <div class="col-md-9">
                                <select name="kategori"
                                    id="kategori"
                                    class="form-control custom-select @error('kategori') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Foto" {{ old('kategori', $galeri->kategori ?? '') == 'Foto' ? 'selected' : '' }}>Foto</option>
                                    <option value="Video" {{ old('kategori', $galeri->kategori ?? '') == 'Video' ? 'selected' : '' }}>Video</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- TANGGAL --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="tanggal" class="col-md-3 col-form-label font-weight-semibold">
                                Tanggal Dokumentasi
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

                        {{-- FILE --}}
                        <div class="form-group row mb-3">
                            <label for="file" class="col-md-3 col-form-label font-weight-semibold">
                                {{ isset($galeri) ? 'Ganti File Dokumentasi' : 'File Dokumentasi' }}
                            </label>
                            <div class="col-md-9">
                                @if (isset($galeri) && $galeri->file && file_exists(public_path('storage/' . $galeri->file)))
                                    <div class="mb-2">
                                        @if ($galeri->kategori == 'Video')
                                            <video controls style="width: 250px; max-height: 150px;" class="rounded border">
                                                <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                                            </video>
                                        @else
                                            <img src="{{ asset('storage/' . $galeri->file) }}" alt="{{ $galeri->judul }}" class="rounded border" style="width: 250px; height: 150px; object-fit: cover;">
                                        @endif
                                    </div>
                                @endif
                                <input type="file"
                                    name="file"
                                    id="file"
                                    class="form-control-file @error('file') is-invalid @enderror"
                                    accept="image/jpeg,image/png,image/jpg,video/mp4"
                                    {{ !isset($galeri) ? 'required' : '' }}>
                                <small class="form-text text-muted">
                                    Format: JPG, JPEG, PNG, MP4. Maksimal 10MB.
                                    @if (isset($galeri))
                                        Biarkan kosong jika file tidak ingin diganti.
                                    @endif
                                </small>
                                @error('file')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="form-group row mb-3">
                            <label for="keterangan" class="col-md-3 col-form-label font-weight-semibold">
                                Keterangan
                            </label>
                            <div class="col-md-9">
                                <textarea name="keterangan" id="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan keterangan dokumentasi">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
                                @error('keterangan')
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
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> {{ isset($galeri) ? 'Simpan Perubahan' : 'Simpan Dokumentasi' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection