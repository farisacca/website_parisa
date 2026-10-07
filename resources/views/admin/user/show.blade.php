@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">
                        <i data-feather="user-check" class="mr-2 text-info"></i> Detail Data Pengguna
                    </h4>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary btn-sm">
                        <i data-feather="arrow-left" class="mr-1"></i> Kembali
                    </a>
                </div>

                <!-- Avatar Profile Section -->
                <div class="text-center mb-4">
                    <div class="rounded-circle bg-light-primary text-primary d-inline-flex align-items-center justify-content-center mb-2" style="width: 80px; height: 80px;">
                        <i data-feather="user" style="width: 40px; height: 40px;"></i>
                    </div>
                    <h4 class="font-weight-bold mb-1">{{ $user->name }}</h4>
                    <span class="badge {{ strcasecmp($user->role, 'admin') === 0 ? 'badge-primary' : 'badge-secondary' }} px-3 py-1">
                        {{ $user->role }}
                    </span>
                </div>

                <!-- Detail Data Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;" class="bg-light">Nama Lengkap</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Username</th>
                                <td><code>{{ $user->username ?? '-' }}</code></td>
                            </tr>
                            <tr>
                                <th class="bg-light">Alamat Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Role / Hak Akses</th>
                                <td>
                                    @if (strcasecmp($user->role, 'admin') === 0)
                                        <span class="badge badge-primary">Admin (Akses Penuh Seluruh Sistem)</span>
                                    @else
                                        <span class="badge badge-secondary">Operator (Akses Operasional Sekolah)</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tanggal Terdaftar</th>
                                <td>{{ $user->created_at ? $user->created_at->format('d F Y, H:i') : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Actions -->
                <div class="d-flex justify-content-between align-items-center pt-3 mt-3 border-top">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                        <i data-feather="arrow-left" class="mr-1"></i> Kembali
                    </a>
                    <a href="{{ route('admin.user.addEdit', Crypt::encrypt($user->id)) }}" class="btn btn-warning">
                        <i data-feather="edit-3" class="mr-1"></i> Edit Data User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection