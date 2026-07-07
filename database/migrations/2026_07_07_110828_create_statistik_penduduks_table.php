<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistik_penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('dusun_rw')->nullable();
            $table->integer('tahun');
            $table->integer('jumlah_kk')->default(0);
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->integer('usia_0_14')->default(0);
            $table->integer('usia_15_64')->default(0);
            $table->integer('usia_65_keatas')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistik_penduduks');
    }
};
