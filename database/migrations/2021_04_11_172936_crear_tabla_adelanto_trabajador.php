<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAdelantoTrabajador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adelanto_trabajador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ot_id')->unique();
            $table->foreign('ot_id','fk_adelantotrabajadorot_ot')->references('id')->on('ot')->onDelete('restrict')->onUpdate('restrict');
            $table->double('pago',5,2);
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
        Schema::dropIfExists('adelanto_trabajador');
    }
}
