<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\ProfilSekolah;
use App\Models\Siswa;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalGuru            = Guru::count();
        $totalSiswa           = Siswa::count();
        $totalBerita          = Berita::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalGaleri          = Galeri::count();
        $totalPrestasi        = Prestasi::count();

        $profilSekolah   = ProfilSekolah::first();
        $beritaTerbaru   = Berita::with('user')->latest('tanggal')->take(5)->get();
        $prestasiTerbaru = Prestasi::orderBy('tahun', 'desc')
                            ->orderBy('id_prestasi', 'desc')->take(5)->get();

        return view('admin.dashboard', [
            'title'                => 'Dashboard',
            'totalGuru'            => $totalGuru,
            'totalSiswa'           => $totalSiswa,
            'totalBerita'          => $totalBerita,
            'totalEkstrakurikuler' => $totalEkstrakurikuler,
            'totalGaleri'          => $totalGaleri,
            'totalPrestasi'        => $totalPrestasi,
            'profilSekolah'        => $profilSekolah,
            'beritaTerbaru'        => $beritaTerbaru,
            'prestasiTerbaru'      => $prestasiTerbaru,
        ]);
    }

    public function publicDashboard()
    {
        // $profilSekolah = ProfilSekolah::first();

        // return view('public.index', [
        //     'title'         => 'Beranda Website Sekolah',
        //     'profilSekolah' => $profilSekolah,
        // ]);

        $profilSekolah = ProfilSekolah::first();

        $totalSiswa = class_exists(Siswa::class) ? Siswa::count() : 1364;
        $totalGuru = class_exists(Guru::class) ? Guru::count() : 83;
        $totalPrestasi = class_exists(Prestasi::class) ? Prestasi::count() : 1;

        $ekstrakurikuler = Ekstrakurikuler::take(3)->get();
        $guru = class_exists(Guru::class) ? Guru::take(8)->get() : collect();

        // FILTER BERITA HANYA YANG PUBLIS
        $berita = class_exists(Berita::class)
            ? Berita::whereIn('status', ['publis', 'publish', 'published'])
                ->latest('tanggal')
                ->take(3)
                ->get()
            : collect();

        $galeri = class_exists(Galeri::class) ? Galeri::latest()->take(4)->get() : collect();
        $prestasi = class_exists(Prestasi::class) ? Prestasi::latest()->take(4)->get() : collect();

        return view('public.index', compact(
            'profilSekolah',
            'totalSiswa',
            'totalGuru',
            'totalPrestasi',
            'ekstrakurikuler',
            'guru',
            'berita',
            'galeri',
            'prestasi'
        ));
    }

}
