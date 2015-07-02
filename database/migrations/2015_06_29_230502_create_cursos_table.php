<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre', 60);
            $table->integer('id_profesor')->unsigned();
            $table->foreign('id_profesor')->references('id')->on('profesors');
            $table->string('descripcion', 200);
            $table->string('periodo');
            $table->text('anio',5);
            $table->date('fecha_inicio');
            
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
        Schema::drop('cursos');
    }
}
