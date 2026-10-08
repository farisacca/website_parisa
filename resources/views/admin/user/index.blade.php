@extends('layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">

                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">
                            Daftar Pengguna
                        </h4>

                        <a href="{{ route('admin.user.addEdit') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>
                            Tambah Pengguna
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap align-middle" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($users as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>{{ $item->name }}</strong>
                                    </td>

                                    <td>{{ $item->username }}</td>

                                    <td>{{ $item->email }}</td>

                                    <td class="text-center">
                                        @if ($item->role == 'admin')
                                            <span class="badge badge-primary">Administrator</span>
                                        @elseif ($item->role == 'operator')
                                            <span class="badge badge-info">Operator</span>
                                        @else
                                            <span class="badge badge-secondary">-</span>
                                        @endif
                                    </td>


                                    <td class="text-center">
                                        {{-- Detail --}}
                                        <a href="{{ route('admin.user.show', Crypt::encrypt($item->id_user)) }}"
                                            class="btn btn-info btn-sm mr-1"
                                            title="Detail">
                                            <i data-feather="eye" style="width:14px; height:14px;"></i>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.user.addEdit', Crypt::encrypt($item->id_user)) }}"
                                            class="btn btn-warning btn-sm text-white mr-1"
                                            title="Edit">
                                            <i data-feather="edit" style="width:14px; height:14px;"></i>
                                        </a>

                                        {{-- Delete --}}
                                        @if (Auth::user()->id_user != $item->id_user)
                                            <form action="{{ route('admin.user.delete', Crypt::encrypt($item->id_user)) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data pengguna ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Hapus">

                                                    <i data-feather="trash-2" style="width:14px; height:14px;"></i>

                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Belum ada data pengguna.
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


