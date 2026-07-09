<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPenduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'dusun_rw', 'tahun', 'jumlah_kk', 'laki_laki', 'perempuan',
        'usia_0_14', 'usia_15_64', 'usia_65_keatas', 'keterangan',
    ];

    public function getTotalJiwaAttribute(): int
    {
        return $this->laki_laki + $this->perempuan;
    }
}
