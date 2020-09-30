<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAscensoTrabajador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ascenso_trabajador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id','fk_ascensotrabajador_trabajador')->references('id')->on('trabajador')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cargo_trabajador_id');
            $table->foreign('cargo_trabajador_id','fk_ascensotrabajador_cargotrabajador')->references('id')->on('cargo_trabajador')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sueldo');
            $table->date('fecha',12);
            $table->string('observacion',400)->nullable();
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
        Schema::dropIfExists('ascenso_trabajador');
    }
}
