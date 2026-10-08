<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::first();
            Berita::create([
                'judul' => 'GIAT Steam di SMAN 4 Bandung',
                'slug' => Str::slug('GIAT Steam di SMAN 4 Bandung'),
                'isi' => 'SMAN 4 Bandung baru saja menjadi tuan rumah program Internasional STEAM. Kegiatan ini menjadi salah satu bentuk pengembangan pembelajaran berbasis sains, teknologi, teknik, seni, dan matematika.',
                'tanggal' => '2026-09-03',
                'status' => 'publis',
                'gambar' => 'berita/steam.jpg',
                'id_user' => $user->id_user,
            ]);

            Berita::create([
                'judul' => 'Milangkala SMAN 24 Bandung',
                'slug' => Str::slug('Milangkala SMAN 24 Bandung'),
                'isi' => 'Milangkala SMAN 24 Bandung',
                'tanggal' => '2026-08-27',
                'status' => 'publis',
                'gambar' => 'berita/milangka.jpg',
                'id_user' => $user->id_user,
            ]);

            Berita::create([
                'judul' => 'Kurikulum',
                'slug' => Str::slug('Kurikulum'),
                'isi' => 'SMAN 24 Bandung sudah menerapkan Kurikulum Merdeka sejak tahun 2023',
                'tanggal' => '2026-08-26',
                'status' => 'publis',
                'gambar' => 'berita/kurikulum.jpg',
                'id_user' => $user->id_user,
            ]);
    }
}
