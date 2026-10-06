<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $berita = Berita::with('user')->latest('tanggal')->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function addEdit($id = null)
    {
        try {
            $berita = $id
                ? Berita::findOrFail(Crypt::decrypt($id))
                : null;

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.form', compact('berita'));
    }

     public function save(Request $request, $id = null)
    {
        // Jika ada ID, berarti sedang mengubah data.
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $berita = Berita::findOrFail($id);

            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.berita.index')
                    ->with('error', 'Data berita tidak ditemukan.');
            }

        } else {
            // Jika tidak ada ID, berarti menambah berita baru.
            $berita = new Berita();
            $berita->id_user = Auth::id() ?? User::value('id');
        }

        //slug
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);

        $slugRule = 'required|unique:berita,slug';

        // Jika sedang mengubah berita, tambahkan pengecualian untuk slug yang sama.
        if ($berita->exists) {
            $slugRule = 'required|unique:berita,slug,' . $berita->id_berita . ',id_berita';
        }

        // Validasi input
        $request->validate([
            'judul'   => 'required|string|max:50',
            'slug'    => $slugRule,
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'judul.required'   => 'Judul berita wajib diisi.',
            'judul.max'        => 'Judul maksimal 50 karakter.',
            'slug.required'     => 'Slug berita wajib diisi.',
            'slug.unique'      => 'Slug berita sudah digunakan.',
            'isi.required'     => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal publikasi wajib diisi.',
            'gambar.image'     => 'Gambar harus berupa file gambar (JPG, PNG).',
            'gambar.max'       => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Masukkan data ke model
        $berita->judul   = $request->judul;
        $berita->slug    = $request->slug;
        $berita->isi     = $request->isi;
        $berita->tanggal = $request->tanggal;

        // Upload gambar jika disertakan
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        // Simpan ke database
        $berita->save();

        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                $id
                    ? 'Data berita berhasil diperbarui.'
                    : 'Data berita berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         try {
            $berita = Berita::with('user')->findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
         try {
            $berita = Berita::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Data berita berhasil dihapus.');
    
    }

    // BeritaController.php
    public function publicBerita()
    {
        // Mengambil 6 berita per halaman, diurutkan dari yang terbaru
        $beritas = Berita::latest()->paginate(6);

        return view('public.berita', compact('berita'));
    }
}
