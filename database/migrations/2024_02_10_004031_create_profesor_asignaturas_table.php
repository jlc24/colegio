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
        Schema::create('profesor_asignaturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesor_id');
            $table->foreignId('asignatura_id');
            $table->string('gestion', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_asignaturas');
    }
};
