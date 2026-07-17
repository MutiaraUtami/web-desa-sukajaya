<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPenduduk extends Model
{
    use HasFactory;

    // Ganti isi $fillable ini agar semua data diizinkan masuk ke database
    protected $fillable = [
        'bulan',
        'tahun',
        'dusun_rw',
        'jumlah_kk',
        'laki_laki',
        'perempuan',
        'usia_0_14',
        'usia_15_64',
        'usia_65_keatas',
    ];

    // Accessor untuk total penduduk awal bulan
    public function getTotalAwalAttribute(): int
    {
        return $this->awal_lk + $this->awal_pr;
    }

    // Accessor untuk total penduduk akhir bulan
    public function getTotalAkhirAttribute(): int
    {
        return $this->akhir_lk + $this->akhir_pr;
    }
}