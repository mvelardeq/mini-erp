<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaItemCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id','fk_compraitemcompra_compra')->references('id')->on('compra')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id','fk_productoitemcompra_producto')->references('id')->on('producto')->onDelete('restrict')->onUpdate('restrict');
            $table->double('costo_con_igv',5,2);
            $table->double('cantidad',4,2);
            $table->double('cantidad_perdida',4,2)->default(0);
            $table->string('capacidad', 45)->nullable();
            $table->string('numero_serie',12)->nullable();
            $table->string('marca',45)->nullable();
            $table->string('modelo',45)->nullable();
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
        Schema::dropIfExists('item_compra');
    }
}
