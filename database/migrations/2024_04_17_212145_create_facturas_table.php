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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->string('numero_factura', 20);
            $table->date('fecha');
            $table->date('fecha_limite');
            $table->string('descripcion');
            $table->decimal('iva',10,2)->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('total', 10, 2);
            $table->timestamps();
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
};
