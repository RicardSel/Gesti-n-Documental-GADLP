<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_archivos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recepcion_id')->unsigned();
            $table->string('descripcion', 255);
            $table->string('archivo', 255);
            $table->timestamps();

            $table->foreign('recepcion_id')->references('id')->on('recepcion_documentos')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_archivos');
    }
}
