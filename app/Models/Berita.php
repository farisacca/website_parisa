<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Database\Factories\BeritaFactory;

class Berita extends Model
{
    /** @use HasFactory<\Database\Factories\BeritaFactory> */
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status',
        'gambar',
        'id_user',
    ]; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    
}
