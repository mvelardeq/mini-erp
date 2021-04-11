<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaGastoTrabajador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto_trabajador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id')->unique();
            $table->foreign('trabajador_id','fk_gastotrabajador_trabajador')->references('id')->on('trabajador')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_gasto_id')->unique();
            $table->foreign('tipo_gasto_id','fk_tipogastotrabajador_gastotrabajador')->references('id')->on('tipo_gasto')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_gasto_id')->unique();
            $table->foreign('estado_gasto_id','fk_estadogastotrabajador_estadogasto')->references('id')->on('estado_gasto')->onDelete('restrict')->onUpdate('restrict');
            $table->double('pago',5,2);
            $table->date('fecha');
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
        Schema::dropIfExists('gasto_trabajador');
    }
}
