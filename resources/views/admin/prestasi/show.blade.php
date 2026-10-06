@extends('layouts.app')

@section('title', 'Detail Prestasi')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card mb-4">

            {{-- Header --}}
            <div class="card-header bg-info">

                <div class="d-flex justify-content-between align-items-center">

                    <h5 class="mb-0 text-white">

                        <i class="fa fa-trophy me-2"></i>

                        Detail Prestasi

                    </h5>

                    <a href="{{ route('admin.prestasi.index') }}"
                        class="btn btn-dark btn-sm">

                        <i class="fa fa-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </div>

            {{-- Body --}}
            <div class="card-body">

                {{-- Icon Prestasi --}}
                <div class="text-center mb-4">

                    <div class="d-inline-flex align-items-center justify-content-center bg-info rounded-circle"
                        style="width:100px; height:100px;">

                        <i class="fa fa-trophy text-white fa-3x"></i>

                    </div>

                </div>

                {{-- Nama Prestasi --}}
                <h4 class="text-center mb-4">

                    {{ $prestasi->nama_prestasi }}

                </h4>

                {{-- Informasi --}}
                <div class="table-responsive">

                    <table class="table table-bordered">

                        <tbody>

                            {{-- Pemenang --}}
                            <tr>

                                <th class="bg-info text-white"
                                    style="width:30%;">

                                    Pemenang

                                </th>

                                <td>

                                    <i class="fa fa-user me-1"></i>

                                    {{ $prestasi->pemenang }}

                                </td>

                            </tr>

                            {{-- Event --}}
                            <tr>

                                <th class="bg-info text-white">

                                    Event / Kejuaraan

                                </th>

                                <td>

                                    <i class="fa fa-star me-1"></i>

                                    {{ $prestasi->event }}

                                </td>

                            </tr>

                            {{-- Tingkat --}}
                            <tr>

                                <th class="bg-info text-white">

                                    Tingkat

                                </th>

                                <td>

                                    <span class="badge badge-info">

                                        {{ $prestasi->tingkat }}

                                    </span>

                                </td>

                            </tr>

                            {{-- Kategori --}}
                            <tr>

                                <th class="bg-info text-white">

                                    Kategori

                                </th>

                                <td>

                                    <span class="badge badge-success">

                                        {{ $prestasi->kategori }}

                                    </span>

                                </td>

                            </tr>

                            {{-- Tahun --}}
                            <tr>

                                <th class="bg-info text-white">

                                    Tahun

                                </th>

                                <td>

                                    <i class="fa fa-calendar me-1"></i>

                                    {{ $prestasi->tahun }}

                                </td>

                            </tr>

                            {{-- Deskripsi --}}
                            <tr>

                                <th class="bg-info text-white">

                                    Deskripsi

                                </th>

                                <td style="white-space: pre-line;">

                                    {{ $prestasi->deskripsi ?? 'Tidak ada deskripsi.' }}

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Footer --}}
            <div class="card-footer">

                <div class="d-flex justify-content-between">

                    <a href="{{ route('admin.prestasi.index') }}"
                        class="btn btn-dark">

                        <i class="fa fa-arrow-left me-1"></i>
                        Kembali

                    </a>

                    <a href="{{ route('admin.prestasi.addEdit', Crypt::encrypt($prestasi->id_prestasi)) }}"
                        class="btn btn-warning">

                        <i class="fa fa-pencil me-1"></i>
                        Edit Prestasi

                    </a>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection
