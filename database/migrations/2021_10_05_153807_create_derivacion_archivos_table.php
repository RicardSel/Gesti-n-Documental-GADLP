<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDerivacionArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('derivacion_archivos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('derivacion_id')->unsigned();
            $table->string('descripcion', 255);
            $table->string('archivo', 255);
            $table->timestamps();

            $table->foreign('derivacion_id')->references('id')->on('derivar_documentos')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('derivacion_archivos');
    }
}
