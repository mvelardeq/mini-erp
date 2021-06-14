<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPagoServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servicio_tercero_id');
            $table->foreign('servicio_tercero_id','fk_pagoserviciotercero_pagoservicio')->references('id')->on('servicio_tercero')->onDelete('restrict')->onUpdate('restrict');
            $table->double('pago',7,2);
            $table->date('fecha_pago');
            $table->string('proveedor',200)->nullable();
            $table->string('ruc_proveedor',11)->nullable();
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('pago_servicio');
    }
}
