@extends('layouts.app')

@section('title', 'Detail Galeri')
@section('content')
<div class="row">
    <div class="col-12">

        <div class="card mb-4">

            <div class="card-header bg-info">
                <div class="d-flex justify-content-between align-items-center">

                    <h5 class="mb-0 text-white">
                        <i class="fa fa-picture-o me-2"></i>
                        Detail Dokumentasi Galeri
                    </h5>

                    <a href="{{ route('admin.galeri.index') }}"
                        class="btn btn-dark btn-sm">
                        <i class="fa fa-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>
            </div>

            <div class="card-body">

                {{-- Media --}}
                <div class="text-center mb-4">

                    @if ($galeri->kategori == 'Video' &&
                        $galeri->file &&
                        file_exists(public_path('storage/' . $galeri->file)))

                        <video controls
                            class="rounded border"
                            style="width: 80%; max-height: 450px;">
                            <source src="{{ asset('storage/' . $galeri->file) }}"
                                type="video/mp4">

                            Browser Anda tidak mendukung video HTML5.
                        </video>

                    @elseif ($galeri->file &&
                        file_exists(public_path('storage/' . $galeri->file)))

                        <img src="{{ asset('storage/' . $galeri->file) }}"
                            alt="{{ $galeri->judul }}"
                            class="img-fluid rounded border"
                            style="max-height: 450px;">

                    @else

                        <div class="p-5 bg-light rounded text-muted">
                            <i class="fa fa-file-o fa-3x d-block mb-3"></i>
                            File media tidak ditemukan.
                        </div>

                    @endif

                </div>

                {{-- Judul --}}
                <h4 class="mb-3">
                    {{ $galeri->judul }}
                </h4>

                {{-- Informasi --}}
                <div class="table-responsive">
                    <table class="table table-bordered">

                        <tbody>

                            <tr>
                                <th class="bg-info text-white"
                                    style="width: 30%;">
                                    Kategori
                                </th>

                                <td>
                                    @if ($galeri->kategori == 'Foto')
                                        <span class="badge bg-success">
                                            <i class="fa fa-camera me-1"></i>
                                            Foto
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="fa fa-video-camera me-1"></i>
                                            Video
                                        </span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-info text-white">
                                    Tanggal Dokumentasi
                                </th>

                                <td>
                                    <i class="fa fa-calendar me-1"></i>
                                    {{ date('d F Y', strtotime($galeri->tanggal)) }}
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-info text-white">
                                    Nama File
                                </th>

                                <td>
                                    <code>
                                        {{ $galeri->file }}
                                    </code>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-info text-white">
                                    Keterangan
                                </th>

                                <td style="white-space: pre-line;">
                                    {{ $galeri->keterangan ?? 'Tidak ada keterangan.' }}
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">

                    <a href="{{ route('admin.galeri.index') }}"
                        class="btn btn-dark">
                        <i class="fa fa-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <a href="{{ route('admin.galeri.addEdit', Crypt::encrypt($galeri->id_galeri)) }}"
                        class="btn btn-warning">
                        <i class="fa fa-pencil me-1"></i>
                        Edit Galeri
                    </a>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection