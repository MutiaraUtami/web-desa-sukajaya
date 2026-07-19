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
        Schema::create('lembaga_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga');
            $table->string('slug')->unique(); // Biar URL-nya cantik kayak berita
            $table->text('deskripsi');
            $table->string('file_pdf')->nullable(); // Nyimpen path file PDF
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_desas');
    }
};
