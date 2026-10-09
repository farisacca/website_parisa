<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::with('guru')->latest()->get();
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function addEdit($id = null)
    {
        try {
            $ekstrakurikuler = $id
                ? Ekstrakurikuler::findOrFail(Crypt::decrypt($id))
                : null;

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
        }

        $guru = Guru::orderBy('nama_guru', 'asc')->get();

        return view('admin.ekstrakurikuler.form', compact('ekstrakurikuler', 'guru'));
    }

    public function save(Request $request, $id = null)
    {
        // Jika ada ID, berarti sedang mengubah data.
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.ekstrakurikuler.index')
                    ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
            }

        } else {
            // Jika tidak ada ID, berarti menambah data baru.
            $ekstrakurikuler = new Ekstrakurikuler();
        }

        // Validasi input
        $request->validate([
            'nama_eskul'    => 'required|string|max:40',
            'id_guru'        => 'required|exists:guru,id_guru',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_eskul.required'    => 'Nama ekstrakurikuler wajib diisi.',
            'nama_eskul.max'         => 'Nama ekstrakurikuler maksimal 40 karakter.',
            'id_guru.required'        => 'Guru pembina wajib dipilih.',
            'id_guru.exists'          => 'Guru pembina yang dipilih tidak valid.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'jadwal_latihan.max'      => 'Jadwal latihan maksimal 40 karakter.',
            'gambar.image'            => 'File harus berupa gambar (JPG, PNG).',
            'gambar.max'              => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Masukkan data ke model
        $ekstrakurikuler->nama_eskul    = $request->nama_eskul;
        $ekstrakurikuler->slug          = Str::slug($request->nama_eskul); // Otomatis generate slug
        $ekstrakurikuler->id_guru        = $request->id_guru;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi      = $request->deskripsi;

        // Upload gambar jika disertakan
        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar && Storage::disk('public')->exists($ekstrakurikuler->gambar)) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $ekstrakurikuler->gambar = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        // Simpan ke database
        $ekstrakurikuler->save();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with(
                'success',
                $id
                    ? 'Data ekstrakurikuler berhasil diperbarui.'
                    : 'Data ekstrakurikuler berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource for admin.
     */
    public function show($id)
    {
        try {
            $ekstrakurikuler = Ekstrakurikuler::with('guru')->findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
        }

        return view('admin.ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $ekstrakurikuler = Ekstrakurikuler::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
        }

        if ($ekstrakurikuler->gambar && Storage::disk('public')->exists($ekstrakurikuler->gambar)) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }

        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }

    /**
     * Display listing of resource for public.
     */
    public function publicEkstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('public.ekstrakurikuler.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    /**
     * Display the specified resource by slug for public.
     */
    public function publicShow($slug)
    {
        // Cari data berdasarkan slug (atau id)
    $eskul = Ekstrakurikuler::where('slug', $slug)->firstOrFail();

    // Pastikan variabel 'eskul' dikirim ke view
    return view('public.ekstrakurikuler.show', compact('eskul'));
    }
}