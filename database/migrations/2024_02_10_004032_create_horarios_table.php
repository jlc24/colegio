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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->date('dia_semana');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('ca_id');
            $table->foreignId('pa_id');
            $table->string('gestion', 10);
            $table->integer('estado');
            $table->foreignId('curso_aula_id');
            $table->foreignId('profesor_asignatura_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
