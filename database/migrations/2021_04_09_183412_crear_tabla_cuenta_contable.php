<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCuentaContable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_contable', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',8);
            $table->string('nombre',45);
            $table->double('saldo',8,2)->default(0);
            $table->string('banco',45)->nullable();
            $table->string('numero_cuenta',45)->nullable();
            $table->string('responsable_id',45)->nullable();
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
        Schema::dropIfExists('cuenta_contable');
    }
}
