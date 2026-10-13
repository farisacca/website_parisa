@extends('layouts.app')

@section('title', isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">

            {{-- HEADER --}}
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0 text-white font-weight-bold">
                    <i class="fa {{ isset($siswa) ? 'fa-pencil-alt' : 'fa-plus' }} mr-2"></i>
                    {{ isset($siswa) ? 'Form Edit Data Siswa' : 'Form Tambah Data Siswa Baru' }}
                </h4>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.siswa.save', isset($siswa) ? Crypt::encrypt($siswa->id) : null) }}"
                method="POST">
                @csrf

                <div class="card-body p-4">
                    <div class="form-body">

                        {{-- NISN --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="nisn" class="col-md-3 col-form-label font-weight-semibold">
                                NISN <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
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

                        {{-- NAMA SISWA --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="nama_siswa" class="col-md-3 col-form-label font-weight-semibold">
                                Nama Siswa <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="nama_siswa"
                                    name="nama"
                                    value="{{ old('nama', $siswa->nama ?? '') }}"
                                    placeholder="Masukkan nama lengkap siswa"
                                    required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- KELAS --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="id_kelas" class="col-md-3 col-form-label font-weight-semibold">
                                Kelas <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="id_kelas"
                                    id="id_kelas"
                                    class="form-control custom-select @error('id_kelas') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach($kelas as $k)
                                        <option value="{{ $k->id_kelas }}"
                                            {{ old('id_kelas', $siswa->id_kelas ?? '') == $k->id_kelas ? 'selected' : '' }}>
                                            {{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="jenis_kelamin" class="col-md-3 col-form-label font-weight-semibold">
                                Jenis Kelamin <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="jenis_kelamin"
                                    id="jenis_kelamin"
                                    class="form-control custom-select @error('jenis_kelamin') is-invalid @enderror"
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

                        {{-- TAHUN MASUK --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="tahun_masuk" class="col-md-3 col-form-label font-weight-semibold">
                                Tahun Masuk <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
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
                </div>

                {{-- FOOTER / ACTIONS --}}
                <div class="card-footer bg-light text-right py-3">
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> {{ isset($siswa) ? 'Simpan Perubahan' : 'Simpan Data Siswa' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection