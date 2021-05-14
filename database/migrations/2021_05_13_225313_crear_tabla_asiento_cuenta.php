<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsientoCuenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asiento_cuenta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuentacontable_id');
            $table->foreign('cuentacontable_id','fk_asientocuenta_cuentacontable')->references('id')->on('cuenta_contable')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('asientocontable_id');
            $table->foreign('asientocontable_id','fk_asientocuenta_asientocontable')->references('id')->on('asiento_contable')->onDelete('restrict')->onUpdate('restrict');
            $table->double('debe',6,2)->nullable();
            $table->double('haber',6,2)->nullable();
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
        Schema::dropIfExists('asiento_cuenta');
    }
}
