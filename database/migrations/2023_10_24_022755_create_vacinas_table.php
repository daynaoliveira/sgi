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
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();
            $table->string('vacina', 100);
            $table->text('descricao');
            $table->string('idade_minima', 50);
            $table->string('idade_maxima', 50)->nullable();
            $table->integer('qtd_dose');
            $table->string('tempo_espera_dose', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacinas');
    }
};
