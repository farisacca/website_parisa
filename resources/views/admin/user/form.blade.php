@extends('layouts.app')

@section('title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    <i data-feather="{{ isset($user) ? 'edit-3' : 'user-plus' }}" class="mr-2 text-primary"></i>
                    {{ isset($user) ? 'Form Edit Data User' : 'Form Tambah User Baru' }}
                </h4>

                <form action="{{ route('admin.user.save', isset($user) ? Crypt::encrypt($user->id) : null) }}" method="POST">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="form-group mb-3">
                        <label for="name" class="font-weight-medium">Nama Pengguna <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Contoh: Ahmad Fauzi" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email" class="font-weight-medium">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Contoh: user@sekolah.sch.id" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- Username -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="username" class="font-weight-medium">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username ?? '') }}" placeholder="Kosongkan jika ingin dibuat otomatis">
                            <small class="form-text text-muted">Opsional (Maksimal 30 karakter).</small>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="role" class="font-weight-medium">Role / Hak Akses <span class="text-danger">*</span></label>
                            <select class="custom-select form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="Admin" {{ old('role', strtolower($user->role ?? '')) == 'admin' ? 'selected' : '' }}>
                                    Admin (Akses Penuh Seluruh Sistem)
                                </option>
                                <option value="Operator" {{ old('role', strtolower($user->role ?? '')) == 'operator' ? 'selected' : '' }}>
                                    Operator (Akses Operasional Sekolah)
                                </option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-4">
                        <label for="password" class="font-weight-medium">
                            Password
                            @if(!isset($user)) <span class="text-danger">*</span> @endif
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Minimal 6 karakter" {{ !isset($user) ? 'required' : '' }}>
                        @if(isset($user))
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                        @endif
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                            <i data-feather="arrow-left" class="mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn {{ isset($user) ? 'btn-warning' : 'btn-primary' }}">
                            <i data-feather="save" class="mr-1"></i> {{ isset($user) ? 'Simpan Perubahan' : 'Simpan Data User' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection