<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaBoletaPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleta_pago', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quincena_id');
            $table->foreign('quincena_id','fk_boletapago_quincena')->references('id')->on('quincena')->onDelete('restrict')->onUpdate('restrict');
            $table->double('total', 6, 2);
            $table->double('descuento_mes', 6, 2)->nullable();
            $table->double('adelantos', 6, 2)->nullable();
            $table->double('faltas', 6, 2)->nullable();
            $table->string('descripcion_descuentomes',40)->nullable();
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
        Schema::dropIfExists('boleta_pago');
    }
}
