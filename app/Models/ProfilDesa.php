<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilDesa extends Model
{

    protected $table = 'profil_desas';

    protected $fillable = [
        'nama_desa', 'sambutan', 'visi', 'misi', 'sejarah', 'geografis',
        'luas_wilayah', 'batas_utara', 'batas_selatan', 'batas_timur', 'batas_barat',
        'peta_embed', 'alamat_kantor', 'telepon', 'email',
    ];

   public static function get(): self
    {
    return static::query()->firstOrCreate([]);
    }
}
