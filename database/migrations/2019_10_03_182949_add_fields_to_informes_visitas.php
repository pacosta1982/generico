<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToInformesVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe_visitas', function (Blueprint $table) {
            //
            $table->string('fiscal')->unsigned()->nullable();
            $table->string('residente')->unsigned()->nullable();
            $table->string('libro')->unsigned()->nullable();
            $table->string('plano')->unsigned()->nullable();
            $table->string('material')->unsigned()->nullable();
            $table->string('mano')->unsigned()->nullable();
            $table->string('cronograma')->unsigned()->nullable();

            $table->string('obsuno')->unsigned()->nullable();
            $table->string('obsdos')->unsigned()->nullable();
            $table->string('obstres')->unsigned()->nullable();
            $table->string('obscuatro')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informes_visitas', function (Blueprint $table) {
            //
            $table->dropColumn('fiscal');
            $table->dropColumn('residente');
            $table->dropColumn('libro');
            $table->dropColumn('plano');
            $table->dropColumn('material');
            $table->dropColumn('mano');
            $table->dropColumn('cronograma');
            $table->dropColumn('obsuno');
            $table->dropColumn('obsdos');
            $table->dropColumn('obstres');
            $table->dropColumn('obscuatro');
        });
    }
}
