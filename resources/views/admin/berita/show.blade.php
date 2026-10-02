@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            {{-- Header --}}
            <div class="card-header bg-info text-white">

                <div class="d-flex justify-content-between align-items-center">

                    <h4 class="card-title mb-0">

                        <i class="fa fa-newspaper-o me-1"></i>
                        Detail Berita

                    </h4>

                    <a href="{{ route('admin.berita.index') }}"
                       class="btn btn-light btn-sm">

                        <i class="fa fa-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </div>

            {{-- Isi --}}
            <div class="card-body">

                {{-- Judul --}}
                <h3 class="font-weight-bold mb-3">
                    {{ $berita->judul }}
                </h3>

                {{-- Informasi --}}
                <div class="border-bottom pb-3 mb-4">

                    <div class="row">

                        <div class="col-md-4 mb-2">

                            <small class="text-muted d-block">
                                Tanggal
                            </small>

                            <strong>
                                <i class="fa fa-calendar me-1"></i>
                                {{ date('d-m-Y', strtotime($berita->tanggal)) }}
                            </strong>

                        </div>

                        <div class="col-md-4 mb-2">

                            <small class="text-muted d-block">
                                Penulis
                            </small>

                            <strong>
                                <i class="fa fa-user me-1"></i>
                                {{ $berita->user->name ?? 'Admin' }}
                            </strong>

                        </div>

                        <div class="col-md-4 mb-2">

                            <small class="text-muted d-block">
                                Status
                            </small>

                            @if ($berita->status == 'publis')

                                <span class="badge badge-success">
                                    Publis
                                </span>

                            @else

                                <span class="badge badge-warning">
                                    Draf
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- Gambar --}}
                @if ($berita->gambar && file_exists(public_path('storage/' . $berita->gambar)))

                    <div class="text-center mb-4">

                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             class="img-fluid rounded shadow-sm"
                             style="max-height: 400px; width: 100%; object-fit: cover;">

                    </div>

                @endif

                {{-- Isi Berita --}}
                <div>

                    <h5 class="font-weight-bold mb-3">
                        Isi Berita
                    </h5>

                    <div style="white-space: pre-line; line-height: 1.8;">
                        {{ $berita->isi }}
                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="card-footer">

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('admin.berita.index') }}"
                       class="btn btn-secondary">

                        <i class="fa fa-arrow-left me-1"></i>
                        Kembali

                    </a>

                    <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($berita->id_berita)) }}"
                       class="btn btn-warning">

                        <i class="fa fa-pencil me-1"></i>
                        Edit Berita

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
