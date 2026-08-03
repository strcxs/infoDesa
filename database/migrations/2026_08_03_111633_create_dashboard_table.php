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
        Schema::create('dashboard', function (Blueprint $table) {
            $table->string('id')->nullable();
            $table->string('about')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('demografis')->nullable();
            $table->string('kades_image')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard');
    }
};
