<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Memuat data siswa beserta relasi kelasnya
        $siswa = Siswa::with('kelas')->latest()->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function addEdit($id = null)
    {
        try {
            $siswa = $id
                ? Siswa::findOrFail(Crypt::decrypt($id))
                : null;

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        // Mengambil data kelas untuk dropdown di form
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('admin.siswa.form', compact('siswa', 'kelas'));
    }

    public function save(Request $request, $id = null)
    {
        $realId = null;
        $siswa = null;

        if ($id) {
            try {
                // Dekripsi ID terenkripsi dari form action
                $realId = Crypt::decrypt($id);
                $siswa = Siswa::findOrFail($realId);

            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.siswa.index')
                    ->with('error', 'Data siswa tidak ditemukan.');
            }
        } else {
            $siswa = new Siswa();
        }

        $request->validate([
            // Gunakan $realId untuk mengecualikan unique NISN pada data miliknya sendiri saat edit
            'nisn'          => 'required|digits:10|unique:siswa,nisn,' . ($realId ?? 'NULL') . ',id',
            'nama'          => 'required|string|max:40',
            'id_kelas'      => 'required|exists:kelas,id_kelas',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4|integer',
        ], [
            'nisn.required'          => 'NISN wajib diisi.',
            'nisn.digits'            => 'NISN harus 10 digit angka.',
            'nisn.unique'            => 'NISN sudah terdaftar pada siswa lain.',
            'nama.required'          => 'Nama siswa wajib diisi.',
            'id_kelas.required'      => 'Pilih kelas siswa.',
            'id_kelas.exists'        => 'Kelas yang dipilih tidak valid.',
            'jenis_kelamin.required' => 'Pilih jenis kelamin.',
            'tahun_masuk.required'   => 'Tahun masuk wajib diisi.',
            'tahun_masuk.digits'     => 'Tahun masuk harus 4 digit angka.',
        ]);

        // Masukkan data ke model
        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tahun_masuk = $request->tahun_masuk;

        // Simpan data
        $siswa->save();

        return redirect()
            ->route('admin.siswa.index')
            ->with(
                'success',
                $realId
                    ? 'Data siswa berhasil diperbarui.'
                    : 'Data siswa berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $siswa = Siswa::with('kelas')->findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    public function publicSiswa()
    {
        $siswa = Siswa::with('kelas')->latest()->get();
        return view('public.siswa.siswa', compact('siswa'));
    }
}