@extends('layouts.app')

@section('title', 'Kelola Berita')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title mb-0">
                            Daftar Berita
                        </h4>

                        <a href="{{ route('admin.berita.addEdit') }}"
                            class="btn btn-info">

                            <i class="fa fa-plus"></i>
                            Tambah Berita

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
                                        Judul Berita
                                    </th>

                                    <th class="text-center">
                                        Tanggal
                                    </th>

                                    <th class="text-center">
                                        Status
                                    </th>

                                    <th>
                                        Penulis
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($berita as $item)

                                <tr>

                                    {{-- No --}}
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- Gambar --}}
                                    <td class="text-center">

                                        @if ($item->gambar && file_exists(public_path('storage/' . $item->gambar)))

                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                alt="{{ $item->judul }}"
                                                class="rounded"
                                                width="65"
                                                height="45"
                                                style="object-fit: cover;">

                                        @else

                                            <div class="bg-light rounded d-inline-flex align-items-center justify-content-center"
                                                style="width:65px; height:45px;">

                                                <i class="fa fa-image text-muted"></i>

                                            </div>

                                        @endif

                                    </td>

                                    {{-- Judul --}}
                                    <td>

                                        <strong>
                                            {{ $item->judul }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            {{ Str::limit(strip_tags($item->isi), 60) }}
                                        </small>

                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="text-center">

                                        {{ date('d-m-Y', strtotime($item->tanggal)) }}

                                    </td>

                                    {{-- Status --}}
                                    <td class="text-center">

                                        @if ($item->status == 'publis')

                                            <span class="badge badge-success">
                                                Publis
                                            </span>

                                        @else

                                            <span class="badge badge-warning">
                                                Draf
                                            </span>

                                        @endif

                                    </td>

                                    {{-- Penulis --}}
                                    <td>

                                        <i class="fa fa-user"></i>
                                        {{ $item->user->name ?? 'Admin' }}

                                    </td>

                                    {{-- Aksi --}}
                                    <td class="text-center">

                                        <a href="{{ route('admin.berita.show', Crypt::encrypt($item->id_berita)) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail">

                                            <i class="fa fa-eye"></i>

                                        </a>

                                        <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($item->id_berita)) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <i class="fa fa-pencil"></i>

                                        </a>

                                        <form action="{{ route('admin.berita.delete', Crypt::encrypt($item->id_berita)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">

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

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection