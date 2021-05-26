<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Almacén, componentes y herramientas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Bancada y motor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Colgado de rieles',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Cuadrar y cabina',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Revisión',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Fijaciones',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Puertas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Eléctrica',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 1,
            'nombre' => 'Acabados',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Almacén, componentes y herramientas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Cuadrar y cabina',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Fijaciones',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Bancada y motor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Revisión',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Puertas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Eléctrica',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 2,
            'nombre' => 'Acabados',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('actividad')->insert([
            'servicio_id' => 3,
            'nombre' => 'Servicio adicional',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
