@extends('layouts.app')

@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">

            {{-- HEADER --}}
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0 text-white font-weight-bold">
                    <i class="fa {{ isset($berita) ? 'fa-pencil-alt' : 'fa-plus' }} mr-2"></i>
                    {{ isset($berita) ? 'Form Edit Berita' : 'Form Tambah Berita Baru' }}
                </h4>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.berita.save', isset($berita) ? Crypt::encrypt($berita->id_berita) : null) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body p-4">
                    <div class="form-body">

                        {{-- JUDUL BERITA --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="judul" class="col-md-3 col-form-label font-weight-semibold">
                                Judul Berita <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    id="judul"
                                    name="judul"
                                    value="{{ old('judul', $berita->judul ?? '') }}"
                                    placeholder="Masukkan judul berita (maksimal 50 karakter)"
                                    maxlength="50"
                                    required>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- TANGGAL --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="tanggal" class="col-md-3 col-form-label font-weight-semibold">
                                Tanggal Berita <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="date"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal"
                                    name="tanggal"
                                    value="{{ old('tanggal', $berita->tanggal ?? date('Y-m-d')) }}"
                                    required>
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- STATUS --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="status" class="col-md-3 col-form-label font-weight-semibold">
                                Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="status"
                                    id="status"
                                    class="form-control custom-select @error('status') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="draf"
                                        {{ old('status', $berita->status ?? '') == 'draf' ? 'selected' : '' }}>
                                        Draf
                                    </option>
                                    <option value="publis"
                                        {{ old('status', $berita->status ?? '') == 'publis' ? 'selected' : '' }}>
                                        Publis
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- GAMBAR --}}
                        <div class="form-group row mb-3">
                            <label for="gambar" class="col-md-3 col-form-label font-weight-semibold">
                                Gambar Berita
                            </label>
                            <div class="col-md-9">
                                @if(isset($berita) && $berita->gambar)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file"
                                    class="form-control-file @error('gambar') is-invalid @enderror"
                                    id="gambar"
                                    name="gambar"
                                    accept="image/*">
                                <small class="form-text text-muted">Format: JPG, JPEG, PNG. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                @error('gambar')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- ISI BERITA --}}
                        <div class="form-group row mb-3">
                            <label for="isi" class="col-md-3 col-form-label font-weight-semibold">
                                Isi Berita <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <textarea name="isi" id="isi" rows="8" class="form-control @error('isi') is-invalid @enderror" placeholder="Tuliskan isi berita..." required>{{ old('isi', $berita->isi ?? '') }}</textarea>
                                @error('isi')
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
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> {{ isset($berita) ? 'Simpan Perubahan' : 'Simpan Berita' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection