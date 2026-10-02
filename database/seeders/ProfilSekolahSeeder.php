<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;

class ProfilSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        ProfilSekolah::create([
            'nama_sekolah' => 'SMA Negeri 24 Bandung',
            'kepala_sekolah' => 'Lia Aprilina, S.Pd., M.Pd.',
            'foto' => 'gedung_sekolah.jpg',
            'logo' => 'profil/logo_sekolah.png',
            'npsn' => '20219248',
            'alamat' => 'Jl. A.H Nasution No. 27, Kota Bandung, Jawa Barat',
            'kontak' => '(022) 7800195',
            'visi_misi' => "VISI
            Terwujudnya lulusan unggul, berkarakter yang dilandasi ketaatan beragama, berbudaya, berbasis lingkungan dan berperilaku hidup bersih, sehat, sehingga mampu hidup selaras dengan tuntutan era global.
            MISI
            1.     Mengembangkan pembelajaran yang aktif, inovatif, dan berbasis teknologi
            2.     Meningkatkan kompetensi akademik dan non-akademik
            3.     Mengembangkan keterampilan hidup (life skills) dan kewirausahaan
            4.     Membentuk karakter peserta didik yang santun, jujur, dan berempati
            5.     Menanamkan sikap disiplin, tanggung jawab, dan kejujuran
            6.     Menguatkan nilai keagamaan berdasarkan IMTAQ dalam sikap dan perilaku
            7.     Mendorong peserta didik bertindak sesuai norma agama dan sosial
            8.     Mengembangkan budaya sekolah yang menjunjung tinggi nilai kebenaran
            9.     Membiasakan budaya saling menghargai dan gotong royong
            10.  Mendorong kreativitas dan inovasi berbasis budaya dan lingkungan
            11 .   Menanamkan perilaku hidup bersih dan sehat (PHBS) dalam kehidupan sehari-hari
            12.   Mengembangkan program kesehatan fisik dan mental peserta didik
            13.   Mewujudkan lingkungan sekolah yang aman, bersih, hijau, dan nyaman
            14     Membekali peserta didik dengan keterampilan abad 21
            15.    Membiasakan peserta didik adaptif terhadap perubahan global
            16.    Mengembangkan Gapura Pancawaluya sebagai gerakan sekolah dalam menumbuhkan identitas, karakter, dan kebanggaan bersama. ",
            'tahun_berdiri' => 1967,
            'deskripsi' => 'SMA Negeri 24 Bandung merupakan sekolah menengah atas negeri yang berada di Kota Bandung, Jawa Barat.'
        ]);

    

    }
}
