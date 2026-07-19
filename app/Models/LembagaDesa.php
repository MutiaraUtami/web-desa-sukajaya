<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LembagaDesa extends Model
{
    protected $fillable = ['nama_lembaga', 'slug', 'deskripsi', 'file_pdf'];
}