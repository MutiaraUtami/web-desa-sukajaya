<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'gambar', 'ringkasan', 'isi', 'penulis', 'tanggal_terbit',
    ];

    protected $casts = [
        'tanggal_terbit' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $slug = Str::slug($berita->judul);
                $original = $slug;
                $i = 1;
              
            while (static::query()->where('slug', $slug)->exists()) {
                $slug = $original . '-' . $i++;
            }
                $berita->slug = $slug;
            }
        });
    }
}
