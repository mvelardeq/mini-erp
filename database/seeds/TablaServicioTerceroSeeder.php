<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaServicioTerceroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicio_tercero')->insert([
            'nombre' => 'SCTR',
            'cuenta' => '6273',
            'tipo_gasto' => 'Producción',
            'dirigido_a' => 'Trabajadores',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Mantenimiento auto',
            'cuenta' => '6343',
            'tipo_gasto' => 'Producción',
            'dirigido_a' => 'Auto ABV-254',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Mantenimiento camioneta',
            'cuenta' => '6343',
            'tipo_gasto' => 'Producción',
            'dirigido_a' => 'Camioneta F1U-232',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Mantenimiento maquinillo',
            'cuenta' => '6343',
            'tipo_gasto' => 'Producción',
            'dirigido_a' => 'Maquinillos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Luz',
            'cuenta' => '6361',
            'tipo_gasto' => 'Administrativo',
            'dirigido_a' => 'Oficina 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Gas',
            'cuenta' => '6362',
            'tipo_gasto' => 'Administrativo',
            'dirigido_a' => 'Oficina 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Agua',
            'cuenta' => '6363',
            'tipo_gasto' => 'Administrativo',
            'dirigido_a' => 'Oficina 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Teléfono',
            'cuenta' => '6364',
            'tipo_gasto' => 'Administrativo',
            'dirigido_a' => 'Oficina 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Teléfono',
            'cuenta' => '6364',
            'tipo_gasto' => 'Administrativo',
            'dirigido_a' => 'Oficina 2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Celular',
            'cuenta' => '6364',
            'tipo_gasto' => 'Producción',
            'dirigido_a' => 'Roberto Velarde',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicio_tercero')->insert([
            'nombre' => 'Examen Médico',
            'cuenta' => '6392',
            'tipo_gasto' => 'Administrativo',
            'dirigido_a' => 'Trabajadores',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
