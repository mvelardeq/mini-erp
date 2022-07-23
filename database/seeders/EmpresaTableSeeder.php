<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('empresa')->delete();
        
        \DB::table('empresa')->insert(array (
            0 => 
            array (
                'id' => 2,
                'razon_social' => 'Rhybox S.A',
                'ruc' => '20578426954',
                'porcentaje_detraccion' => 4.0,
                'pago_hora' => 34.0,
                'direccion' => '16 Sunfield Plaza',
                'actividad' => 'Venta de ascensores',
                'observacion' => NULL,
                'created_at' => '2022-07-20 00:21:20',
                'updated_at' => '2022-07-20 00:24:37',
            ),
            1 => 
            array (
                'id' => 3,
                'razon_social' => 'Skipstorm S.A',
                'ruc' => '20535719835',
                'porcentaje_detraccion' => 4.0,
                'pago_hora' => 38.0,
                'direccion' => '36 Green Junction',
                'actividad' => 'Venta de ascensores y escaleras eléctricas',
                'observacion' => NULL,
                'created_at' => '2022-07-20 00:24:13',
                'updated_at' => '2022-07-20 00:26:35',
            ),
        ));
        
        
    }
}