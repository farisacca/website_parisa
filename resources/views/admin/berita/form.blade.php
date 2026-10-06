```php
@extends('layouts.app')

@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0">
                    {{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}
                </h4>
            </div>

            <div class="card-body">

                <form
                    action="{{ isset($berita)
                        ? route('admin.berita.save', Crypt::encrypt($berita->id_berita))
                        : route('admin.berita.save') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    {{-- Judul --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Judul Berita
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            maxlength="50"
                            value="{{ old('judul', $berita->judul ?? '') }}"
                            placeholder="Masukkan judul berita"
                            required>

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Isi --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Isi Berita
                        </label>

                        <textarea
                            name="isi"
                            rows="6"
                            class="form-control @error('isi') is-invalid @enderror"
                            placeholder="Masukkan isi berita"
                            required>{{ old('isi', $berita->isi ?? '') }}</textarea>

                        @error('isi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Tanggal Publikasi
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $berita->tanggal ?? '') }}"
                            required>

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Status --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
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

                    {{-- Gambar --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Gambar
                        </label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control @error('gambar') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png">

                        <small class="text-muted">
                            Format JPG/PNG, maksimal 2MB.
                        </small>

                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Gambar lama --}}
                    @if(isset($berita) && $berita->gambar)

                        <div class="mb-3">

                            <label class="form-label">
                                Gambar Saat Ini
                            </label>

                            <br>

                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                width="180"
                                class="rounded">

                        </div>

                    @endif

                    {{-- Tombol --}}
                    <div class="mt-4">

                        <button
                            type="submit"
                            class="btn btn-success">

                            <i class="bi bi-save"></i>
                            Simpan

                        </button>

                        <a
                            href="{{ route('admin.berita.index') }}"
                            class="btn btn-secondary">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection

