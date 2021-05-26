<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicio')->insert([
            'nombre' => 'Montaje Traccionado',
            'observacion' => 'Montaje de ascensor con el procedimiento traccionado, en el cual se requiere una plataforma; si no se cuenta con ello, se debe instalar por el método tradicional',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio')->insert([
            'nombre' => 'Montaje Tradicional',
            'observacion' => 'Montaje tradicional implica instalar el ascensor sin una plataforma en el último nivel, se sube con el maquinillo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio')->insert([
            'nombre' => 'Servicio Adicional',
            'observacion' => 'Se aplica un servicio adicional a un contrato que no pertenece al proceso natural de montaje de ascensor (generalmente se establece mediante una cotización); por ejemplo instalación de vigas y escalera, pintado de pozo y techo, corregir errores de fábrica, servicios específicos o puntuales de reparación de ascensores, etc.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
