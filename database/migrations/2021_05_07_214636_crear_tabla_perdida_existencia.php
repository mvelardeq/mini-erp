<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPerdidaExistencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdida_existencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_compra_id');
            $table->foreign('item_compra_id','fk_perdidaexistenciaitemcompra_itemcompra')->references('id')->on('item_compra')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->text('motivo');
            $table->double('cantidad',4,2);
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
        Schema::dropIfExists('perdida_existencia');
    }
}
