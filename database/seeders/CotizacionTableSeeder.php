<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CotizacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cotizacion')->delete();
        
        \DB::table('cotizacion')->insert(array (
            0 => 
            array (
                'id' => 11,
                'equipo_id' => 3,
                'numero' => '2022-357',
                'resumen' => 'Cambio de cables de tracción y gomas de motor',
                'fecha' => '2022-07-12',
                'dirigido_a' => 'John Mircha',
                'pdf' => 'cotizacion-2022-357-obra-mf-nast-cambio-de-cables-de-traccion-y-gomas-de-motor',
                'created_at' => '2022-07-23 08:54:03',
                'updated_at' => '2022-07-23 08:54:03',
            ),
            1 => 
            array (
                'id' => 12,
                'equipo_id' => 1,
                'numero' => '2022-358',
                'resumen' => 'Cambio de faja de motor de puerta de cabina',
                'fecha' => '2022-07-15',
                'dirigido_a' => 'Hery Spencer',
                'pdf' => 'cotizacion-2022-358-obra-mf-janssen-cambio-de-faja-de-motor-de-puerta-de-cabina',
                'created_at' => '2022-07-23 09:12:43',
                'updated_at' => '2022-07-23 09:12:43',
            ),
        ));
        
        
    }
}