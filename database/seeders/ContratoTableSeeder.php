<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContratoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contrato')->delete();
        
        \DB::table('contrato')->insert(array (
            0 => 
            array (
                'id' => 1,
                'servicio_id' => 1,
                'equipo_id' => 3,
                'horas' => 350.0,
                'costo_sin_igv' => 11900.0,
                'fecha_inicio' => '2022-07-10',
                'fecha_fin' => '2022-08-20',
                'estado' => 'Abierto',
                'observacion' => NULL,
                'numero_oc' => NULL,
                'oc' => NULL,
                'created_at' => '2022-07-22 01:17:28',
                'updated_at' => '2022-07-22 01:17:28',
            ),
            1 => 
            array (
                'id' => 2,
                'servicio_id' => 2,
                'equipo_id' => 1,
                'horas' => 180.0,
                'costo_sin_igv' => 6120.0,
                'fecha_inicio' => '2022-07-15',
                'fecha_fin' => '2022-08-12',
                'estado' => 'Abierto',
                'observacion' => NULL,
                'numero_oc' => NULL,
                'oc' => NULL,
                'created_at' => '2022-07-22 01:19:26',
                'updated_at' => '2022-07-22 01:19:26',
            ),
        ));
        
        
    }
}