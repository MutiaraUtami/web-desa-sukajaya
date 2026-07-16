<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPenduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan', 'tahun', 
        'awal_lk', 'awal_pr',
        'lahir_lk', 'lahir_pr', 
        'mati_lk', 'mati_pr',
        'pindah_lk', 'pindah_pr', 
        'datang_lk', 'datang_pr',
        'akhir_lk', 'akhir_pr',
        'jumlah_kk', 'wajib_ktp', 
        'ktp_sudah', 'ktp_belum', 
        'kk_sudah', 'kk_belum', 
        'keterangan'
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