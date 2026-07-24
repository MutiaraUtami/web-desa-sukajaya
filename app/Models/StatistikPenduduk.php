<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPenduduk extends Model
{
    use HasFactory;

    // WAJIB ADA: Buka gembok keamanan (Mass Assignment) biar inputan form bisa tersimpan ke database
    protected $guarded = [];

    // ==========================================================
    // RUMUS AUTO-HITUNG (Ini yang bikin kolom JML & AKHIR otomatis)
    // ==========================================================

    public function getAwalJmlAttribute() { 
        return (int)$this->awal_lk + (int)$this->awal_pr; 
    }
    
    public function getMatiJmlAttribute() { 
        return (int)$this->mati_lk + (int)$this->mati_pr; 
    }
    
    public function getLahirJmlAttribute() { 
        return (int)$this->lahir_lk + (int)$this->lahir_pr; 
    }
    
    public function getPindahJmlAttribute() { 
        return (int)$this->pindah_lk + (int)$this->pindah_pr; 
    }
    
    public function getDatangJmlAttribute() { 
        return (int)$this->datang_lk + (int)$this->datang_pr; 
    }

    public function getAkhirLkAttribute() {
        return (int)$this->awal_lk - (int)$this->mati_lk + (int)$this->lahir_lk - (int)$this->pindah_lk + (int)$this->datang_lk;
    }
    
    public function getAkhirPrAttribute() {
        return (int)$this->awal_pr - (int)$this->mati_pr + (int)$this->lahir_pr - (int)$this->pindah_pr + (int)$this->datang_pr;
    }
    
    public function getAkhirJmlAttribute() {
        return $this->akhir_lk + $this->akhir_pr;
    }
}