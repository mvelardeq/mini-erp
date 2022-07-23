<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LineaCotizacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('linea_cotizacion')->delete();
        
        \DB::table('linea_cotizacion')->insert(array (
            0 => 
            array (
                'id' => 20,
                'cotizacion_id' => 11,
                'descripcion' => 'Cambio de cables de tracción',
                'cantidad' => 6.0,
                'subtotal' => 420.0,
                'created_at' => '2022-07-23 08:54:03',
                'updated_at' => '2022-07-23 08:54:03',
            ),
            1 => 
            array (
                'id' => 21,
                'cotizacion_id' => 11,
                'descripcion' => 'Cambio de gomas de motor',
                'cantidad' => 5.0,
                'subtotal' => 400.0,
                'created_at' => '2022-07-23 08:54:03',
                'updated_at' => '2022-07-23 08:54:03',
            ),
            2 => 
            array (
                'id' => 22,
                'cotizacion_id' => 12,
                'descripcion' => 'Cambio de faja de motor de puerta de cabina',
                'cantidad' => 2.0,
                'subtotal' => 680.0,
                'created_at' => '2022-07-23 09:12:43',
                'updated_at' => '2022-07-23 09:12:43',
            ),
        ));
        
        
    }
}