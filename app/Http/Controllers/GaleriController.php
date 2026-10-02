<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Http\Requests\StoreGaleriRequest;
use App\Http\Requests\UpdateGaleriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $galeri = Galeri::latest('tanggal')->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    public function addEdit($id = null)
    {
        try {
            $galeri = $id
                ? Galeri::findOrFail(Crypt::decrypt($id))
                : null;

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        return view('admin.galeri.form', compact('galeri'));
    }

     public function save(Request $request, $id = null)
    {
        // Jika ada ID, berarti sedang mengubah data.
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $galeri = Galeri::findOrFail($id);

            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.galeri.index')
                    ->with('error', 'Data galeri tidak ditemukan.');
            }

        } else {
            // Jika tidak ada ID, berarti menambah data baru.
            $galeri = new Galeri();
        }

        // Validasi input
        $request->validate([
            'judul'      => 'required|string|max:50',
            'kategori'   => 'required|in:Foto,Video',
            'tanggal'    => 'required|date',
            'keterangan' => 'nullable|string',
            'file'       => $id ? 'nullable|file|mimes:jpeg,png,jpg,mp4|max:10240' : 'required|file|mimes:jpeg,png,jpg,mp4|max:10240',
        ], [
            'judul.required'    => 'Judul dokumentasi wajib diisi.',
            'judul.max'         => 'Judul maksimal 50 karakter.',
            'kategori.required' => 'Pilih kategori media (Foto atau Video).',
            'tanggal.required'  => 'Tanggal dokumentasi wajib diisi.',
            'file.required'     => 'File foto atau video wajib diunggah.',
            'file.mimes'        => 'Format file yang didukung: JPG, PNG, atau MP4.',
            'file.max'          => 'Ukuran file maksimal 10MB.',
        ]);

        // Masukkan data ke model
        $galeri->judul      = $request->judul;
        $galeri->kategori   = $request->kategori;
        $galeri->tanggal    = $request->tanggal;
        $galeri->keterangan = $request->keterangan;

        // Upload file jika disertakan
        if ($request->hasFile('file')) {
            if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }
            $galeri->file = $request->file('file')->store('galeri', 'public');
        }

        // Simpan ke database
        $galeri->save();

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                $id
                    ? 'Dokumentasi galeri berhasil diperbarui.'
                    : 'Dokumentasi galeri berhasil ditambahkan.'
            );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGaleriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try {
            $galeri = Galeri::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        return view('admin.galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGaleriRequest $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $galeri = Galeri::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
            Storage::disk('public')->delete($galeri->file);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Dokumentasi galeri berhasil dihapus.');
    }
}
