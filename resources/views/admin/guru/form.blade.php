@extends('layouts.app')

@section('title', isset($guru) ? 'Edit Guru' : 'Tambah Guru')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title mb-0">
                    {{ isset($guru) ? 'Form Edit Data Guru' : 'Form Tambah Data Guru' }}
                </h4>
            </div>

            <form action="{{ route('admin.guru.save', isset($guru) ? Crypt::encrypt($guru->id_guru) : null) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="form-body">

                    {{-- NAMA GURU --}}
                    <div class="form-group row">

                        <label for="nama_guru"
                            class="col-md-3 text-right control-label col-form-label">
                            Nama Lengkap Guru
                            <span class="text-danger">*</span>
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
                    <div class="form-group row">

                        <label for="nip"
                            class="col-md-3 text-right control-label col-form-label">
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
                    <div class="form-group row">

                        <label for="mapel"
                            class="col-md-3 text-right control-label col-form-label">
                            Mata Pelajaran
                            <span class="text-danger">*</span>
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


                    {{-- FOTO --}}
                    <div class="form-group row">

                        <label for="foto"
                            class="col-md-3 text-right control-label col-form-label">
                            Foto Guru
                        </label>

                        <div class="col-md-9">

                            <input type="file"
                                class="form-control @error('foto') is-invalid @enderror"
                                id="foto"
                                name="foto"
                                accept="image/jpeg,image/png,image/jpg">

                            <small class="form-text text-muted">
                                Format JPG, JPEG, PNG. Maksimal 2MB.
                            </small>

                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                            {{-- FOTO LAMA --}}
                            @if (isset($guru) && $guru->foto && file_exists(public_path('storage/' . $guru->foto)))

                                <div class="mt-3">

                                    <p class="mb-2">
                                        <strong>Foto Saat Ini:</strong>
                                    </p>

                                    <img src="{{ asset('storage/' . $guru->foto) }}"
                                        alt="{{ $guru->nama_guru }}"
                                        class="rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">

                                </div>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- FORM ACTIONS --}}
                <div class="form-actions">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-3"></div>

                            <div class="col-md-9">

                                <a href="{{ route('admin.guru.index') }}"
                                    class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i>
                                    Kembali
                                </a>

                                <button type="submit"
                                    class="btn btn-info">
                                    <i class="fa fa-save"></i>

                                    {{ isset($guru) ? 'Simpan Perubahan' : 'Simpan Data Guru' }}

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection