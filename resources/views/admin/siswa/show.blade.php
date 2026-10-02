@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')

<div class="row">

    <div class="col-lg-8 col-md-10 mx-auto">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title mb-0">
                    <i class="fa fa-user"></i>
                    Detail Data Siswa
                </h4>
            </div>

            <div class="card-body">

                {{-- NIS --}}
                <div class="row mb-3">

                    <label class="col-sm-4 col-form-label fw-bold">
                        NISN
                    </label>

                    <div class="col-sm-8">

                        <p class="form-control-plaintext">
                            {{ $siswa->nisn }}
                        </p>

                    </div>

                </div>

                {{-- Nama --}}
                <div class="row mb-3">

                    <label class="col-sm-4 col-form-label fw-bold">
                        Nama Siswa
                    </label>

                    <div class="col-sm-8">

                        <p class="form-control-plaintext">
                            {{ $siswa->nama_siswa }}
                        </p>

                    </div>

                </div>

                {{-- Jenis Kelamin --}}
                <div class="row mb-3">

                    <label class="col-sm-4 col-form-label fw-bold">
                        Jenis Kelamin
                    </label>

                    <div class="col-sm-8">

                        <p class="form-control-plaintext">

                            @if ($siswa->jenis_kelamin == 'Laki-laki')

                                <span class="badge badge-info">
                                    Laki-laki
                                </span>

                            @elseif ($siswa->jenis_kelamin == 'Perempuan')

                                <span class="badge badge-success">
                                    Perempuan
                                </span>

                            @else

                                <span class="badge badge-secondary">
                                    -
                                </span>

                            @endif

                        </p>

                    </div>

                </div>

                {{-- Tahun Masuk --}}
                <div class="row mb-3">

                    <label class="col-sm-4 col-form-label fw-bold">
                        Tahun Masuk
                    </label>

                    <div class="col-sm-8">

                        <p class="form-control-plaintext">
                            {{ $siswa->tahun_masuk }}
                        </p>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <div class="d-flex justify-content-between">

                    <a href="{{ route('admin.siswa.index') }}"
                        class="btn btn-secondary">

                        <i class="fa fa-arrow-left"></i>
                        Kembali

                    </a>

                    <a href="{{ route('admin.siswa.addEdit', Crypt::encrypt($siswa->id_siswa)) }}"
                        class="btn btn-warning">

                        <i class="fa fa-pencil"></i>
                        Edit Siswa

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection