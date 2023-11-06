<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_documentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recepcion_id')->unsigned();
            $table->date('fecha');
            $table->time('hora');
            $table->string('nombre_receptor', 255);
            $table->string('cargo_receptor', 255);
            $table->date('fecha_registro');
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
        Schema::dropIfExists('salida_documentos');
    }
}
