@extends('layouts.app')

@section('title', isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title mb-0">
                    <i class="fa {{ isset($siswa) ? 'fa-pencil' : 'fa-plus' }}"></i>

                    {{ isset($siswa) ? 'Form Edit Data Siswa' : 'Form Tambah Data Siswa Baru' }}
                </h4>
            </div>

            <form action="{{ route('admin.siswa.save', isset($siswa) ? Crypt::encrypt($siswa->id_siswa) : null) }}"
                method="POST">

                @csrf

                <div class="card-body">

                    {{-- NIS --}}
                    <div class="row mb-3">

                        <label for="nis" class="col-sm-3 text-end col-form-label">
                            NISN <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">

                            <input type="text"
                                class="form-control @error('nisn') is-invalid @enderror"
                                id="nisn"
                                name="nisn"
                                value="{{ old('nisn', $siswa->nisn ?? '') }}"
                                placeholder="Masukkan NISN"
                                required>

                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Nama Siswa --}}
                    <div class="row mb-3">

                        <label for="nama_siswa" class="col-sm-3 text-end col-form-label">
                            Nama Siswa <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">

                            <input type="text"
                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                id="nama_siswa"
                                name="nama_siswa"
                                value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}"
                                placeholder="Masukkan nama lengkap siswa"
                                required>

                            @error('nama_siswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="row mb-3">

                        <label for="jenis_kelamin" class="col-sm-3 text-end col-form-label">
                            Jenis Kelamin <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">

                            <select name="jenis_kelamin"
                                id="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                required>

                                <option value="">-- Pilih Jenis Kelamin --</option>

                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>

                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Tahun Masuk --}}
                    <div class="row mb-3">

                        <label for="tahun_masuk" class="col-sm-3 text-end col-form-label">
                            Tahun Masuk <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">

                            <input type="number"
                                class="form-control @error('tahun_masuk') is-invalid @enderror"
                                id="tahun_masuk"
                                name="tahun_masuk"
                                value="{{ old('tahun_masuk', $siswa->tahun_masuk ?? '') }}"
                                placeholder="Contoh: 2024"
                                min="2000"
                                max="2100"
                                required>

                            @error('tahun_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <div class="card-footer">

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="{{ route('admin.siswa.index') }}"
                            class="btn btn-secondary">

                            <i class="fa fa-arrow-left"></i>
                            Kembali

                        </a>

                        <button type="submit"
                            class="btn {{ isset($siswa) ? 'btn-warning' : 'btn-info' }}">

                            <i class="fa fa-save"></i>

                            {{ isset($siswa) ? 'Simpan Perubahan' : 'Simpan Data Siswa' }}

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection
