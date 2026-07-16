<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            // Menggunakan tipe enum untuk membatasi input hanya pada 3 pilihan tersebut
            $table->enum('tingkat_perkembangan', ['Swadaya', 'Swakarya', 'Swasembada'])
                  ->nullable()
                  ->after('id'); // Sesuaikan posisi kolom jika diperlukan
        });
    }

    public function down(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            $table->dropColumn('tingkat_perkembangan');
        });
    }
};