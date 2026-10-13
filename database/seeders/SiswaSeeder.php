<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = Kelas::first();

        if (!$kelas) {
            $kelas = Kelas::create(['nama_kelas' => 'X IPA 1']);
        }

        Siswa::create([
            'nisn' => '1234567890',
            'nama' => 'Parisa Nur Esa',
            'id_kelas' => $kelas->id_kelas,
            'jenis_kelamin' => 'Perempuan',
            'tahun_masuk' => '2024',
            'alamat' => 'Tasikmalaya',
            'mapel' => 'IPA'
        ]);
    }
}