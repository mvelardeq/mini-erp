<?php

use Carbon\Carbon;
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
            'primer_nombre' => 'Martín',
            'segundo_nombre' => 'César',
            'primer_apellido' => 'Velarde',
            'segundo_apellido' => 'Quispe',
            'password' => bcrypt('pass123'),
            'correo' => 'martin_v_q@hotmail.com',
            'dni' => '45325572',
            'direccion' => 'Av. Principal mz.K lte. 7 Cerro el Pacífico-Los Olivos Lima Peru',
            'celular' => '45325572',
            'fecha_nacimiento' => '1987-12-22',
            'botas' => '42',
            'overol' => 'XL',
            'foto' => 'JsxBDSBp3JYX7K.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('trabajador_rol')->insert([
            'rol_id' => 1,
            'trabajador_id' => 1
        ]);

    }
}
