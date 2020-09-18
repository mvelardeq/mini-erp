<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadorAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trabajador')->insert([
            'usuario' => 'mvelarde',
            'nombres' => 'Martín César',
            'apellidos' => 'Velarde Quispe',
            'password' => bcrypt('pass123'),
            'correo' => 'martin_v_q@hotmail.com',
            'dni' => '45325572',
        ]);


        DB::table('trabajador_rol')->insert([
            'rol_id' => 1,
            'trabajador_id' => 1
        ]);

    }
}
