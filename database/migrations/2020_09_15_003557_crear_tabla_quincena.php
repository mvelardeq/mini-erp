<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaQuincena extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quincena', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id','fk_quincena_trabajador')->references('id')->on('trabajador')->onDelete('restrict')->onUpdate('restrict');
            $table->double('pago_quincena', 6, 2);
            $table->double('descuento_quincena', 6, 2)->nullable();
            $table->string('descripcion_descuento',40)->nullable();
            $table->string('periodo',10);
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
        Schema::dropIfExists('quincena');
    }
}
