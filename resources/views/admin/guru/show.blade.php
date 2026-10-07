@extends('layouts.app')

@section('title', 'Detail Guru')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <i class="fa fa-user"></i>Detail Guru
                    </h4>
                </div>
            </div>

            <div class="card-body">
                <div class="text-center mb-4">
                    @if ($guru->foto && file_exists(public_path('storage/' . $guru->foto)))
                        <img src="{{ asset('storage/' . $guru->foto) }}"
                            alt="{{ $guru->nama_guru }}"
                            class="rounded-circle"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    @else
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 120px; height: 120px;">
                            <i class="fa fa-user text-muted"
                                style="font-size: 50px;"></i>
                        </div>
                    @endif

                    <h4 class="mt-3 mb-1">{{ $guru->nama_guru }}</h4>
                    <span class="badge badge-info">
                        {{ $guru->mapel }}
                    </span>

                </div>


                {{-- INFO GURU --}}
                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead class="bg-info text-white">

                            <tr>
                                <th colspan="2">
                                    Informasi Guru
                                </th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <th style="width: 30%;">
                                    Nama Guru
                                </th>

                                <td>
                                    {{ $guru->nama_guru }}
                                </td>

                            </tr>


                            <tr>

                                <th>
                                    NIP
                                </th>

                                <td>
                                    {{ $guru->nip ?? '-' }}
                                </td>

                            </tr>


                            <tr>

                                <th>
                                    Mata Pelajaran
                                </th>

                                <td>
                                    {{ $guru->mapel }}
                                </td>

                            </tr>


                            <tr>

                                <th>
                                    Foto
                                </th>

                                <td>

                                    @if ($guru->foto)

                                        {{ $guru->foto }}

                                    @else

                                        -

                                    @endif

                                </td>

                            </tr>


                            <tr>

                                <th>
                                    Tanggal Ditambahkan
                                </th>

                                <td>
                                    {{ $guru->created_at ? $guru->created_at->format('d F Y, H:i') : '-' }}
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="card-footer">

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('admin.guru.index') }}"
                        class="btn btn-secondary">

                        <i class="fa fa-arrow-left"></i>
                        Kembali

                    </a>


                    <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($guru->id_guru)) }}"
                        class="btn btn-warning">

                        <i class="fa fa-pencil"></i>
                        Edit Data Guru

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection