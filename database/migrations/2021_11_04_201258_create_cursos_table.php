<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anio_id')->unsigned();
            $table->bigInteger('materia_id')->unsigned();
            $table->bigInteger('division_id')->unsigned();
            //$table->bigInteger('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('anio_id')->references('id')->on('anios');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('division_id')->references('id')->on('divisions');
            //$table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
