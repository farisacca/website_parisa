@extends('layouts.app')

@section('title', isset($guru) ? 'Edit Guru' : 'Tambah Guru')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">

            {{-- HEADER --}}
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0 text-white font-weight-bold">
                    <i class="fa {{ isset($guru) ? 'fa-pencil-alt' : 'fa-plus' }} mr-2"></i>
                    {{ isset($guru) ? 'Form Edit Data Guru' : 'Form Tambah Data Guru' }}
                </h4>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.guru.save', isset($guru) ? Crypt::encrypt($guru->id_guru) : null) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body p-4">
                    <div class="form-body">

                        {{-- NAMA GURU --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="nama_guru" class="col-md-3 col-form-label font-weight-semibold">
                                Nama Lengkap Guru <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('nama_guru') is-invalid @enderror"
                                    id="nama_guru"
                                    name="nama_guru"
                                    value="{{ old('nama_guru', $guru->nama_guru ?? '') }}"
                                    placeholder="Contoh: Ahmad Fauzi, S.Kom."
                                    required>
                                @error('nama_guru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- NIP --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="nip" class="col-md-3 col-form-label font-weight-semibold">
                                NIP
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('nip') is-invalid @enderror"
                                    id="nip"
                                    name="nip"
                                    value="{{ old('nip', $guru->nip ?? '') }}"
                                    placeholder="Masukkan NIP">
                                <small class="form-text text-muted">
                                    Boleh dikosongkan jika guru tidak memiliki NIP.
                                </small>
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- MATA PELAJARAN --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="mapel" class="col-md-3 col-form-label font-weight-semibold">
                                Mata Pelajaran <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('mapel') is-invalid @enderror"
                                    id="mapel"
                                    name="mapel"
                                    value="{{ old('mapel', $guru->mapel ?? '') }}"
                                    placeholder="Contoh: Informatika"
                                    required>
                                @error('mapel')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- FOTO GURU --}}
                        <div class="form-group row mb-3">
                            <label for="foto" class="col-md-3 col-form-label font-weight-semibold">
                                Foto Guru
                            </label>
                            <div class="col-md-9">
                                <input type="file"
                                    class="form-control-file border rounded p-1 @error('foto') is-invalid @enderror"
                                    id="foto"
                                    name="foto"
                                    accept="image/jpeg,image/png,image/jpg">
                                <small class="form-text text-muted">
                                    Format JPG, JPEG, PNG. Maksimal 2MB.
                                </small>
                                @error('foto')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror

                                {{-- FOTO LAMA --}}
                                @if (isset($guru) && $guru->foto && file_exists(public_path('storage/' . $guru->foto)))
                                    <div class="mt-3">
                                        <p class="mb-2 font-weight-semibold">Foto Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $guru->foto) }}"
                                            alt="{{ $guru->nama_guru }}"
                                            class="rounded shadow-sm border"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                {{-- FORM ACTIONS --}}
                <div class="card-footer bg-light text-right py-3">
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> {{ isset($guru) ? 'Simpan Perubahan' : 'Simpan Data Guru' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection