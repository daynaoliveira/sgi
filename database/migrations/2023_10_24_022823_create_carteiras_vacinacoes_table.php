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
        Schema::create('carteiras_vacinacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_estoque');
            $table->unsignedBigInteger('id_usuario_vacina');
            $table->date('data_vacinacao');
            $table->integer('dose');
            $table->timestamps();

            $table->foreign('id_paciente')->references('id')->on('pacientes')
            ->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('id_estoque')->references('id')->on('estoques')
            ->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('id_usuario_vacina')->references('id')->on('users')
            ->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carteiras_vacinacoes');
    }
};
