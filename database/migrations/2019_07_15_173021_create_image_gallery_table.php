<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('informe_id')->unsigned();
            $table->foreign('informe_id')->references('id')->on('informe_visitas')->onDelete('cascade');
            $table->integer('vivienda_id')->unsigned();
            $table->foreign('vivienda_id')->references('id')->on('viviendas')->onDelete('cascade');
            $table->string('image');
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
        Schema::dropIfExists('image_gallery');
    }
}
