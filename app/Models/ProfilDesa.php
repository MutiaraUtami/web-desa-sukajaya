<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    // Wajib ditambahin biar Laravel tau nama aslinya
    protected $table = 'profil_desa';

    protected $fillable = [
        'nama_desa',
        'logo',
        'sejarah',
        'visi',
        'misi',
        'geografis'
    ];
}