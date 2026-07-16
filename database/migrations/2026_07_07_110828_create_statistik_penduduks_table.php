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
            $table->string('bulan'); // Contoh: 'Januari', 'Februari'
            $table->integer('tahun'); // Contoh: 2025, 2026
            
            // Penduduk Awal Bulan
            $table->integer('awal_lk')->default(0);
            $table->integer('awal_pr')->default(0);

            // Mutasi Kependudukan (Lahir, Mati, Pindah, Datang)
            $table->integer('lahir_lk')->default(0);
            $table->integer('lahir_pr')->default(0);
            $table->integer('mati_lk')->default(0);
            $table->integer('mati_pr')->default(0);
            $table->integer('pindah_lk')->default(0);
            $table->integer('pindah_pr')->default(0);
            $table->integer('datang_lk')->default(0);
            $table->integer('datang_pr')->default(0);

            // Penduduk Akhir Bulan (Sebenarnya bisa dihitung otomatis, tapi lebih baik disimpan sebagai cache)
            $table->integer('akhir_lk')->default(0);
            $table->integer('akhir_pr')->default(0);

            // Kepemilikan Dokumen (KK & KTP)
            $table->integer('jumlah_kk')->default(0);
            $table->integer('wajib_ktp')->default(0);
            $table->integer('ktp_sudah')->default(0);
            $table->integer('ktp_belum')->default(0);
            $table->integer('kk_sudah')->default(0);
            $table->integer('kk_belum')->default(0);

            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistik_penduduks');
    }
};