<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAnularFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anular_factura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factura_id')->unique();
            $table->foreign('factura_id','fk_anularfactura_factura')->references('id')->on('factura')->onDelete('restrict')->onUpdate('restrict');
            $table->text('motivo');
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
        Schema::dropIfExists('anular_factura');
    }
}
