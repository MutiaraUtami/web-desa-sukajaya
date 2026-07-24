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
        $table->string('tahun');
        $table->string('bulan'); // Menyimpan angka bulan 01-12

        // Data Awal
        $table->integer('awal_lk')->default(0);
        $table->integer('awal_pr')->default(0);

        // Mutasi
        $table->integer('mati_lk')->default(0);
        $table->integer('mati_pr')->default(0);
        $table->integer('lahir_lk')->default(0);
        $table->integer('lahir_pr')->default(0);
        $table->integer('pindah_lk')->default(0);
        $table->integer('pindah_pr')->default(0);
        $table->integer('datang_lk')->default(0);
        $table->integer('datang_pr')->default(0);

        // Kepemilikan Dokumen
        $table->integer('jml_kk')->default(0);
        $table->integer('wajib_ktp')->default(0);
        $table->integer('ktp_sudah')->default(0);
        $table->integer('ktp_belum')->default(0);
        $table->integer('kk_sudah')->default(0);
        $table->integer('kk_belum')->default(0);

        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('statistik_penduduks');
    }
};