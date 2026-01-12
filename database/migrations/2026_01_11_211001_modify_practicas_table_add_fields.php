<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('practicas', function (Blueprint $table) {
            // 1. Agregar nuevos campos
            $table->date('fecha_inicio')->nullable()->after('horas_requeridas');
            $table->date('fecha_finalizacion')->nullable()->after('fecha_inicio');
            $table->text('observaciones')->nullable()->after('archivo_url');
            
            // 2. Agregar nueva columna lugar_practica_id
            $table->unsignedBigInteger('lugar_practica_id')->nullable()->after('user_id');
            
            // 3. Crear foreign key
            $table->foreign('lugar_practica_id')
                    ->references('id')
                    ->on('lugares_practica')
                    ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('practicas', function (Blueprint $table) {
            // Eliminar foreign key primero
            $table->dropForeign(['lugar_practica_id']);
            
            // Eliminar columnas
            $table->dropColumn([
                'lugar_practica_id',
                'fecha_inicio',
                'fecha_finalizacion',
                'observaciones'
            ]);
        });
    }
};
