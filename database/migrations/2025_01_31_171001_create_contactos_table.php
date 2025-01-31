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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('apellidoP')->nullable();
            $table->string('apellidoM')->nullable();
            $table->string('correo')->nullable();
            $table->string('origen');
            $table->string('origen2');
            $table->string('lada')->nullable();
            $table->string('telefono', 10);
            $table->string('estado');
            $table->string('etiquetas')->nullable();
            $table->string('fechaNacimiento');
            $table->string('direccion');
            $table->string('asignar');
            $table->string('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
