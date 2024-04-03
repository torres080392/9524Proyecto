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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable(); // Permitir valores nulos
            $table->unsignedBigInteger('condicion_id');
            $table->unsignedBigInteger('tipo_id');
            $table->string('nombre');
            $table->string('serial');
            $table->dateTime('compra')->nullable(); // Valor predeterminado: fecha y hora actual
            $table->dateTime('garatiaInicial')->nullable(); // Valor predeterminado: fecha y hora actual
            $table->dateTime('garatiaFinal')->nullable(); 
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null');
            $table->foreign('condicion_id')->references('id')->on('condicions')->onUpdate('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onUpdate('cascade');
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
        Schema::dropIfExists('equipos');
    }
};
