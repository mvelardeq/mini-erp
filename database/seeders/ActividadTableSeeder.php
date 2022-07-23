<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActividadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('actividad')->delete();
        
        \DB::table('actividad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'servicio_id' => 1,
                'nombre' => 'Almacén, componentes y herramientas',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'servicio_id' => 1,
                'nombre' => 'Bancada y motor',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            2 => 
            array (
                'id' => 3,
                'servicio_id' => 1,
                'nombre' => 'Colgado de rieles',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            3 => 
            array (
                'id' => 4,
                'servicio_id' => 1,
                'nombre' => 'Cuadrar y cabina',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            4 => 
            array (
                'id' => 5,
                'servicio_id' => 1,
                'nombre' => 'Revisión',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            5 => 
            array (
                'id' => 6,
                'servicio_id' => 1,
                'nombre' => 'Fijaciones',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            6 => 
            array (
                'id' => 7,
                'servicio_id' => 1,
                'nombre' => 'Puertas',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            7 => 
            array (
                'id' => 8,
                'servicio_id' => 1,
                'nombre' => 'Eléctrica',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            8 => 
            array (
                'id' => 9,
                'servicio_id' => 1,
                'nombre' => 'Acabados',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            9 => 
            array (
                'id' => 10,
                'servicio_id' => 2,
                'nombre' => 'Almacén, componentes y herramientas',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            10 => 
            array (
                'id' => 11,
                'servicio_id' => 2,
                'nombre' => 'Cuadrar y cabina',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            11 => 
            array (
                'id' => 12,
                'servicio_id' => 2,
                'nombre' => 'Fijaciones',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            12 => 
            array (
                'id' => 13,
                'servicio_id' => 2,
                'nombre' => 'Bancada y motor',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            13 => 
            array (
                'id' => 14,
                'servicio_id' => 2,
                'nombre' => 'Revisión',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            14 => 
            array (
                'id' => 15,
                'servicio_id' => 2,
                'nombre' => 'Puertas',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            15 => 
            array (
                'id' => 16,
                'servicio_id' => 2,
                'nombre' => 'Eléctrica',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            16 => 
            array (
                'id' => 17,
                'servicio_id' => 2,
                'nombre' => 'Acabados',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            17 => 
            array (
                'id' => 18,
                'servicio_id' => 3,
                'nombre' => 'Servicio adicional',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}