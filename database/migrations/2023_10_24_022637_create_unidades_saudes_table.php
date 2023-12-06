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
        Schema::create('unidades_saudes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_unidade_saude', 50);
            $table->char('cep', 8)->nullable();
            $table->string('numero', 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades_saudes');
    }
};
