<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ekstrakurikuler extends Model
{
    /** @use HasFactory<\Database\Factories\EkstrakurikulerFactory> */
    use HasFactory;

    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_eskul';

    protected $fillable = [
        'nama_eskul',
        'id_guru',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];

    public function guru() : BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');        
    }
}
