<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaContrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id','fk_contrato_servicio')->references('id')->on('servicio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id','fk_contrato_equipo')->references('id')->on('equipo')->onDelete('restrict')->onUpdate('restrict');
            $table->double('horas',7,2);
            $table->double('costo_sin_igv',8,2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('estado',20)->default('Abierto');
            $table->text('observacion')->nullable();
            $table->string('numero_oc',15)->nullable();
            $table->string('oc',100)->nullable();
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
        Schema::dropIfExists('contrato');
    }
}
