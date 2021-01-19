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
            $table->unsignedBigInteger('contrato_id');
            $table->foreign('contrato_id','fk_conceptopago_contrato')->references('id')->on('contrato')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_conceptopago_id')->default(1);
            $table->foreign('estado_conceptopago_id','fk_conceptopago_estadoconceptopago')->references('id')->on('estado_conceptopago')->onDelete('restrict')->onUpdate('restrict');
            $table->string('concepto',400);
            $table->unsignedInteger('porcentaje');
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
