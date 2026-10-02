@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<div class="container-fluid">

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        {{-- Identitas Sekolah --}}
        <div class="col-lg-4">

            <div class="card">

                <div class="card-header bg-primary">
                    <h4 class="card-title text-white mb-0">
                        <i class="fa fa-info-circle mr-2"></i>
                        Identitas Sekolah
                    </h4>
                </div>

                <div class="card-body text-center">

                    {{-- Logo --}}
                    @if ($profilSekolah && $profilSekolah->logo)
                        <img src="{{ asset('storage/' . $profilSekolah->logo) }}"
                             width="140"
                             height="140"
                             class="mb-3"
                             style="object-fit: contain;">
                    @else
                        <div class="bg-light p-5 mb-3">
                            <i class="fa fa-university fa-4x text-primary"></i>
                        </div>
                    @endif

                    <h3 class="text-muted">
                        {{ $profilSekolah->nama_sekolah ?? '-' }}
                    </h3>

                    <p class="text-muted">
                        <i class="fa fa-user mr-1"></i>
                        {{ $profilSekolah->kepala_sekolah ?? '-' }}
                    </p>

                    <hr>

                    <p class="text-muted text-left">
                        <i class="fa fa-hashtag mr-2"></i>
                        NPSN
                        <strong class="float-right">
                            {{ $profilSekolah->npsn ?? '-' }}
                        </strong>
                    </p>

                    <p class="text-muted text-left">
                        <i class="fa fa-calendar mr-2"></i>
                        Tahun Berdiri
                        <strong class="float-right">
                            {{ $profilSekolah->tahun_berdiri ?? '-' }}
                        </strong>
                    </p>

                    <p class="text-muted text-left">
                        <i class="fa fa-phone mr-2"></i>
                        Kontak
                        <strong class="float-right">
                            {{ $profilSekolah->kontak ?? '-' }}
                        </strong>
                    </p>

                    <hr>

                    <p class="text-muted text-left mb-0">
                        <i class="fa fa-map-marker mr-2"></i>
                        {{ $profilSekolah->alamat ?? '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Form Profil Sekolah --}}
        <div class="col-lg-8">

            <div class="card">

                <div class="card-header bg-primary">
                    <h4 class="card-title text-white mb-0">
                        <i class="fa fa-edit mr-2"></i>
                        Form Pengaturan Profil Sekolah
                    </h4>
                </div>

                <form action="{{ route('admin.profil-sekolah.save') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="card-body">

                        {{-- Nama Sekolah --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Nama Sekolah <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text"
                                       name="nama_sekolah"
                                       class="form-control"
                                       value="{{ old('nama_sekolah', $profilSekolah->nama_sekolah ?? '') }}">
                            </div>
                        </div>


                        {{-- Kepala Sekolah --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Kepala Sekolah <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text"
                                       name="kepala_sekolah"
                                       class="form-control"
                                       value="{{ old('kepala_sekolah', $profilSekolah->kepala_sekolah ?? '') }}">
                            </div>
                        </div>


                        {{-- NPSN --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                NPSN <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text"
                                       name="npsn"
                                       class="form-control"
                                       value="{{ old('npsn', $profilSekolah->npsn ?? '') }}">
                            </div>
                        </div>


                        {{-- Tahun Berdiri --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Tahun Berdiri <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text"
                                       name="tahun_berdiri"
                                       class="form-control"
                                       value="{{ old('tahun_berdiri', $profilSekolah->tahun_berdiri ?? '') }}">
                            </div>
                        </div>


                        {{-- Kontak --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                No. Kontak / Telepon <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text"
                                       name="kontak"
                                       class="form-control"
                                       value="{{ old('kontak', $profilSekolah->kontak ?? '') }}">
                            </div>
                        </div>


                        {{-- Alamat --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Alamat <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <textarea name="alamat"
                                          class="form-control"
                                          rows="3">{{ old('alamat', $profilSekolah->alamat ?? '') }}</textarea>
                            </div>
                        </div>


                        {{-- Visi Misi --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Visi & Misi <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <textarea name="visi_misi"
                                          class="form-control"
                                          rows="8">{{ old('visi_misi', $profilSekolah->visi_misi ?? '') }}</textarea>
                            </div>
                        </div>


                        {{-- Deskripsi --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Deskripsi
                            </label>

                            <div class="col-md-9">
                                <textarea name="deskripsi"
                                          class="form-control"
                                          rows="4">{{ old('deskripsi', $profilSekolah->deskripsi ?? '') }}</textarea>
                            </div>
                        </div>


                        {{-- Logo --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Logo Sekolah
                            </label>

                            <div class="col-md-9">
                                <input type="file"
                                       name="logo"
                                       class="form-control-file">

                                <small class="text-muted">
                                    JPG, JPEG, PNG. Maksimal 2 MB.
                                </small>
                            </div>
                        </div>


                        {{-- Foto Gedung --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Foto Gedung
                            </label>

                            <div class="col-md-9">
                                <input type="file"
                                       name="foto"
                                       class="form-control-file">

                                <small class="text-muted">
                                    JPG, JPEG, PNG. Maksimal 2 MB.
                                </small>
                            </div>
                        </div>

                    </div>


                    <div class="card-footer text-right">

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save mr-1"></i>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection