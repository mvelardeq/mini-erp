<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_producto_id');
            $table->foreign('categoria_producto_id', 'fk_categoriaproducto_categoria')->references('id')->on('categoria_producto')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_producto_id');
            $table->foreign('tipo_producto_id', 'fk_tipoproducto_tipo')->references('id')->on('tipo_producto')->onDelete('restrict')->onUpdate('restrict');
            $table->string('descripcion', 80);
            $table->string('unidades', 15);
            $table->string('foto', 120)->nullable();
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
        Schema::dropIfExists('producto');
    }
}
