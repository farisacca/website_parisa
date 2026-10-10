<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestasi::create([
            'nama_prestasi'     => 'Juara 1 Lomba Karya Tulis Ilmiah Remaja Tingkat Kota Bandung',
            'pemenang'          => 'Tim Kir SMAN 24',
            'event'             => 'Olimpiade Sains & Karya Ilmiah 2026',
            'tingkat'           => 'Kabupaten/Kota', // Sesuaikan dengan opsi enum validasi ('Sekolah', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional')
            'kategori'          => 'AKADEMIK',
            'deskripsi'         => 'Meraih peringkat pertama dalam kompetisi karya tulis ilmiah tingkat kota.',
            'tahun'             => 2026,
            'gambar'            => null, // Bisa diisi path gambar jika ada, misal: 'prestasi/contoh.jpg'
        ]);
    }
}
