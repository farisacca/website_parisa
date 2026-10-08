@extends('layouts.app')

@section('title', 'Kelola Siswa')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                        <h4 class="card-title mb-0">
                            Daftar Siswa
                        </h4>

                        <a href="{{ route('admin.siswa.addEdit') }}"
                            class="btn btn-primary">

                            <i data-feather="plus" class="mr-1"></i>
                            Tambah Siswa
                        </a>

                    </div>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap align-middle" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center" style="width: 50px;">
                                        No
                                    </th>

                                    <th>
                                        NISN
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

                                    <th class="text-center" style="width: 160px;">
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

                                    {{-- NISN --}}
                                    <td>
                                        {{ $item->nisn }}
                                    </td>

                                    {{-- Nama --}}
                                    <td>
                                        <strong class="text-dark">
                                            {{ $item->nama_siswa }}
                                        </strong>
                                    </td>

                                    {{-- Jenis Kelamin --}}
                                    <td class="text-center">

                                        @if ($item->jenis_kelamin == 'Laki-laki')

                                            <span class="badge badge-pill badge-info px-3 py-2">
                                                Laki-laki
                                            </span>

                                        @elseif ($item->jenis_kelamin == 'Perempuan')

                                            <span class="badge badge-pill badge-success px-3 py-2">
                                                Perempuan
                                            </span>

                                        @else

                                            <span class="badge badge-pill badge-secondary px-3 py-2">
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
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.siswa.show', Crypt::encrypt($item->id_siswa)) }}"
                                                class="btn btn-info btn-sm mr-1"
                                                title="Detail">

                                                <i data-feather="eye" style="width:14px; height:14px;"></i>

                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('admin.siswa.addEdit', Crypt::encrypt($item->id_siswa)) }}"
                                                class="btn btn-warning btn-sm text-white mr-1"
                                                title="Edit">

                                                <i data-feather="edit" style="width:14px; height:14px;"></i>

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

                                                    <i data-feather="trash-2" style="width:14px; height:14px;"></i>

                                                </button>

                                            </form>

                                        </div>

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
