<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacturaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('factura')->delete();
        
        \DB::table('factura')->insert(array (
            0 => 
            array (
                'id' => 1,
                'concepto_pago_id' => 4,
                'estado_factura_id' => 1,
                'numero' => '504',
                'fecha_facturacion' => '2022-07-18',
                'subtotal' => 3060.0,
                'total_con_igv' => 3610.8,
                'pago_sin_detraccion' => 3466.37,
                'observacion' => NULL,
                'created_at' => '2022-07-22 01:20:06',
                'updated_at' => '2022-07-22 01:20:06',
            ),
            1 => 
            array (
                'id' => 2,
                'concepto_pago_id' => 1,
                'estado_factura_id' => 1,
                'numero' => '505',
                'fecha_facturacion' => '2022-07-20',
                'subtotal' => 5950.0,
                'total_con_igv' => 7021.0,
                'pago_sin_detraccion' => 6740.16,
                'observacion' => NULL,
                'created_at' => '2022-07-22 01:24:39',
                'updated_at' => '2022-07-22 01:24:39',
            ),
            2 => 
            array (
                'id' => 3,
                'concepto_pago_id' => 5,
                'estado_factura_id' => 1,
                'numero' => '506',
                'fecha_facturacion' => '2022-07-20',
                'subtotal' => 1836.0,
                'total_con_igv' => 2166.48,
                'pago_sin_detraccion' => 2079.82,
                'observacion' => NULL,
                'created_at' => '2022-07-22 01:25:11',
                'updated_at' => '2022-07-22 01:25:11',
            ),
        ));
        
        
    }
}