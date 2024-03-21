<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('documento');
            $table->string('telefono')->nullable();
            $table->string('correo');
            $table->string('direccion');
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('cascade');
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
        Schema::dropIfExists('usuarios');
       
    }
};
