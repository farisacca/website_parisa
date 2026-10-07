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
        //
        Prestasi::create([
            'nama_prestasi'     => 'Juara 1 Lomba Karya Tulis Ilmiah Remaja Tingkat Kota Bandung',
            'pemenang'          => 'Tim Kir SMAN 24',
            'event'             => 'Olimpiade Sains & Karya Ilmiah 2026',
            'tingkat'           => 'Sekolah',
            'kategori'          => 'AKADEMIK',
            'deskripsi'         => 'Meraih peringkat pertama dalam kompetisi karya tulis ilmiah.',
            'tahun'             => 2026,
        ]);
    }
}
