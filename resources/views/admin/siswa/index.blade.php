@extends('layouts.app')

@section('title', 'Kelola Siswa')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title mb-0">
                            Daftar Siswa
                        </h4>

                        <a href="{{ route('admin.siswa.addEdit') }}"
                            class="btn btn-info">

                            <i class="fa fa-plus"></i>
                            Tambah Siswa

                        </a>

                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">

                        <table id="zero_config"
                            class="table table-striped table-bordered no-wrap"
                            style="width:100%">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th>
                                        NIS
                                    </th>

                                    <th>
                                        Nama Siswa
                                    </th>

                                    <th class="text-center">
                                        Jenis Kelamin
                                    </th>

                                    <th class="text-center">
                                        Tahun Masuk
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($siswa as $item)

                                <tr>

                                    {{-- No --}}
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- NIS --}}
                                    <td>
                                        {{ $item->nis }}
                                    </td>

                                    {{-- Nama --}}
                                    <td>
                                        <strong>
                                            {{ $item->nama_siswa }}
                                        </strong>
                                    </td>

                                    {{-- Jenis Kelamin --}}
                                    <td class="text-center">

                                        @if ($item->jenis_kelamin == 'Laki-laki')

                                            <span class="badge badge-info">
                                                Laki-laki
                                            </span>

                                        @elseif ($item->jenis_kelamin == 'Perempuan')

                                            <span class="badge badge-success">
                                                Perempuan
                                            </span>

                                        @else

                                            <span class="badge badge-secondary">
                                                -
                                            </span>

                                        @endif

                                    </td>

                                    {{-- Tahun Masuk --}}
                                    <td class="text-center">
                                        {{ $item->tahun_masuk }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="text-center">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.siswa.show', Crypt::encrypt($item->id_siswa)) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail">

                                            <i class="fa fa-eye"></i>

                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.siswa.addEdit', Crypt::encrypt($item->id_siswa)) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <i class="fa fa-pencil"></i>

                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.siswa.delete', Crypt::encrypt($item->id_siswa)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus">

                                                <i class="fa fa-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        Belum ada data siswa.

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection