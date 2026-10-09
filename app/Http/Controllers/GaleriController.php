<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\ProfilSekolah;

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
        if ($id) {
            try {
                $galeri = Galeri::findOrFail(Crypt::decrypt($id));
            } catch (\Exception $e) {
                return redirect()->route('admin.galeri.index')->with('error', 'Data tidak ditemukan.');
            }
        } else {
            $galeri = new Galeri();
        }

        $request->validate([
            'judul'      => 'required|string|max:50',
            'kategori'   => 'required|in:Foto,Video',
            'tanggal'    => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $galeri->judul      = $request->judul;
        $galeri->kategori   = $request->kategori;
        $galeri->tanggal    = $request->tanggal;
        $galeri->keterangan = $request->keterangan;

        // JIKA KATEGORI FOTO: Upload Gambar ke Storage
        if ($request->kategori == 'Foto') {
            if ($request->hasFile('file_upload')) {
                if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                    Storage::disk('public')->delete($galeri->file);
                }
                $galeri->file = $request->file('file_upload')->store('galeri', 'public');
            }
        }
        // JIKA KATEGORI VIDEO: Simpan Link YouTube langsung ke kolom 'file'
        else if ($request->kategori == 'Video') {
            if ($request->filled('link_youtube')) {
                $galeri->file = $request->link_youtube;
            }
        }

        $galeri->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil disimpan.');
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

    public function publicGaleri()
    {
        $profilSekolah = ProfilSekolah::first();

        // Ambil data Foto dan Video terpisah
        $galeriFoto = class_exists(Galeri::class)
            ? Galeri::where('kategori', 'Foto')->latest('tanggal')->get()
            : collect();

        $galeriVideo = class_exists(Galeri::class)
            ? Galeri::where('kategori', 'Video')->latest('tanggal')->get()
            : collect();

        return view('public.galeri.galeri', compact('profilSekolah', 'galeriFoto', 'galeriVideo'));
    }
}
