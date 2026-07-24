<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('realisasi_apbdes', function (Blueprint $table) {
        $table->id();
        $table->string('tahun_anggaran'); // Tadi tulisannya 'tahun', kita ganti jadi ini
        $table->string('file_pdf');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasi_apbdes');
    }
};
