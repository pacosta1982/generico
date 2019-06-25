<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRubroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_rubro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->unsigned();
            //$table->foreign('project_id')->references('SEOBId')->on('categoria')->onDelete('cascade');
            $table->integer('rubro_id')->unsigned();
            $table->foreign('rubro_id')->references('id')->on('rubros')->onDelete('cascade');
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('units')->onDelete('cascade');
            $table->decimal('quantity',8,2);
            $table->integer('unit_price');
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
        Schema::dropIfExists('project_rubro');
    }
}
