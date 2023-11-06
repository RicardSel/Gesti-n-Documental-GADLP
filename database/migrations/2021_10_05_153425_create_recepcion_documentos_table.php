<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 255)->unique();
            $table->bigInteger('incremento');
            $table->string('qr', 255);
            $table->date('fecha_recepcion');
            $table->time('hora_recepcion');
            $table->bigInteger('institucion_id')->unsigned();
            $table->string('nombre_remitente', 255);
            $table->string('cargo_remitente', 255);
            $table->string('asunto');
            $table->bigInteger('area_id')->unsigned();
            $table->string('caracter');
            $table->string('anexos', 255)->nullable();
            $table->string('nombre_receptor', 255);
            $table->string('cargo_receptor', 255);
            $table->bigInteger('clasificacion_id')->unsigned();
            $table->string('estado');
            $table->date('fecha_registro');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('institucion_id')->references('id')->on('institucions')->ondelete('no action')->onupdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->ondelete('no action')->onupdate('cascade');
            $table->foreign('clasificacion_id')->references('id')->on('clasificacion_documentos')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepcion_documentos');
    }
}
