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
            $table->unsignedBigInteger('cuenta_contable_id');
            $table->foreign('cuenta_contable_id','fk_asientocuenta_cuentacontable')->references('id')->on('cuenta_contable')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('asiento_contable_id');
            $table->foreign('asiento_contable_id','fk_asientocuenta_asientocontable')->references('id')->on('asiento_contable')->onDelete('restrict')->onUpdate('restrict');
            $table->double('debe',8,2)->default(0);
            $table->double('haber',8,2)->default(0);
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
        Schema::dropIfExists('asiento_cuenta');
    }
}
