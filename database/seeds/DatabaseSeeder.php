<?php

use Database\Seeders\TablaMenuRolSeeder;
use Database\Seeders\TablaMenuSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->truncateTablas([
            'rol',
            'permiso',
            'trabajador',
            'trabajador_rol'
        ]);
        $this->call(TablaRolSeeder::class);
        $this->call(TablaPermisoSeeder::class);
        $this->call(TrabajadorAdministradorSeeder::class);
        $this->call(TablaMenuRolSeeder::class);
        $this->call(TablaMenuSeeder::class);
    }
    protected function truncateTablas(array $tablas){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS =1;');
    }
}
