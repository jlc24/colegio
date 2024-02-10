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
            $table->unsignedBigInteger('ca_id');
            $table->unsignedBigInteger('pa_id');
            $table->string('gestion', 10);
            $table->unsignedSmallInteger('estado')->default('1');
            $table->timestamps();

            $table->foreign('ca_id')->references('id')->on('curso_aulas');
            $table->foreign('pa_id')->references('id')->on('profesor_asignaturas');
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
