<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('practicas', function (Blueprint $table) {
            $table->dropColumn('lugar_practica');
        });
    }

    public function down(): void
    {
        Schema::table('practicas', function (Blueprint $table) {
            $table->string('lugar_practica')->nullable();
        });
    }
};