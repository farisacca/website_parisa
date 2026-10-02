<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $guru = Guru::where('nama_guru', 'Dedi Kurniawan, S.Pd.')->first();

        Ekstrakurikuler::create([
            'nama_eskul' => 'Paskibra SMAN 24 Bandung',
            'id_guru' => $guru?->id_guru,
            'jadwal_latihan' => 'Setiap Rabu & Sabtu 15:30 WIB',
            'deskripsi' => 'Pasukan Pengibar Bendera SMA Negeri 24 Bandung.',
            'gambar' => null,
        ]);
    }
}
