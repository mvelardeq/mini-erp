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
            'celular' => '971142315',
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
        DB::table('trabajador')->insert([
            'usuario' => 'rvelarde',
            'primer_nombre' => 'Roberto',
            'segundo_nombre' => 'Carlos',
            'primer_apellido' => 'Velarde',
            'segundo_apellido' => 'Quispe',
            'password' => bcrypt('pass123'),
            'correo' => 'robertothyssen@gmail.com',
            'dni' => '41358958',
            'direccion' => 'Independencia',
            'celular' => '994127770',
            'fecha_nacimiento' => '1979-12-17',
            'botas' => '44',
            'overol' => 'XL',
            'foto' => 'LCruCdZrTDAxrG.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('trabajador_rol')->insert([
            'rol_id' => 3,
            'trabajador_id' => 2
        ]);
        DB::table('trabajador')->insert([
            'usuario' => 'svelarde',
            'primer_nombre' => 'Sayuri',
            'segundo_nombre' => 'Sofía',
            'primer_apellido' => 'Velarde',
            'segundo_apellido' => 'Guerra',
            'password' => bcrypt('pass123'),
            'correo' => 'sayuri@gmail.com',
            'dni' => '723',
            'direccion' => 'Av. Principal mz.K lte. 7 Cerro el Pacífico-Los Olivos Lima Peru',
            'celular' => '936455043',
            'fecha_nacimiento' => '1998-07-30',
            'botas' => '37',
            'overol' => 'S',
            'foto' => 'KgkgUjPhrKMyf4.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('trabajador_rol')->insert([
            'rol_id' => 4,
            'trabajador_id' => 3
        ]);

    }
}
