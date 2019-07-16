<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformesEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes_evaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rubro_id')->unsigned();
            $table->foreign('rubro_id')->references('id')->on('rubros')->onDelete('cascade');
            $table->integer('informe_id')->unsigned();
            $table->foreign('informe_id')->references('id')->on('informe_visitas')->onDelete('cascade');
            $table->integer('vivienda_id')->unsigned();
            $table->foreign('vivienda_id')->references('id')->on('viviendas')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->decimal('quantity',8,2);
            $table->integer('value');
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
        Schema::dropIfExists('informes_evaluacion');
    }
}
