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
            'gambar' => 'ekstrakurikuler/paskibra.jpeg',
        ]);

        Ekstrakurikuler::create([
            'nama_eskul' => 'Palang Merah Remaja/PMR SMAN 24 Bandung',
            'id_guru' => $guru?->id_guru,
            'jadwal_latihan' => 'Setiap Senin & Sabtu 15:30 WIB',
            'deskripsi' => 'Pasukan Palang Merah Remaja SMA Negeri 24 Bandung.',
            'gambar' => 'ekstrakurikuler/pmr.jpg',
        ]);

        Ekstrakurikuler::create([
            'nama_eskul' => 'Pramuka SMAN 24 Bandung',
            'id_guru' => $guru?->id_guru,
            'jadwal_latihan' => 'Setiap Senin & Kamis 15:30 WIB',
            'deskripsi' => 'Pasukan Pramuka SMA Negeri 24 Bandung.',
            'gambar' => 'ekstrakurikuler/pramuka.jpg',
        ]);

        Ekstrakurikuler::create([
            'nama_eskul' => 'Futsal SMAN 24 Bandung',
            'id_guru' => $guru?->id_guru,
            'jadwal_latihan' => 'Setiap Sabtu 15:30 WIB',
            'deskripsi' => 'Pasukan Pramuka SMA Negeri 24 Bandung.',
            'gambar' => 'ekstrakurikuler/pramuka.jpg',
        ]);
    }

}
