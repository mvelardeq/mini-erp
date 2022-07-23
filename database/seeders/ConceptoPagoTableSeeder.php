<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConceptoPagoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('concepto_pago')->delete();
        
        \DB::table('concepto_pago')->insert(array (
            0 => 
            array (
                'id' => 1,
                'contrato_id' => 1,
                'estado_conceptopago_id' => 2,
                'concepto' => 'A la firma del contrato',
                'porcentaje' => 50.0,
                'created_at' => '2022-07-22 01:17:28',
                'updated_at' => '2022-07-22 01:24:39',
            ),
            1 => 
            array (
                'id' => 2,
                'contrato_id' => 1,
                'estado_conceptopago_id' => 1,
                'concepto' => 'Instalación de rieles y puertas',
                'porcentaje' => 30.0,
                'created_at' => '2022-07-22 01:17:28',
                'updated_at' => '2022-07-22 01:17:28',
            ),
            2 => 
            array (
                'id' => 3,
                'contrato_id' => 1,
                'estado_conceptopago_id' => 1,
                'concepto' => 'A la entrega del equipo',
                'porcentaje' => 20.0,
                'created_at' => '2022-07-22 01:17:28',
                'updated_at' => '2022-07-22 01:17:28',
            ),
            3 => 
            array (
                'id' => 4,
                'contrato_id' => 2,
                'estado_conceptopago_id' => 2,
                'concepto' => 'A la firma del contrato',
                'porcentaje' => 50.0,
                'created_at' => '2022-07-22 01:19:26',
                'updated_at' => '2022-07-22 01:20:07',
            ),
            4 => 
            array (
                'id' => 5,
                'contrato_id' => 2,
                'estado_conceptopago_id' => 2,
                'concepto' => 'A la instalación de rieles y puertas',
                'porcentaje' => 30.0,
                'created_at' => '2022-07-22 01:19:26',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            5 => 
            array (
                'id' => 6,
                'contrato_id' => 2,
                'estado_conceptopago_id' => 1,
                'concepto' => 'A la entrega del equipo',
                'porcentaje' => 20.0,
                'created_at' => '2022-07-22 01:19:26',
                'updated_at' => '2022-07-22 01:19:26',
            ),
        ));
        
        
    }
}