<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsientoContable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asiento_contable', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('glosa', 100);
            $table->integer('asientoable_id',6);
            $table->string('asientoable_type',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asiento_contable');
    }
}
