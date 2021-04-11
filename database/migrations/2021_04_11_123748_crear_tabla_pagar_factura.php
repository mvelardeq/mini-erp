<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPagarFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagar_factura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factura_id')->unique();
            $table->foreign('factura_id','fk_pagarfactura_factura')->references('id')->on('factura')->onDelete('restrict')->onUpdate('restrict');
            $table->double('pago',6,2);
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
        Schema::dropIfExists('pagar_factura');
    }
}
