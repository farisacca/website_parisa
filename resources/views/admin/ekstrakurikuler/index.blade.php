@extends('layouts.app')

@section('title', 'Data Ekstrakurikuler')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title mb-0">
                            Data Ekstrakurikuler
                        </h4>

                        <a href="{{ route('admin.ekstrakurikuler.addEdit') }}"
                            class="btn btn-info">

                            <i class="fa fa-plus"></i>
                            Tambah Ekstrakurikuler

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

                                    <th class="text-center">
                                        Gambar
                                    </th>

                                    <th>
                                        Nama Ekstrakurikuler
                                    </th>

                                    <th>
                                        Guru Pembina
                                    </th>

                                    <th>
                                        Jadwal Latihan
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($ekstrakurikuler as $item)

                                <tr>

                                    {{-- No --}}
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- Gambar --}}
                                    <td class="text-center">

                                        @if ($item->gambar && file_exists(public_path('storage/' . $item->gambar)))

                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                alt="{{ $item->nama_eskul }}"
                                                width="70"
                                                height="50"
                                                class="rounded"
                                                style="object-fit: cover;">

                                        @else

                                            <div class="bg-light rounded d-inline-flex align-items-center justify-content-center"
                                                style="width:70px; height:50px;">

                                                <i class="fa fa-image text-muted"></i>

                                            </div>

                                        @endif

                                    </td>

                                    {{-- Nama --}}
                                    <td>

                                        <strong>
                                            {{ $item->nama_eskul }}
                                        </strong>

                                    </td>

                                    {{-- Guru Pembina --}}
                                    <td>

                                        {{ $item->guru->nama_guru ?? '-' }}

                                    </td>

                                    {{-- Jadwal --}}
                                    <td>

                                        {{ $item->jadwal_latihan }}

                                    </td>

                                    {{-- Aksi --}}
                                    <td class="text-center">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.ekstrakurikuler.show', Crypt::encrypt($item->id_eskul)) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail">

                                            <i class="fa fa-eye"></i>

                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($item->id_eskul)) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <i class="fa fa-pencil"></i>

                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.ekstrakurikuler.delete', Crypt::encrypt($item->id_eskul)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')">

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

                                        Belum ada data ekstrakurikuler.

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