<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeloUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelo_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->text('contenido');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps('creacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modelo_usuarios');
    }
}
