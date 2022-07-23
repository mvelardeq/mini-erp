<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemCompraTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('item_compra')->delete();
        
        \DB::table('item_compra')->insert(array (
            0 => 
            array (
                'id' => 1,
                'compra_id' => 1,
                'producto_id' => 12,
                'costo_con_igv' => 20.0,
                'cantidad' => 5.0,
                'cantidad_perdida' => 0.0,
                'capacidad' => NULL,
                'numero_serie' => NULL,
                'marca' => NULL,
                'modelo' => NULL,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            1 => 
            array (
                'id' => 2,
                'compra_id' => 1,
                'producto_id' => 13,
                'costo_con_igv' => 35.0,
                'cantidad' => 9.0,
                'cantidad_perdida' => 0.0,
                'capacidad' => NULL,
                'numero_serie' => NULL,
                'marca' => NULL,
                'modelo' => NULL,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            2 => 
            array (
                'id' => 3,
                'compra_id' => 2,
                'producto_id' => 12,
                'costo_con_igv' => 18.0,
                'cantidad' => 4.0,
                'cantidad_perdida' => 0.0,
                'capacidad' => NULL,
                'numero_serie' => NULL,
                'marca' => NULL,
                'modelo' => NULL,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            3 => 
            array (
                'id' => 4,
                'compra_id' => 2,
                'producto_id' => 14,
                'costo_con_igv' => 850.0,
                'cantidad' => 2.0,
                'cantidad_perdida' => 0.0,
                'capacidad' => '1200W',
                'numero_serie' => '253FGL4',
                'marca' => 'Ingco',
                'modelo' => 'Ing245',
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
        ));
        
        
    }
}