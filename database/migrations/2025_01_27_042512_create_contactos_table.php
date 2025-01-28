<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("correo")->unique();
            $table->string("apellidoPaterno");
            $table->string("apellidoMaterno");
            $table->string("lada");
            $table->string("telefono", 10);
            $table->string("estado");
            $table->string("dirreccion");
            $table->string("origen");
            $table->string("etiqueta");
            $table->string("asignar");
            $table->string("fechaNacimiento");
            $table->string("origen2");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactos');
    }
};
