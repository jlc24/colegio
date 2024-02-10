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
        Schema::create('profesors', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 50);
            $table->string('nombres', 150);
            $table->string('apellidos', 150);
            $table->string('direccion', 255);
            $table->date('fec_nac');
            $table->string('especialidad', 150);
            $table->string('email', 255);
            $table->string('telefono', 20);
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesors');
    }
};
