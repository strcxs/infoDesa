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
        Schema::create('geo', function (Blueprint $table) {
            $table->string('id')->nullable();
            $table->string('kode_desa')->nullable();
            $table->string('tahun_pembentukan')->nullable();
            $table->string('dasar_hukum')->nullable();
            $table->string('tipologi')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->string('kategori')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('batas_utara')->nullable();
            $table->string('batas_selatan')->nullable();
            $table->string('batas_timur')->nullable();
            $table->string('batas_barat')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geo');
    }
};
