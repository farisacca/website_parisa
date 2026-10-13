<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->year('tahun_masuk');
            $table->text('alamat')->nullable();
            $table->string('mapel')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};