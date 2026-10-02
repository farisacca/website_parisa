@extends('layouts.app')

@section('title', isset($ekstrakurikuler->id_eskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler')

@section('content')

<div class="card">
    <div class="card-body">

        {{-- Header --}}
        <div class="mb-4">
            <h5 class="card-title fw-semibold mb-1">
                {{ isset($ekstrakurikuler->id_eskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler' }}
            </h5>

            <p class="card-subtitle text-muted">
                {{ isset($ekstrakurikuler->id_eskul)
                    ? 'Perbarui data ekstrakurikuler'
                    : 'Tambahkan data ekstrakurikuler baru' }}
            </p>
        </div>

        <form action="{{ route('admin.ekstrakurikuler.save', isset($ekstrakurikuler->id_eskul) ? Crypt::encrypt($ekstrakurikuler->id_eskul) : '') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- Nama Ekstrakurikuler --}}
            <div class="mb-3">
                <label for="nama_eskul" class="form-label">
                    Nama Ekstrakurikuler
                </label>

                <input type="text"
                       name="nama_eskul"
                       id="nama_eskul"
                       class="form-control @error('nama_eskul') is-invalid @enderror"
                       value="{{ old('nama_eskul', $ekstrakurikuler->nama_eskul ?? '') }}"
                       placeholder="Masukkan nama ekstrakurikuler">

                @error('nama_eskul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Guru Pembina --}}
            <div class="mb-3">
                <label for="id_guru" class="form-label">
                    Guru Pembina
                </label>

                <select name="id_guru"
                        id="id_guru"
                        class="form-select @error('id_guru') is-invalid @enderror">

                    <option value="">
                        -- Pilih Guru Pembina --
                    </option>

                    @foreach ($guru as $g)
                        <option value="{{ $g->id_guru }}"
                            {{ old('id_guru', $ekstrakurikuler->id_guru ?? '') == $g->id_guru ? 'selected' : '' }}>

                            {{ $g->nama_guru }}
                            @if ($g->mapel)
                                - {{ $g->mapel }}
                            @endif

                        </option>
                    @endforeach

                </select>

                @error('id_guru')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Jadwal Latihan --}}
            <div class="mb-3">
                <label for="jadwal_latihan" class="form-label">
                    Jadwal Latihan
                </label>

                <input type="text"
                       name="jadwal_latihan"
                       id="jadwal_latihan"
                       class="form-control @error('jadwal_latihan') is-invalid @enderror"
                       value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan ?? '') }}"
                       placeholder="Contoh: Jumat, 15.00 - 17.00">

                @error('jadwal_latihan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label for="deskripsi" class="form-label">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          id="deskripsi"
                          rows="5"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          placeholder="Masukkan deskripsi ekstrakurikuler">{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="mb-4">
                <label for="gambar" class="form-label">
                    Gambar
                </label>

                <input type="file"
                       name="gambar"
                       id="gambar"
                       class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/*">

                <small class="text-muted">
                    Format: JPG, JPEG, PNG. Maksimal 2 MB.
                </small>

                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Gambar lama --}}
                @if (!empty($ekstrakurikuler->gambar))
                    <div class="mt-3">
                        <p class="mb-2">Gambar Saat Ini:</p>

                        <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                             alt="{{ $ekstrakurikuler->nama_eskul }}"
                             width="150"
                             class="rounded border">
                    </div>
                @endif
            </div>

            {{-- Button --}}
            <div class="d-flex gap-2">

                <a href="{{ route('admin.ekstrakurikuler.index') }}"
                   class="btn btn-secondary">
                    <i class="fa fa-arrow-left me-1"></i>
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    <i class="fa fa-save me-1"></i>
                    Simpan
                </button>

            </div>

        </form>

    </div>
</div>

@endsection