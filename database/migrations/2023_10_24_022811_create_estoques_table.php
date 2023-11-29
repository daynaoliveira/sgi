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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_unidade');
            $table->unsignedBigInteger('id_vacina');
            $table->unsignedBigInteger('id_usuario');
            $table->string('lote', 50);
            $table->date('validade');
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('id_unidade')->references('id')->on('unidades_saudes')
            ->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('id_vacina')->references('id')->on('vacinas')
            ->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('id_usuario')->references('id')->on('users')
            ->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
