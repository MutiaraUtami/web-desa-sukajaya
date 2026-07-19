<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::dropIfExists('apbdes');
    
    Schema::create('apbdes', function (Blueprint $table) {
        $table->id();
        $table->string('tahun_anggaran')->unique(); // Ubah jadi tahun_anggaran
        $table->string('file_pdf');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};