<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRazonSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('razon_socials', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('alias')->nullable();
            $table->string('ciudad');
            $table->string('dir');
            $table->string('nit')->nullable();
            $table->string('nro_aut')->nullable();
            $table->string('fono');
            $table->string('cel');
            $table->string('casilla')->nullable();
            $table->string('correo')->nullable();
            $table->string('web')->nullable();
            $table->string('logo')->nullable();
            $table->string('actividad_economica');
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
        Schema::dropIfExists('razon_socials');
    }
}
