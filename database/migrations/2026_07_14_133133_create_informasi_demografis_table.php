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
        Schema::create('informasi_demografis', function (Blueprint $table) {
            $table->id();
            $table->string('mata_pencaharian')->nullable();
            $table->string('perekonomian')->nullable();
            $table->string('sarana_pendidikan')->nullable();
            $table->string('tempat_ibadah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_demografis');
    }
};
