<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicioTerceroTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('servicio_tercero')->delete();
        
        \DB::table('servicio_tercero')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'SCTR',
                'cuenta' => '6273',
                'tipo_gasto' => 'Producción',
                'dirigido_a' => 'Trabajadores',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Mantenimiento auto',
                'cuenta' => '6343',
                'tipo_gasto' => 'Producción',
                'dirigido_a' => 'Auto ABV-254',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Mantenimiento camioneta',
                'cuenta' => '6343',
                'tipo_gasto' => 'Producción',
                'dirigido_a' => 'Camioneta F1U-232',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Mantenimiento maquinillo',
                'cuenta' => '6343',
                'tipo_gasto' => 'Producción',
                'dirigido_a' => 'Maquinillos',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Luz',
                'cuenta' => '6361',
                'tipo_gasto' => 'Administrativo',
                'dirigido_a' => 'Oficina 1',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Gas',
                'cuenta' => '6362',
                'tipo_gasto' => 'Administrativo',
                'dirigido_a' => 'Oficina 1',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Agua',
                'cuenta' => '6363',
                'tipo_gasto' => 'Administrativo',
                'dirigido_a' => 'Oficina 1',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Teléfono',
                'cuenta' => '6364',
                'tipo_gasto' => 'Administrativo',
                'dirigido_a' => 'Oficina 1',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Teléfono',
                'cuenta' => '6364',
                'tipo_gasto' => 'Administrativo',
                'dirigido_a' => 'Oficina 2',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Celular',
                'cuenta' => '6364',
                'tipo_gasto' => 'Producción',
                'dirigido_a' => 'Roberto Velarde',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Examen Médico',
                'cuenta' => '6392',
                'tipo_gasto' => 'Administrativo',
                'dirigido_a' => 'Trabajadores',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}