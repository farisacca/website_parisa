<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating or editing the resource.
     */
    public function addEdit($id = null)
    {
        try {
            $prestasi = $id
                ? Prestasi::findOrFail(Crypt::decrypt($id))
                : null;

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.prestasi.index')
                ->with('error', 'Data prestasi tidak ditemukan.');
        }

        return view('admin.prestasi.form', compact('prestasi'));
    }

    /**
     * Store or update the resource in storage.
     */
    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $prestasi = Prestasi::findOrFail($id);

            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.prestasi.index')
                    ->with('error', 'Data prestasi tidak ditemukan.');
            }

        } else {
            $prestasi = new Prestasi();
        }

        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'pemenang'      => 'required|string|max:255',
            'event'         => 'required|string|max:255',
            'tingkat'       => 'required|in:Sekolah,Kecamatan,Kabupaten/Kota,Provinsi,Nasional,Internasional',
            'kategori'      => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
            'tahun'         => 'required|digits:4|integer',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'pemenang.required'      => 'Nama pemenang wajib diisi.',
            'event.required'         => 'Nama event wajib diisi.',
            'tingkat.required'       => 'Tingkat kejuaraan wajib diisi.',
            'tingkat.in'             => 'Pilihan tingkat kejuaraan tidak valid.',
            'kategori.required'      => 'Kategori wajib diisi.',
            'tahun.required'         => 'Tahun wajib diisi.',
            'tahun.digits'           => 'Tahun harus 4 digit angka.',
            'gambar.image'           => 'File harus berupa gambar (JPEG, PNG, JPG).',
            'gambar.max'             => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Masukkan data ke model
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->pemenang      = $request->pemenang;
        $prestasi->event         = $request->event;
        $prestasi->tingkat       = $request->tingkat;
        $prestasi->kategori      = $request->kategori;
        $prestasi->deskripsi     = $request->deskripsi;
        $prestasi->tahun         = $request->tahun;

        // Proses Upload Gambar
        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar && Storage::disk('public')->exists($prestasi->gambar)) {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $prestasi->gambar = $request->file('gambar')->store('prestasi', 'public');
        }

        $prestasi->save();

        return redirect()
            ->route('admin.prestasi.index')
            ->with(
                'success',
                $id
                    ? 'Data prestasi berhasil diperbarui.'
                    : 'Data prestasi berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource for admin.
     */
    public function show($id)
    {
        try {
            $prestasi = Prestasi::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.prestasi.index')
                ->with('error', 'Data prestasi tidak ditemukan.');
        }

        return view('admin.prestasi.show', compact('prestasi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $prestasi = Prestasi::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.prestasi.index')
                ->with('error', 'Data prestasi tidak ditemukan.');
        }

        if ($prestasi->gambar && Storage::disk('public')->exists($prestasi->gambar)) {
            Storage::disk('public')->delete($prestasi->gambar);
        }

        $prestasi->delete();

        return redirect()
            ->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }

    /**
     * Display listing of resource for public.
     */
    public function publicPrestasi()
    {
        $profilSekolah = ProfilSekolah::first();
        $prestasi = Prestasi::latest()->paginate(12);

        return view('public.prestasi.prestasi', compact('profilSekolah', 'prestasi'));
    }

    /**
     * Display the specified resource for public detail.
     */
    public function publicShow($id)
    {
        profilSekolah:
        $profilSekolah = ProfilSekolah::first();

        try {
            $prestasi = Prestasi::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()
                ->route('public.prestasi')
                ->with('error', 'Data prestasi tidak ditemukan.');
        }

        return view('public.prestasi.show', compact('profilSekolah', 'prestasi'));
    }
}
