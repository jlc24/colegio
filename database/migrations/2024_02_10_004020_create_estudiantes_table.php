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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 50);
            $table->string('nombres', 150);
            $table->string('apellidos', 150);
            $table->string('direccion', 255);
            $table->date('fec_nac');
            $table->string('genero', 50);
            $table->string('email', 255);
            $table->string('telefono', 20);
            $table->unsignedSmallInteger('estado')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
