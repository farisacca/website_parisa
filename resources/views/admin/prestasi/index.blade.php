@extends('layouts.app')

@section('title', 'Kelola Prestasi')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title mb-0">
                            Daftar Prestasi
                        </h4>

                        <a href="{{ route('admin.prestasi.addEdit') }}"
                            class="btn btn-info">

                            <i class="fa fa-plus"></i>
                            Tambah Prestasi

                        </a>

                    </div>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered no-wrap align-middle" style="width:100%">
                            <thead class="bg-primary text-white">

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th>
                                        Nama Prestasi
                                    </th>

                                    <th>
                                        Pemenang
                                    </th>

                                    <th>
                                        Event
                                    </th>

                                    <th class="text-center">
                                        Tingkat
                                    </th>

                                    <th class="text-center">
                                        Kategori
                                    </th>

                                    <th class="text-center">
                                        Tahun
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($prestasi as $item)

                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        <strong>
                                            {{ $item->nama_prestasi }}
                                        </strong>

                                        @if ($item->deskripsi)

                                            <br>

                                            <small class="text-muted">
                                                {{ Str::limit($item->deskripsi, 60) }}
                                            </small>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $item->pemenang }}
                                    </td>

                    
                                    <td>
                                        {{ $item->event }}
                                    </td>

                            
                                    <td class="text-center">

                                        <span class="badge badge-info">
                                            {{ $item->tingkat }}
                                        </span>

                                    </td>

                                    {{-- Kategori --}}
                                    <td class="text-center">

                                        <span class="badge badge-success">
                                            {{ $item->kategori }}
                                        </span>

                                    </td>

                                    {{-- Tahun --}}
                                    <td class="text-center">

                                        <i class="fa fa-calendar"></i>
                                        {{ $item->tahun }}

                                    </td>

                                    {{-- Aksi --}}
                                    <td class="text-center">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.prestasi.show', Crypt::encrypt($item->id_prestasi)) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail">

                                            <i class="fa fa-eye"></i>

                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.prestasi.addEdit', Crypt::encrypt($item->id_prestasi)) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <span style="font-size: 12px; color: #fff;">
                                                ✎
                                            </span>

                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.prestasi.delete', Crypt::encrypt($item->id_prestasi)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')">

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

                                    <td colspan="8" class="text-center">

                                        Belum ada data prestasi.

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
