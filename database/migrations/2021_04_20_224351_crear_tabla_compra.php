<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id','fk_compraproducto_producto')->references('id')->on('producto')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->double('costo_con_igv',5,2);
            $table->string('proveedor',45);
            $table->double('cantidad',4,2);
            $table->string('ruc_proveedor',11)->nullable();
            $table->string('numero_serie',12)->nullable();
            $table->string('marca',45)->nullable();
            $table->string('modelo',45)->nullable();
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
        Schema::dropIfExists('compra');
    }
}
