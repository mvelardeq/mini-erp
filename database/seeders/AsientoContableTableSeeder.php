<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AsientoContableTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asiento_contable')->delete();
        
        \DB::table('asiento_contable')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fecha' => '2022-07-18',
                'glosa' => 'facturación por servicios de la factura número: 504, por concepto de A la firma del contrato de la obra MF Janssen',
                'asientoable_id' => 1,
                'asientoable_type' => 'App\\Models\\Ventas\\Factura',
                'created_at' => '2022-07-22 01:20:06',
                'updated_at' => '2022-07-22 01:20:06',
            ),
            1 => 
            array (
                'id' => 2,
                'fecha' => '2022-07-20',
                'glosa' => 'facturación por servicios de la factura número: 505, por concepto de A la firma del contrato de la obra MF Nast',
                'asientoable_id' => 2,
                'asientoable_type' => 'App\\Models\\Ventas\\Factura',
                'created_at' => '2022-07-22 01:24:39',
                'updated_at' => '2022-07-22 01:24:39',
            ),
            2 => 
            array (
                'id' => 3,
                'fecha' => '2022-07-20',
                'glosa' => 'facturación por servicios de la factura número: 506, por concepto de A la instalación de rieles y puertas de la obra MF Janssen',
                'asientoable_id' => 3,
                'asientoable_type' => 'App\\Models\\Ventas\\Factura',
                'created_at' => '2022-07-22 01:25:11',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            3 => 
            array (
                'id' => 4,
                'fecha' => '2022-07-10',
                'glosa' => 'Compra de articulos para la empresa',
                'asientoable_id' => 1,
                'asientoable_type' => 'App\\Models\\Administracion\\Logistica\\Compra',
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            4 => 
            array (
                'id' => 5,
                'fecha' => '2022-07-10',
                'glosa' => 'Compra de articulos para la empresa',
                'asientoable_id' => 2,
                'asientoable_type' => 'App\\Models\\Administracion\\Logistica\\Compra',
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
        ));
        
        
    }
}