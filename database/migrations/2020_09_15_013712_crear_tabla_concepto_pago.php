<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaConceptoPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto_pago', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_servicio_id');
            $table->foreign('equipo_servicio_id','fk_conceptopago_equiposervicio')->references('id')->on('equipo_servicio')->onDelete('restrict')->onUpdate('restrict');
            $table->string('concepto',400);
            $table->double('porcentaje', 3, 2);
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
        Schema::dropIfExists('concepto_pago');
    }
}
