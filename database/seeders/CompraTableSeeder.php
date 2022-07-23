<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompraTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('compra')->delete();
        
        \DB::table('compra')->insert(array (
            0 => 
            array (
                'id' => 1,
                'proveedor' => 'Santi S.A',
                'fecha' => '2022-07-10',
                'total_con_igv' => 415.0,
                'ruc_proveedor' => '5163402971',
                'observacion' => NULL,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            1 => 
            array (
                'id' => 2,
                'proveedor' => 'Velarde S.A',
                'fecha' => '2022-07-10',
                'total_con_igv' => 1772.0,
                'ruc_proveedor' => '42155316942',
                'observacion' => NULL,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
        ));
        
        
    }
}