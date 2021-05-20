<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaEstadoOtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_ot')->insert([
            'nombre' => 'Pendiente',
        ]);
        DB::table('estado_ot')->insert([
            'nombre' => 'Aprobado',
        ]);
        DB::table('estado_ot')->insert([
            'nombre' => 'Falta',
        ]);
    }
}
