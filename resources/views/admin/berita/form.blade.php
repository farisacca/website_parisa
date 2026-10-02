@extends('layouts.app')

@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">

            {{-- Header --}}
            <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0">
                    <i class="fa fa-newspaper-o me-1"></i>
                    {{ isset($berita) ? 'Form Edit Berita' : 'Form Tulis Berita Baru' }}
                </h4>
            </div>

            <form action="{{ route('admin.berita.save', isset($berita) ? Crypt::encrypt($berita->id_berita) : null) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                    {{-- Judul --}}
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-3 col-form-label">
                            Judul Berita <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text"
                                   id="judul"
                                   name="judul"
                                   maxlength="50"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $berita->judul ?? '') }}"
                                   placeholder="Masukkan judul berita"
                                   required>

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                Maksimal 50 karakter.
                            </small>
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div class="form-group row mb-3">
                        <label for="tanggal" class="col-md-3 col-form-label">
                            Tanggal Berita <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="date"
                                   id="tanggal"
                                   name="tanggal"
                                   class="form-control @error('tanggal') is-invalid @enderror"
                                   value="{{ old('tanggal', $berita->tanggal ?? date('Y-m-d')) }}"
                                   required>

                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="form-group row mb-3">
                        <label for="status" class="col-md-3 col-form-label">
                            Status <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <select id="status"
                                    name="status"
                                    class="form-control @error('status') is-invalid @enderror"
                                    required>

                                <option value="">
                                    -- Pilih Status --
                                </option>

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

                    {{-- Gambar --}}
                    <div class="form-group row mb-3">
                        <label for="gambar" class="col-md-3 col-form-label">
                            {{ isset($berita) ? 'Ganti Gambar' : 'Gambar Berita' }}
                        </label>

                        <div class="col-md-9">
                            <input type="file"
                                   id="gambar"
                                   name="gambar"
                                   accept="image/*"
                                   class="form-control @error('gambar') is-invalid @enderror">

                            <small class="text-muted">
                                Format JPG, JPEG, PNG. Maksimal 2 MB.
                                {{ isset($berita) ? 'Kosongkan jika tidak ingin mengganti gambar.' : '' }}
                            </small>

                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            @if (isset($berita) && $berita->gambar && file_exists(public_path('storage/' . $berita->gambar)))
                                <div class="mt-3">
                                    <p class="mb-2 text-muted">Gambar Saat Ini:</p>

                                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                                         alt="{{ $berita->judul }}"
                                         style="width: 180px; height: 110px; object-fit: cover;"
                                         class="rounded border">
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Isi Berita --}}
                    <div class="form-group row mb-3">
                        <label for="isi" class="col-md-3 col-form-label">
                            Isi Berita <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <textarea id="isi"
                                      name="isi"
                                      rows="8"
                                      class="form-control @error('isi') is-invalid @enderror"
                                      placeholder="Tuliskan isi berita secara lengkap..."
                                      required>{{ old('isi', $berita->isi ?? '') }}</textarea>

                            @error('isi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                {{-- Form Actions --}}
                <div class="card-footer">
                    <div class="form-actions">

                        <a href="{{ route('admin.berita.index') }}"
                           class="btn btn-secondary">
                            <i class="fa fa-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <button type="submit"
                                class="btn {{ isset($berita) ? 'btn-warning' : 'btn-info' }}">
                            <i class="fa fa-save me-1"></i>

                            {{ isset($berita)
                                ? 'Simpan Perubahan'
                                : 'Publikasikan Berita' }}
                        </button>

                    </div>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection
