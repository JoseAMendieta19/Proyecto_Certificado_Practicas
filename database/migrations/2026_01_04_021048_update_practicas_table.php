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
        Schema::table('practicas', function (Blueprint $table) {

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('tipo', ['I', 'II']);
            $table->string('lugar_practica');
            $table->integer('horas_requeridas');

            $table->enum('estado', [
                'asignada',
                'pendiente_revision',
                'aprobada',
                'rechazada'
            ])->default('asignada');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('practicas', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'user_id',
                'tipo',
                'lugar_practica',
                'horas_requeridas',
                'estado'
            ]);
        });
    }
};
