<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('practicas', function (Blueprint $table) {
            $table->string('anio_lectivo', 10)->after('user_id')->nullable();
            // Ejemplo: "2025-1", "2025-2", "2026-1"
        });
    }

    public function down()
    {
        Schema::table('practicas', function (Blueprint $table) {
            $table->dropColumn('anio_lectivo');
        });
    }
};