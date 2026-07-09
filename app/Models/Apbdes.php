<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    use HasFactory;

    protected $table = 'apbdes';

    protected $fillable = [
        'tahun_anggaran', 'jenis', 'bidang', 'uraian', 'anggaran', 'realisasi', 'keterangan',
    ];

    public function getSelisihAttribute()
    {
        return $this->anggaran - $this->realisasi;
    }
}
