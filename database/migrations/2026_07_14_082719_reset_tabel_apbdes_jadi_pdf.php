<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Hapus paksa tabel APBDes yang lama tanpa nyentuh tabel lain
        Schema::dropIfExists('apbdes');

        // 2. Bikin tabel APBDes baru dengan struktur PDF
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_anggaran')->unique();
            $table->string('file_pdf');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};