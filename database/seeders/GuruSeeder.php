<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            Guru::create([
                'nama_guru' => 'Arin Tentrem Mawati S.Pd, M.M.Pd',
                'nip' => ' 197001312008012009',
                'mapel' => 'Kimia',
                'foto' => 'guru/arin_tentrem.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Baran Bhuana S.Pd',
                'nip' => '198706112024211011',
                'mapel' => 'Seni Budaya, Pembelajaran Berbasis Projek',
                'foto' => 'guru/baran.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Dedy Hermawan S.Pd',
                'nip' => ' 196806111991011001',
                'mapel' => 'Matematika Tingkat Lanjut, Matematika(Umum)',
                'foto' => 'guru/dedy.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Dewi Melianasari S.Pd',
                'nip' => '197706232000122001',
                'mapel' => 'Bimbingan dan Konseling/Konselor(BP/BK)',
                'foto' => 'guru/dewi.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Dian Brilyan Priyangga S.Pd',
                'nip' => '199804032025211072',
                'mapel' => 'Muatan Lokal Bahasa Daerah, Pembelajaran Berbasis Projek',
                'foto' => 'guru/dian.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Firdaus Sholeh S.Pd',
                'nip' => ' 196904142007011011',
                'mapel' => 'Matematika(Umum)',
                'foto' => 'guru/firdaus.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Isri Nurwindasari Hadadi S.Pd',
                'nip' => '199301132025212123',
                'mapel' => 'Muatan Lokal Bahasa Daerah, Pembelajaran Berbasis Projek',
                'foto' => 'guru/isri.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Jajang Wahyudin, S.TS.Pd',
                'nip' => ' 199001012023211018',
                'mapel' => 'Informatika',
                'foto' => 'guru/jajang.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Kurnia Andari S.Pd',
                'nip' => ' 199303282023212030',
                'mapel' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan',
                'foto' => 'guru/kurnia.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Muhamad Reza S.Pd',
                'nip' => ' 199112052025211140',
                'mapel' => 'Bimbingan dan Konseling/Konselor (BP/BK)',
                'foto' => 'guru/muhamad_reza.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Ridwan Abdulah S.Pd',
                'nip' => ' 199602142025211114',
                'mapel' => 'Pendidikan Pancasila',
                'foto' => 'guru/ridwan.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Rika Yanuarika S.Pd',
                'nip' => '197901112025212032',
                'mapel' => 'Bahasa Inggris Tingat Lanjut, Bahasa Inggris',
                'foto' => 'guru/rika.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Rizky Alfi Habibillah S.Pd',
                'nip' => ' 199607042025211117',
                'mapel' => 'Sejarah',
                'foto' => 'guru/rizky.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Syarif Hidayat S.Pd',
                'nip' => '197805112025211046',
                'mapel' => 'Pendidikan Agama Islam dan Budi Pekerti',
                'foto' => 'guru/syarif.jpg',
            ]);

            Guru::create([
                'nama_guru' => 'Syifa nuraini latifah S.Pd',
                'nip' => '199205032025212139',
                'mapel' => 'Bahasa Indonesia',
                'foto' => 'guru/syifa.jpg',
            ]);
    }
}
