<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFotosOt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_ot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ot_id');
            $table->foreign('ot_id', 'fk_foto_ot')->references('id')->on('ot')->onDelete('cascade')->onUpdate('restrict');
            $table->string('foto', 120);
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
        Schema::dropIfExists('fotos_ot');
    }
}
