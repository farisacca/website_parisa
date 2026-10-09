@extends('layouts.app')

@section('title', 'Edit Profil Sekolah')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3">
                
                <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-white mb-0 font-weight-bold">
                        <i class="fa fa-edit mr-2"></i> Form Edit Profil Sekolah
                    </h5>
                    <a href="{{ route('admin.profil-sekolah.index') }}" class="btn btn-sm btn-light font-weight-semibold">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.profil-sekolah.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body p-4">
                        
                        <h6 class="font-weight-bold text-primary mb-3"><i class="fa fa-building mr-1"></i> 1. Informasi Utama</h6>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label font-weight-semibold">Nama Sekolah <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', $profilSekolah->nama_sekolah ?? '') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label font-weight-semibold">Kepala Sekolah <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="kepala_sekolah" class="form-control" value="{{ old('kepala_sekolah', $profilSekolah->kepala_sekolah ?? '') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label font-weight-semibold">NPSN & Tahun Berdiri</label>
                            <div class="col-md-5 mb-2 mb-md-0">
                                <input type="text" name="npsn" class="form-control" placeholder="NPSN" value="{{ old('npsn', $profilSekolah->npsn ?? '') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="tahun_berdiri" class="form-control" placeholder="Tahun Berdiri" value="{{ old('tahun_berdiri', $profilSekolah->tahun_berdiri ?? '') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label font-weight-semibold">No. Kontak / Telepon</label>
                            <div class="col-md-9">
                                <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $profilSekolah->kontak ?? '') }}">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-md-3 col-form-label font-weight-semibold">Alamat Lengkap</label>
                            <div class="col-md-9">
                                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $profilSekolah->alamat ?? '') }}</textarea>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="font-weight-bold text-primary mb-3"><i class="fa fa-file-alt mr-1"></i> 2. Visi, Misi & Deskripsi</h6>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label font-weight-semibold">Visi & Misi</label>
                            <div class="col-md-9">
                                <textarea name="visi_misi" class="form-control" rows="8" placeholder="Tuliskan Visi dan Misi sekolah...">{{ old('visi_misi', $profilSekolah->visi_misi ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-md-3 col-form-label font-weight-semibold">Deskripsi Sekolah</label>
                            <div class="col-md-9">
                                <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi singkat mengenai sekolah...">{{ old('deskripsi', $profilSekolah->deskripsi ?? '') }}</textarea>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="font-weight-bold text-primary mb-3"><i class="fa fa-image mr-1"></i> 3. Berkas & Media</h6>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label font-weight-semibold">Logo Sekolah</label>
                            <div class="col-md-9">
                                <input type="file" name="logo" class="form-control-file">
                                <small class="text-muted d-block">Format: JPG, JPEG, PNG. Maksimal 2 MB.</small>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-md-3 col-form-label font-weight-semibold">Foto Gedung Utama</label>
                            <div class="col-md-9">
                                <input type="file" name="foto" class="form-control-file">
                                <small class="text-muted d-block">Format: JPG, JPEG, PNG. Maksimal 2 MB.</small>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer bg-light text-right py-3">
                        <a href="{{ route('admin.profil-sekolah.index') }}" class="btn btn-secondary mr-2">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa fa-save mr-1"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
@endsection