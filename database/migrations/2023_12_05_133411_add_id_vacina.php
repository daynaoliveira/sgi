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
        Schema::table('carteiras_vacinacoes', function(Blueprint $table) {
            $table->unsignedBigInteger('id_vacina');

            $table->foreign('id_vacina')->references('id')->on('vacinas')
            ->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carteiras_vacinacoes', function($table) {
            $table->dropForeign(['id_vacina']);

            $table->dropColumn('id_vacina');
        });
    }
};
