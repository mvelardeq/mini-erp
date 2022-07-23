<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrabajadorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('trabajador')->delete();

        \DB::table('trabajador')->insert(array (
            0 =>
            array (
                'id' => 1,
                'usuario' => 'wbartlett',
                'password' => bcrypt('pass123'),
                'primer_nombre' => 'Wynter',
                'segundo_nombre' => NULL,
                'primer_apellido' => 'Bartlett',
                'segundo_apellido' => 'Dorsey',
                'correo' => 'felis@protonmail.edu',
                'dni' => '48623598',
                'direccion' => '654-3894 Tempus, Rd.',
                'celular' => '985356745',
                'fecha_nacimiento' => '1988-01-24',
                'foto' => 'photos/profilePhoto/gur2vcdr2frrwujkxixp',
                'botas' => '42',
                'overol' => 'XL',
                'supervisor_id' => NULL,
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 01:23:29',
            ),
            1 =>
            array (
                'id' => 2,
                'usuario' => 'tpierce',
                'password' => bcrypt('pass123'),
                'primer_nombre' => 'Tasha',
                'segundo_nombre' => NULL,
                'primer_apellido' => 'Pierce',
                'segundo_apellido' => 'Lang',
                'correo' => 'tincidunt.donec.vitae@protonmail.ca',
                'dni' => '75243625',
                'direccion' => 'Ap #670-856 Urna. St.',
                'celular' => '953157842',
                'fecha_nacimiento' => '1990-01-28',
                'foto' => 'photos/profilePhoto/giggp8msehjq0mgi0vax',
                'botas' => '44',
                'overol' => 'XL',
                'supervisor_id' => NULL,
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 01:26:42',
            ),
            2 =>
            array (
                'id' => 3,
                'usuario' => 'adunn',
                'password' => bcrypt('pass123'),
                'primer_nombre' => 'Amelia',
                'segundo_nombre' => NULL,
                'primer_apellido' => 'Dunn',
                'segundo_apellido' => 'Mason',
                'correo' => 'augue.ut.lacus@aol.org',
                'dni' => '57426958',
                'direccion' => '611-2763 Quis Av.',
                'celular' => '952425855',
                'fecha_nacimiento' => '1990-01-13',
                'foto' => 'photos/profilePhoto/qzkgqhtvnpctsfar8fez',
                'botas' => '37',
                'overol' => 'S',
                'supervisor_id' => NULL,
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 01:29:35',
            ),
            3 =>
            array (
                'id' => 4,
                'usuario' => 'hsmith',
                'password' => bcrypt('pass123'),
                'primer_nombre' => 'Henry',
                'segundo_nombre' => NULL,
                'primer_apellido' => 'Smith',
                'segundo_apellido' => 'Durand',
                'correo' => 'hsmith@gmail.com',
                'dni' => '49267513',
                'direccion' => 'Lima',
                'celular' => '975168422',
                'fecha_nacimiento' => '1993-04-05',
                'foto' => 'photos/profilePhoto/vcitf1itwtf9vuivuryl',
                'botas' => '41',
                'overol' => 'L',
                'supervisor_id' => '2',
                'created_at' => '2022-07-22 01:31:21',
                'updated_at' => '2022-07-22 01:31:21',
            ),
        ));


    }
}
