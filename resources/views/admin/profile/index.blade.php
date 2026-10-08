@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container-fluid">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i data-feather="check-circle" class="mr-2"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- ERROR ALERT --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <strong>
                <i data-feather="alert-triangle" class="mr-2"></i>
                Terjadi kesalahan:
            </strong>
            <ul class="mb-0 mt-2 pl-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="row">

        {{-- DATA PROFILE --}}
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-header bg-primary text-white py-3">
                    <h4 class="card-title mb-0 text-white font-weight-bold">
                        <i data-feather="user" class="mr-2"></i>
                        Data Profile
                    </h4>
                </div>

                <form action="{{ route('admin.profile.update') }}" method="POST" class="d-flex flex-column h-100">
                    @csrf
                    @method('PUT')

                    <div class="card-body p-4 flex-grow-1">
                        <div class="form-body">

                            {{-- Nama Lengkap --}}
                            <div class="form-group row align-items-center mb-3">
                                <label for="name" class="col-md-4 col-form-label font-weight-semibold">
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Masukkan nama lengkap"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Username --}}
                            <div class="form-group row align-items-center mb-3">
                                <label for="username" class="col-md-4 col-form-label font-weight-semibold">
                                    Username <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text"
                                        name="username"
                                        id="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username', $user->username) }}"
                                        placeholder="Masukkan username"
                                        required>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="form-group row align-items-center mb-3">
                                <label for="email" class="col-md-4 col-form-label font-weight-semibold">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input type="email"
                                        name="email"
                                        id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}"
                                        placeholder="Masukkan email"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Role --}}
                            <div class="form-group row align-items-center mb-3">
                                <label class="col-md-4 col-form-label font-weight-semibold">
                                    Role
                                </label>
                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control bg-light"
                                        value="{{ ucfirst($user->role) }}"
                                        readonly>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer bg-light text-right py-3">
                        <button type="submit" class="btn btn-primary">
                            <i data-feather="save" class="mr-1"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>


        {{-- UBAH PASSWORD --}}
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-header bg-warning text-white py-3">
                    <h4 class="card-title mb-0 text-white font-weight-bold">
                        <i data-feather="lock" class="mr-2"></i>
                        Ubah Password
                    </h4>
                </div>

                <form action="{{ route('admin.profile.password') }}" method="POST" class="d-flex flex-column h-100">
                    @csrf
                    @method('PUT')

                    <div class="card-body p-4 flex-grow-1">
                        <div class="form-body">

                            {{-- Password Saat Ini --}}
                            <div class="form-group row align-items-center mb-3">
                                <label for="current_password" class="col-md-4 col-form-label font-weight-semibold">
                                    Password Saat Ini <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input type="password"
                                        name="current_password"
                                        id="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        placeholder="Masukkan password saat ini"
                                        required>
                                    @error('current_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password Baru --}}
                            <div class="form-group row align-items-center mb-3">
                                <label for="password" class="col-md-4 col-form-label font-weight-semibold">
                                    Password Baru <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input type="password"
                                        name="password"
                                        id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Masukkan password baru"
                                        required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Konfirmasi Password Baru --}}
                            <div class="form-group row align-items-center mb-3">
                                <label for="password_confirmation" class="col-md-4 col-form-label font-weight-semibold">
                                    Konfirmasi Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        class="form-control"
                                        placeholder="Ulangi password baru"
                                        required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer bg-light text-right py-3">
                        <button type="submit" class="btn btn-warning text-white">
                            <i data-feather="key" class="mr-1"></i>
                            Ubah Password
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
