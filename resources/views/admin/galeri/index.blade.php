@extends('layouts.app')

@section('title', 'Kelola Galeri')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title mb-0">
                            Daftar Dokumentasi Galeri
                        </h4>

                        <a href="{{ route('admin.galeri.addEdit') }}"
                            class="btn btn-info">

                            <i class="fa fa-plus"></i>
                            Tambah Galeri

                        </a>

                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap align-middle" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-center">
                                        Media
                                    </th>

                                    <th>
                                        Judul Dokumentasi
                                    </th>

                                    <th class="text-center">
                                        Kategori
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($galeri as $item)

                                <tr>

                                    {{-- No --}}
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- Media --}}
                                    <td class="text-center">

                                        @if ($item->kategori == 'Video')

                                            <div class="d-inline-flex align-items-center justify-content-center bg-dark rounded"
                                                style="width:70px; height:50px;">

                                                <i class="fa fa-play-circle text-white fa-2x"></i>

                                            </div>

                                        @elseif ($item->file && file_exists(public_path('storage/' . $item->file)))

                                            <img src="{{ asset('storage/' . $item->file) }}"
                                                alt="{{ $item->judul }}"
                                                class="rounded"
                                                width="70"
                                                height="50"
                                                style="object-fit:cover;">

                                        @else

                                            <div class="d-inline-flex align-items-center justify-content-center bg-light rounded"
                                                style="width:70px; height:50px;">

                                                <i class="fa fa-image text-muted"></i>

                                            </div>

                                        @endif

                                    </td>

                                    {{-- Judul --}}
                                    <td>

                                        <strong>
                                            {{ $item->judul }}
                                        </strong>

                                        @if ($item->keterangan)

                                            <br>

                                            <small class="text-muted">
                                                {{ Str::limit($item->keterangan, 60) }}
                                            </small>

                                        @endif

                                    </td>

                                    {{-- Kategori --}}
                                    <td class="text-center">

                                        @if ($item->kategori == 'Foto')

                                            <span class="badge badge-success">
                                                <i class="fa fa-camera"></i>
                                                Foto
                                            </span>

                                        @else

                                            <span class="badge badge-danger">
                                                <i class="fa fa-video-camera"></i>
                                                Video
                                            </span>

                                        @endif

                                    </td>

                                    {{-- Tanggal --}}
                                    <td>

                                        <i class="fa fa-calendar"></i>
                                        {{ date('d M Y', strtotime($item->tanggal)) }}

                                    </td>

                                    {{-- Aksi --}}
                                    <td class="text-center">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.galeri.show', Crypt::encrypt($item->id_galeri)) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail">

                                            <i class="fa fa-eye"></i>

                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.galeri.addEdit', Crypt::encrypt($item->id_galeri)) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">
                                            {{-- <i class="fa fa-pencil"></i> --}}
                                            <span style="font-size: 12px; color: #fff;">✎</span>

                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.galeri.delete', Crypt::encrypt($item->id_galeri)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">

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

                                        Belum ada data galeri.

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