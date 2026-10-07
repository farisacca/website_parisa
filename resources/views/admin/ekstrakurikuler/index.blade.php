@extends('layouts.app')

@section('title', 'Kelola Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{-- Header & Tombol Tambah --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">
                            Daftar Ekstrakurikuler
                        </h4>

                        <a href="{{ route('admin.ekstrakurikuler.addEdit') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i> Tambah Ekstrakurikuler
                        </a>
                    </div>

                    {{-- Alert Flash Message --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    {{-- Data Table --}}
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap align-middle" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center" style="width: 50px;">No</th>
                                    <th class="text-center" style="width: 80px;">Gambar</th>
                                    <th>Nama Ekstrakurikuler</th>
                                    <th>Pembina / Pelatih</th>
                                    <th class="text-center">Jadwal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ekstrakurikuler as $item)
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

                                    {{-- Nama Ekstrakurikuler --}}
                                    <td>
                                        <strong>{{ $item->nama_eskul }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            {{ Str::limit(strip_tags($item->deskripsi), 50) }}
                                        </small>
                                    </td>

                                    {{-- Pembina --}}
                                    <td>
                                        <i class="fa fa-user text-info mr-1"></i>
                                        {{ $item->guru->nama_guru ?? ($item->pembina ?? '-') }}
                                    </td>

                                    {{-- Jadwal --}}
                                    <td class="text-center">
                                        <span class="badge badge-info px-2 py-1">
                                            <i class="fa fa-calendar"></i> {{ $item->jadwal_latihan ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- Status --}}
                                    <td class="text-center">
                                        @if (($item->status ?? 'Aktif') == 'Aktif')
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-warning">Non-Aktif</span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="text-center">
                                        <a href="{{ route('admin.ekstrakurikuler.show', Crypt::encrypt($item->id_eskul)) }}"
                                           class="btn btn-info btn-sm"
                                           title="Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($item->id_eskul)) }}"
                                           class="btn btn-warning btn-sm"
                                           title="Edit">
                                            <span style="font-size: 12px; color: #fff;">✎</span>
                                        </a>

                                        <form action="{{ route('admin.ekstrakurikuler.delete', Crypt::encrypt($item->id_eskul)) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus ekstrakurikuler ini?')">
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