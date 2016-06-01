<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeloCompartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelo_compartidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emisor');
            $table->string('destinatario');
            $table->integer('id_modelo');
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
        Schema::drop('modelo_compartidos');
    }
}
