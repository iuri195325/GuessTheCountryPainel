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
        Schema::create('tb_fase_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fase_id')->references('id')->on('tb_fases');
            $table->integer('level_number')->comment('Level de Dificuldade Referente a Fase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fase_levels');
    }
};
