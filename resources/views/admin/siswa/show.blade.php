@extends('layouts.app')

@section('title', 'Detail Siswa')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            {{-- HEADER --}}
            <div class="card-header">
                <h4 class="card-title mb-0">
                    <i class="fa fa-user"></i> Detail Siswa
                </h4>
            </div>

            {{-- BODY --}}
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead class="bg-info text-white">
                            <tr>
                                <th colspan="2">
                                    Informasi Siswa
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <th style="width: 30%;">
                                    NIS
                                </th>
                                <td>
                                    {{ $siswa->nisn ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Nama Siswa
                                </th>
                                <td>
                                    {{ $siswa->nama_siswa ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <td>
                                    @if ($siswa->jenis_kelamin == 'Laki-laki')

                                        <span class="badge badge-info">
                                            Laki-laki
                                        </span>

                                    @elseif ($siswa->jenis_kelamin == 'Perempuan')

                                        <span class="badge badge-danger">
                                            Perempuan
                                        </span>

                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Tahun Masuk
                                </th>
                                <td>
                                    {{ $siswa->tahun_masuk ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Tanggal Ditambahkan
                                </th>
                                <td>
                                    {{ $siswa->created_at
                                        ? $siswa->created_at->format('d F Y, H:i')
                                        : '-' }}
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer">

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('admin.siswa.index') }}"
                        class="btn btn-secondary">

                        <i class="fa fa-arrow-left"></i>
                        Kembali

                    </a>

                    <a href="{{ route('admin.siswa.addEdit', Crypt::encrypt($siswa->id_siswa)) }}"
                        class="btn btn-warning">

                        <i class="fa fa-pencil"></i>
                        Edit Data Siswa

                    </a>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection
