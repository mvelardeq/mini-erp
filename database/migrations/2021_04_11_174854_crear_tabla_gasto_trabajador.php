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
            $table->unsignedBigInteger('ot_id');
            $table->foreign('ot_id','fk_gastotrabajadorot_ot')->references('id')->on('ot')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_gasto_id');
            $table->foreign('tipo_gasto_id','fk_gastotrabajador_tipogastotrabajador')->references('id')->on('tipo_gasto')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_gasto_id');
            $table->foreign('estado_gasto_id','fk_gastotrabajador_estadogasto')->references('id')->on('estado_gasto')->onDelete('restrict')->onUpdate('restrict');
            $table->double('pago',6,2);
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
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
