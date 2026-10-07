@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container-fluid">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i data-feather="check-circle" class="mr-2"></i>
            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif


    {{-- ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>
                <i data-feather="alert-triangle" class="mr-2"></i>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif


    <div class="row">

        {{-- DATA PROFILE --}}
        <div class="col-lg-6 col-md-12">

            <div class="card">

                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">
                        <i data-feather="user" class="mr-2"></i>
                        My Profile
                    </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.profile.update') }}" method="POST">

                        @csrf
                        @method('PUT')

                        {{-- Nama --}}
                        <div class="form-group">
                            <label for="name">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}"
                                placeholder="Masukkan nama lengkap"
                            >

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                        {{-- Username --}}
                        <div class="form-group">
                            <label for="username">
                                Username
                            </label>

                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username', $user->username) }}"
                                placeholder="Masukkan username"
                            >

                            @error('username')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}"
                                placeholder="Masukkan email"
                            >

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                        {{-- Role --}}
                        <div class="form-group">
                            <label>
                                Role
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ ucfirst($user->role) }}"
                                readonly
                            >
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                <i data-feather="save" class="mr-1"></i>
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>


        {{-- UBAH PASSWORD --}}
        <div class="col-lg-6 col-md-12">

            <div class="card">

                <div class="card-header bg-warning">
                    <h4 class="mb-0 text-white">
                        <i data-feather="lock" class="mr-2"></i>
                        Ubah Password
                    </h4>
                </div>

                <div class="card-body">

                    <form
                        action="{{ route('admin.profile.password') }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        {{-- Password Lama --}}
                        <div class="form-group">
                            <label for="current_password">
                                Password Saat Ini
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Masukkan password saat ini"
                            >

                            @error('current_password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                        {{-- Password Baru --}}
                        <div class="form-group">
                            <label for="password">
                                Password Baru
                            </label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan password baru"
                            >

                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                        {{-- Konfirmasi --}}
                        <div class="form-group">
                            <label for="password_confirmation">
                                Konfirmasi Password Baru
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password baru"
                            >
                        </div>


                        <div class="text-right">
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

</div>

@endsection