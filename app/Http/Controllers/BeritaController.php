<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilSekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilan daftar berita di Admin
     */
    public function index()
    {
        $berita = Berita::with('user')->latest('tanggal')->get();

        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Form Tambah / Edit Berita Admin
     */
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

    /**
     * Process Simpan & Update Data Berita Admin
     */
    public function save(Request $request, $id = null)
    {
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
            $berita = new Berita();
            $berita->id_user = Auth::id() ?? User::value('id');
        }

        // Generate Slug
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);

        $slugRule = 'required|unique:berita,slug';
        if ($berita->exists) {
            $slugRule = 'required|unique:berita,slug,' . $berita->id_berita . ',id_berita';
        }

        // Validasi input
        $request->validate([
            'judul'   => 'required|string|max:255',
            'slug'    => $slugRule,
            'isi'     => 'required|string',
            'status'  => 'required|string|in:draf,draft,publis,publish',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'judul.required'   => 'Judul berita wajib diisi.',
            'slug.required'    => 'Slug berita wajib diisi.',
            'slug.unique'      => 'Slug berita sudah digunakan.',
            'isi.required'     => 'Isi berita wajib diisi.',
            'status.required'  => 'Status berita wajib dipilih.',
            'tanggal.required' => 'Tanggal publikasi wajib diisi.',
            'gambar.image'     => 'Gambar harus berupa file gambar (JPG, PNG).',
            'gambar.max'       => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Simpan Data
        $berita->judul   = $request->judul;
        $berita->slug    = $request->slug;
        $berita->isi     = $request->isi;
        $berita->status  = $request->status;
        $berita->tanggal = $request->tanggal;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->save();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', $id ? 'Data berita berhasil diperbarui.' : 'Data berita berhasil disimpan.');
    }

    /**
     * Detail Berita Admin (Menggunakan ID Terenkripsi)
     */
    public function show($id)
    {
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
     * Hapus Berita Admin
     */
    public function destroy($id)
    {
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

    /**
     * Tampilan Halaman Daftar Berita Publik
     */
    public function publicBerita()
    {
        $profilSekolah = ProfilSekolah::first();

        // MENAMPILKAN HANYA YANG BERSTATUS PUBLIS / PUBLISH
        $berita = class_exists(Berita::class)
            ? Berita::whereIn('status', ['publis', 'publish', 'published'])
                ->latest('tanggal')
                ->paginate(6)
            : collect();

        return view('public.berita.berita', compact('profilSekolah', 'berita'));
    }

    /**
     * Tampilan Halaman Detail Berita Publik (Menggunakan Slug di URL)
     */
    public function publicShow($slug)
    {
        $profilSekolah = ProfilSekolah::first();

        // Cari berita berdasarkan slug yang hanya berstatus publis
        $berita = Berita::with('user')
            ->whereIn('status', ['publis', 'publish', 'published'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('public.berita.show', compact('profilSekolah', 'berita'));
    }
}
