@extends('layouts.app')

@section('title', isset($ekstrakurikuler->id_eskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">

            {{-- HEADER --}}
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0 text-white font-weight-bold">
                    <i class="fa {{ isset($ekstrakurikuler->id_eskul) ? 'fa-pencil-alt' : 'fa-plus' }} mr-2"></i>
                    {{ isset($ekstrakurikuler->id_eskul) ? 'Form Edit Data Ekstrakurikuler' : 'Form Tambah Data Ekstrakurikuler Baru' }}
                </h4>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.ekstrakurikuler.save', isset($ekstrakurikuler->id_eskul) ? Crypt::encrypt($ekstrakurikuler->id_eskul) : null) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body p-4">
                    <div class="form-body">

                        {{-- NAMA EKSTRAKURIKULER --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="nama_eskul" class="col-md-3 col-form-label font-weight-semibold">
                                Nama Ekstrakurikuler
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('nama_eskul') is-invalid @enderror"
                                    id="nama_eskul"
                                    name="nama_eskul"
                                    value="{{ old('nama_eskul', $ekstrakurikuler->nama_eskul ?? '') }}"
                                    placeholder="Masukkan nama ekstrakurikuler"
                                    required>
                                @error('nama_eskul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- GURU PEMBINA --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="id_guru" class="col-md-3 col-form-label font-weight-semibold">
                                Guru Pembina
                            </label>
                            <div class="col-md-9">
                                <select name="id_guru"
                                    id="id_guru"
                                    class="form-control custom-select @error('id_guru') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Guru Pembina --</option>
                                    @foreach ($guru as $g)
                                        <option value="{{ $g->id_guru }}"
                                            {{ old('id_guru', $ekstrakurikuler->id_guru ?? '') == $g->id_guru ? 'selected' : '' }}>
                                            {{ $g->nama_guru }}
                                            @if ($g->mapel)
                                                - {{ $g->mapel }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_guru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- JADWAL LATIHAN --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="jadwal_latihan" class="col-md-3 col-form-label font-weight-semibold">
                                Jadwal Latihan
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('jadwal_latihan') is-invalid @enderror"
                                    id="jadwal_latihan"
                                    name="jadwal_latihan"
                                    value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan ?? '') }}"
                                    placeholder="Contoh: Jumat, 15.00 - 17.00"
                                    required>
                                @error('jadwal_latihan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- GAMBAR --}}
                        <div class="form-group row mb-3">
                            <label for="gambar" class="col-md-3 col-form-label font-weight-semibold">
                                Gambar
                            </label>
                            <div class="col-md-9">
                                @if(!empty($ekstrakurikuler->gambar))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="{{ $ekstrakurikuler->nama_eskul }}" class="img-thumbnail" style="max-height: 150px;">
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
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi ekstrakurikuler" required>{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
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
                    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> {{ isset($ekstrakurikuler->id_eskul) ? 'Simpan Perubahan' : 'Simpan Data Ekstrakurikuler' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection