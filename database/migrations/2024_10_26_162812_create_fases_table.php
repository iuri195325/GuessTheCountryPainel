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
        Schema::create('tb_fases', function (Blueprint $table) {
            $table->id();
            $table->integer('fase_number')->comment('Numero da Fase');
            $table->foreignId('correct_op')->references('id')->on('tb_countrys')->comment('Opção Correta');
            $table->foreignId('first_op')->references('id')->on('tb_countrys')->comment('Opções para escolha');
            $table->foreignId('second_op')->references('id')->on('tb_countrys')->comment('Opções para escolha');
            $table->foreignId('third_op')->references('id')->on('tb_countrys')->comment('Opções para escolha');
            $table->foreignId('fourth_op')->references('id')->on('tb_countrys')->comment('Opções para escolha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fases');
    }
};
