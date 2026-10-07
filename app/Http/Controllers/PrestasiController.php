<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prestasi = Prestasi::latest()->get();

        return view('admin.prestasi.index', compact('prestasi'));
    }

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
            'nama_prestasi'  => 'required|string|max:255',
            'pemenang'     => 'required|string|max:255',
            'event'  => 'required|string|max:255',
            'tingkat'       => 'required|in:Sekolah,Kecamatan,Kabupaten/Kota,Provinsi,Nasional,Internasional',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'tahun' => 'required|digits:4|integer',
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'pemenang.required'      => 'Nama pemenang wajib diisi.',
            'event.required'         => 'Nama event wajib diisi.',
            'tingkat.required'       => 'Tingkat kejuaraan wajib diisi.',
            'tingkat.in'             => 'Pilihan tingkat kejuaraan tidak valid.',
            'kategori.required'      => 'Kategori wajib diisi.',
            'tahun.required'         => 'Tahun wajib diisi.',
            'tahun.digits'           => 'Tahun harus 4 digit angka.',
        ]);

        // Masukkan data ke model.
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->pemenang      = $request->pemenang;
        $prestasi->event         = $request->event;
        $prestasi->tingkat       = $request->tingkat;
        $prestasi->kategori      = $request->kategori;
        $prestasi->deskripsi     = $request->deskripsi;
        $prestasi->tahun         = $request->tahun;

        // Simpan data.
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
     * Display the specified resource.
     */
    public function show($id)
    {
        //
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
        //
        try {
            $prestasi = Prestasi::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.prestasi.index')
                ->with('error', 'Data prestasi tidak ditemukan.');
        }

        $prestasi->delete();

        return redirect()
            ->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    
    }
}
