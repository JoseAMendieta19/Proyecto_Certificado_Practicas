<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carreras', function (Blueprint $table) {
            // Elimina el UNIQUE actual sobre nombre
            $table->dropUnique('carreras_nombre_unique');

            // Crea UNIQUE compuesto (nombre + institucion)
            $table->unique(
                ['nombre', 'institucion_id'],
                'carreras_nombre_institucion_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::table('carreras', function (Blueprint $table) {
            // Revierte el UNIQUE compuesto
            $table->dropUnique('carreras_nombre_institucion_unique');

            // Restaura UNIQUE solo en nombre
            $table->unique('nombre', 'carreras_nombre_unique');
        });
    }
};
