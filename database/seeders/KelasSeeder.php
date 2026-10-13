<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $kelasList = [
            'X IPA 1',
            'X IPA 2',
            'XI IPA 1',
            'XI IPA 2',
            'XII IPA 1',
            'XII IPA 2',
            'X IPS 1',
            'X IPS 2',
            'XI IPS 1',
            'XI IPS 2',
            'XII IPS 1',
            'XII IPS 2',
        ];

        foreach ($kelasList as $nama) {
            Kelas::firstOrCreate(['nama_kelas' => $nama]);
        }
    }
}