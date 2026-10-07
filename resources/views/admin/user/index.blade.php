@extends('layouts.app')

@section('title', 'Daftar User')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                        <h4 class="card-title mb-0">Daftar User</h4>
                        <a href="{{ route('admin.user.addEdit') }}" class="btn btn-primary">
                            <i data-feather="plus" class="mr-1"></i> Tambah User
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap align-middle" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center" style="width: 50px;">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th class="text-center" style="width: 120px;">Role</th>
                                    <th class="text-center" style="width: 160px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="font-weight-bold text-dark">{{ $item->name }}</div>
                                        <small class="text-muted">Username: {{ $item->username ?? '-' }}</small>
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-center">
                                        @if (strcasecmp($item->role, 'admin') === 0)
                                            <span class="badge badge-pill badge-primary px-3 py-2">
                                                <i data-feather="shield" class="mr-1" style="width:14px; height:14px;"></i> Admin
                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-secondary px-3 py-2">
                                                <i data-feather="user" class="mr-1" style="width:14px; height:14px;"></i> Operator
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    
                                        <div class="d-flex justify-content-center align-items-center" style="gap: 8px;">
                                            {{-- Detail --}}
                                            <a href="{{ route('admin.user.show', Crypt::encrypt($item->id)) }}" 
                                               class="btn btn-info btn-sm rounded shadow-sm mr-1" 
                                               title="Detail User">
                                                <i data-feather="eye" style="width:14px; height:14px;"></i>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('admin.user.addEdit', Crypt::encrypt($item->id)) }}" 
                                               class="btn btn-warning btn-sm rounded shadow-sm text-white mr-1" 
                                               title="Edit User">
                                                <i data-feather="edit" style="width:14px; height:14px;"></i>
                                            </a>

                                            {{-- Delete --}}
                                            @if ($item->id !== auth()->id())
                                                <form action="{{ route('admin.user.delete', Crypt::encrypt($item->id)) }}" 
                                                      method="POST" 
                                                      class="d-inline" 
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm rounded shadow-sm" title="Hapus User">
                                                        <i data-feather="trash-2" style="width:14px; height:14px;"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <button class="btn btn-secondary btn-sm rounded shadow-sm" disabled title="Akun sendiri tidak dapat dihapus">
                                                    <i data-feather="lock" style="width:14px; height:14px;"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data user.</td>
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