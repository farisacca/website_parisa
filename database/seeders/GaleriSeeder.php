<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Galeri::create([
            'judul' => 'Kegiatan Belajar',
            'keterangan' => 'Dokumentasi kegiatan pembelajaran yang dilaksanakan dilab',
            'file' => 'galeri/kegiatan-pembelajaran.jpg',
            'kategori' => 'foto',
            'tanggal' => '2026-08-08',
        ]);
    }
}
