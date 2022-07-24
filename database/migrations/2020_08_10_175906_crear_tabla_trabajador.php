<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTrabajador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario', 50)->unique();
            $table->string('password', 100);
            $table->string('primer_nombre', 50);
            $table->string('segundo_nombre', 50)->nullable();
            $table->string('primer_apellido', 50);
            $table->string('segundo_apellido', 50);
            $table->string('correo',160)->unique();
            $table->string('dni', 10);
            $table->string('direccion', 300)->nullable();
            $table->string('celular', 9)->nullable();
            $table->date('fecha_nacimiento', 12)->nullable();
            $table->string('foto', 120)->nullable();
            $table->string('botas', 5)->nullable();
            $table->string('overol', 5)->nullable();
            $table->string('supervisor_id', 15)->nullable();
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
        Schema::dropIfExists('trabajador');
    }
}
