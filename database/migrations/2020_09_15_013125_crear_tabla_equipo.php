<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEquipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obra_id');
            $table->foreign('obra_id','fk_equipo_obra')->references('id')->on('obra')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id','fk_equipo_empresa')->references('id')->on('empresa')->onDelete('restrict')->onUpdate('restrict');
            $table->string('oe',50);
            $table->string('velocidad',4);
            $table->string('paradas',4);
            $table->string('carga',8)->nullable();
            $table->string('marca',40)->nullable();
            $table->string('modelo',40)->nullable();
            $table->string('accesos',4)->nullable();
            $table->string('cuarto_maquina',5)->nullable();
            $table->string('numero_equipo',60)->nullable();
            $table->string('plano',40)->nullable();
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
        Schema::dropIfExists('equipo');
    }
}
