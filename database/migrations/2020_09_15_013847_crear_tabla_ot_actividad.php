<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOtActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_actividad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ot_id');
            $table->foreign('ot_id','fk_otactividad_ot')->references('id')->on('ot')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('actividad_id');
            $table->foreign('actividad_id','fk_otactividad_actividad')->references('id')->on('actividad')->onDelete('restrict')->onUpdate('restrict');
            $table->double('horas');
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
        Schema::dropIfExists('ot_actividad');
    }
}
