<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id','fk_ot_trabajador')->references('id')->on('trabajador')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('equipo_servicio_id');
            $table->foreign('equipo_servicio_id','fk_ot_equiposervicio')->references('id')->on('equipo_servicio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_ot_id');
            $table->foreign('estado_ot_id','fk_ot_estadoot')->references('id')->on('estado_ot')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha',12);
            $table->unsignedBigInteger('adelanto')->nullable();
            $table->unsignedBigInteger('descuento')->nullable();
            $table->string('aprobacion_ot',10);
            $table->string('pedido',300)->nullable();
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
        Schema::dropIfExists('ot');
    }
}
