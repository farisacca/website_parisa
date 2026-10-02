<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nama_guru',
        'nip',
        'mapel',
        'foto',
    ];

    public function ekstrakurikuler() : HasMany 
    {
        return $this->hasMany(Ekstrakurikuler::class, 'id_guru', 'id_guru');
        
    }
}
