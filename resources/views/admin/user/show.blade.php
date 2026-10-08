@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            {{-- HEADER --}}
            <div class="card-header">
                <h4 class="card-title mb-0">
                    <i class="fa fa-user"></i> Detail Pengguna
                </h4>
            </div>

            {{-- BODY --}}
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead class="bg-info text-white">
                            <tr>
                                <th colspan="2">
                                    Informasi Pengguna
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <th style="width: 30%;">
                                    Nama Pengguna
                                </th>
                                <td>
                                    {{ $user->name ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Username
                                </th>
                                <td>
                                    {{ $user->username ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Email
                                </th>
                                <td>
                                    {{ $user->email ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Role
                                </th>
                                <td>
                                    @if (strtolower($user->role ?? '') === 'admin')
                                        <span class="badge badge-primary">
                                            Administrator
                                        </span>
                                    @elseif (strtolower($user->role ?? '') === 'operator')
                                        <span class="badge badge-secondary">
                                            Operator
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Tanggal Ditambahkan
                                </th>
                                <td>
                                    {{ $user->created_at
                                        ? $user->created_at->format('d F Y, H:i')
                                        : '-' }}
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer">

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('admin.user.index') }}"
                        class="btn btn-secondary">

                        <i class="fa fa-arrow-left"></i>
                        Kembali

                    </a>

                    <a href="{{ route('admin.user.addEdit', Crypt::encrypt($user->id_user ?? $user->id)) }}"
                        class="btn btn-warning">

                        <i class="fa fa-pencil"></i>
                        Edit Data Pengguna

                    </a>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection
