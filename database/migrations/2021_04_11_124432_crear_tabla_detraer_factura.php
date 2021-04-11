<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDetraerFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detraer_factura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factura_id')->unique();
            $table->foreign('factura_id','fk_detraerfactura_factura')->references('id')->on('factura')->onDelete('restrict')->onUpdate('restrict');
            $table->double('pago_detraccion',6,2);
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
        Schema::dropIfExists('detraer_factura');
    }
}
