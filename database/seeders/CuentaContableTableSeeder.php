<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CuentaContableTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cuenta_contable')->delete();
        
        \DB::table('cuenta_contable')->insert(array (
            0 => 
            array (
                'id' => 1,
                'codigo' => '1021',
                'nombre' => 'Fondos fijos Wynter Barlett',
                'saldo' => 19077.0,
                'banco' => 'Bbva Continental',
                'numero_cuenta' => '0011-0128-0212605450',
                'responsable_id' => '1',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            1 => 
            array (
                'id' => 2,
                'codigo' => '1022',
                'nombre' => 'Fondos fijos Amelia Dunn',
                'saldo' => 0.0,
                'banco' => 'Bbva Continental',
                'numero_cuenta' => '0011-0223-0287512415',
                'responsable_id' => '3',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-23 00:39:38',
            ),
            2 => 
            array (
                'id' => 3,
                'codigo' => '10411',
                'nombre' => 'Cuenta corriente general',
                'saldo' => 35000.0,
                'banco' => 'Bbva Continental',
                'numero_cuenta' => '0011-0274-0001872410524',
                'responsable_id' => '1',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-23 00:45:24',
            ),
            3 => 
            array (
                'id' => 4,
                'codigo' => '1042',
                'nombre' => 'Cuenta corriente para fines específicos',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            4 => 
            array (
                'id' => 5,
                'codigo' => '1212',
                'nombre' => 'Facturas emitidas en cartera',
                'saldo' => 12798.28,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            5 => 
            array (
                'id' => 6,
                'codigo' => '1673',
                'nombre' => 'Igv por acreditar en compras',
                'saldo' => 140.8,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            6 => 
            array (
                'id' => 7,
                'codigo' => '3346',
                'nombre' => 'Equipos diversos',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            7 => 
            array (
                'id' => 8,
                'codigo' => '3371',
                'nombre' => 'Herramientas',
                'saldo' => 782.2,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            8 => 
            array (
                'id' => 9,
                'codigo' => '3647',
                'nombre' => 'Herramientas y unidades de reemplazo',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            9 => 
            array (
                'id' => 10,
                'codigo' => '40111',
                'nombre' => 'IGV-Cuenta propia',
                'saldo' => 1952.28,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            10 => 
            array (
                'id' => 11,
                'codigo' => '6032',
                'nombre' => 'Suministros',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            11 => 
            array (
                'id' => 12,
                'codigo' => '6211',
                'nombre' => 'Sueldos y salarios',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            12 => 
            array (
                'id' => 13,
                'codigo' => '622',
                'nombre' => 'Otras remuneraciones',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            13 => 
            array (
                'id' => 14,
                'codigo' => '6273',
                'nombre' => 'Seguro complementario de trabajo de riesgo, accidentes de trabajo y enfermedades profesionales',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            14 => 
            array (
                'id' => 15,
                'codigo' => '6343',
                'nombre' => 'Mantenimiento propiedad, planta y equipo',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            15 => 
            array (
                'id' => 16,
                'codigo' => '6361',
                'nombre' => 'Energía eléctrica',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            16 => 
            array (
                'id' => 17,
                'codigo' => '6362',
                'nombre' => 'Gas',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            17 => 
            array (
                'id' => 18,
                'codigo' => '6363',
                'nombre' => 'Agua',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            18 => 
            array (
                'id' => 19,
                'codigo' => '6364',
                'nombre' => 'Teléfono',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            19 => 
            array (
                'id' => 20,
                'codigo' => '6392',
                'nombre' => 'Gastos de laboratorio EMO',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            20 => 
            array (
                'id' => 21,
                'codigo' => '70321',
                'nombre' => 'Ingresos servicios tercero',
                'saldo' => 10846.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            21 => 
            array (
                'id' => 22,
                'codigo' => '79',
                'nombre' => 'Cargas imputables a cuentas de costos y gastos',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            22 => 
            array (
                'id' => 23,
                'codigo' => '92',
                'nombre' => 'Gastos de producción',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            23 => 
            array (
                'id' => 24,
                'codigo' => '94',
                'nombre' => 'Gastos administrativos',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            24 => 
            array (
                'id' => 25,
                'codigo' => '95',
                'nombre' => 'Gastos de ventas',
                'saldo' => 0.0,
                'banco' => NULL,
                'numero_cuenta' => NULL,
                'responsable_id' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}