@extends('layouts.app')

@section('title', 'Kelola Guru')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title mb-0">
                            Daftar Guru
                        </h4>

                        <a href="{{ route('admin.guru.addEdit') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>
                            Tambah Guru
                        </a>

                    </div>

                    <div class="table-responsive">

                        <table id="zero_config"
                            class="table table-striped table-bordered no-wrap"
                            style="width:100%">

                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Foto</th>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($guru as $item)

                                <tr>

                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="text-center">

                                        @if ($item->foto && file_exists(public_path('storage/' . $item->foto)))

                                            <img src="{{ asset('storage/' . $item->foto) }}"
                                                alt="{{ $item->nama_guru }}"
                                                class="rounded-circle"
                                                width="45"
                                                height="45"
                                                style="object-fit: cover;">

                                        @else

                                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center"
                                                style="width:45px; height:45px;">
                                                <i class="fa fa-user text-muted"></i>
                                            </div>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $item->nip ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->nama_guru }}
                                    </td>

                                    <td>
                                        {{ $item->mapel }}
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('admin.guru.show', Crypt::encrypt($item->id_guru)) }}"
                                            class="btn btn-info btn-sm"
                                            title="Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($item->id_guru)) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">
                                            {{-- <i class="bi bi-pencil-fill"></i> --}}
                                            <span style="font-size: 12px; color: #fff;">✎</span>
                                        </a>

                                        <form action="{{ route('admin.guru.delete', Crypt::encrypt($item->id_guru)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

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