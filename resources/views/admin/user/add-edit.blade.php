@extends('layouts.app')

@section('title', isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">

            {{-- HEADER --}}
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0 text-white font-weight-bold">
                    <i class="fa {{ isset($user) ? 'fa-pencil-alt' : 'fa-plus' }} mr-2"></i>
                    {{ isset($user) ? 'Form Edit Data Pengguna' : 'Form Tambah Data Pengguna Baru' }}
                </h4>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.user.save', isset($user) ? Crypt::encrypt($user->id_user) : null) }}"
                method="POST">
                @csrf

                <div class="card-body p-4">
                    <div class="form-body">

                        {{-- NAMA PENGGUNA --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="name" class="col-md-3 col-form-label font-weight-semibold">
                                Nama Pengguna <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $user->name ?? '') }}"
                                    placeholder="Masukkan nama pengguna"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- USERNAME --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="username" class="col-md-3 col-form-label font-weight-semibold">
                                Username <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    id="username"
                                    name="username"
                                    value="{{ old('username', $user->username ?? '') }}"
                                    placeholder="Masukkan username"
                                    required>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="email" class="col-md-3 col-form-label font-weight-semibold">
                                Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $user->email ?? '') }}"
                                    placeholder="Masukkan email"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- ROLE --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="role" class="col-md-3 col-form-label font-weight-semibold">
                                Role <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="role"
                                    id="role"
                                    class="form-control custom-select @error('role') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin"
                                        {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>
                                        Administrator
                                    </option>
                                    <option value="operator"
                                        {{ old('role', $user->role ?? '') == 'operator' ? 'selected' : '' }}>
                                        Operator
                                    </option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="password" class="col-md-3 col-form-label font-weight-semibold">
                                Password
                                @if(isset($user))
                                    <br><small class="text-muted font-weight-normal">(kosongkan jika tidak diubah)</small>
                                @else
                                    <span class="text-danger">*</span>
                                @endif
                            </label>
                            <div class="col-md-9">
                                <input type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password"
                                    {{ isset($user) ? '' : 'required' }}>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="form-group row align-items-center mb-3">
                            <label for="password_confirmation" class="col-md-3 col-form-label font-weight-semibold">
                                Konfirmasi Password
                                @if(!isset($user))
                                    <span class="text-danger">*</span>
                                @endif
                            </label>
                            <div class="col-md-9">
                                <input type="password"
                                    class="form-control"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Ulangi password"
                                    {{ isset($user) ? '' : 'required' }}>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- FOOTER / ACTIONS --}}
                <div class="card-footer bg-light text-right py-3">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> {{ isset($user) ? 'Simpan Perubahan' : 'Simpan Data Pengguna' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
