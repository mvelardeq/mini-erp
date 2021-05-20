<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaCargoTrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Técnico 1',
        ]);
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Técnico 2',
        ]);
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Técnico 3',
        ]);
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Técnico 4',
        ]);
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Técnico 5',
        ]);
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Gerente de Operaciones',
        ]);
        DB::table('cargo_trabajador')->insert([
            'nombre' => 'Gerente General',
        ]);
    }
}
