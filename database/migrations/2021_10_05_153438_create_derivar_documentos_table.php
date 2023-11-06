<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDerivarDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('derivar_documentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recepcion_id')->unsigned();
            $table->date('fecha');
            $table->time('hora');
            $table->bigInteger('area_id')->unsigned();
            $table->string('caracter');
            $table->string('anexos', 255)->nullable();
            $table->date('fecha_registro');
            $table->timestamps();

            $table->foreign('recepcion_id')->references('id')->on('recepcion_documentos')->ondelete('no action')->onupdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('derivar_documentos');
    }
}
