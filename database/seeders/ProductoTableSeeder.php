<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('producto')->delete();
        
        \DB::table('producto')->insert(array (
            0 => 
            array (
                'id' => 12,
                'categoria_producto_id' => 1,
                'tipo_producto_id' => 1,
                'descripcion' => 'Martillo',
                'unidades' => 'und',
                'foto' => 'photos/product/wl7wg1absqcg4qkdpmu8',
                'created_at' => '2022-07-22 22:19:36',
                'updated_at' => '2022-07-22 22:19:36',
            ),
            1 => 
            array (
                'id' => 13,
                'categoria_producto_id' => 1,
                'tipo_producto_id' => 1,
                'descripcion' => 'Comba truper',
                'unidades' => 'und',
                'foto' => 'photos/product/zinxssiqeyf9ukf2dlwx',
                'created_at' => '2022-07-22 22:41:47',
                'updated_at' => '2022-07-23 00:32:01',
            ),
            2 => 
            array (
                'id' => 14,
                'categoria_producto_id' => 1,
                'tipo_producto_id' => 2,
                'descripcion' => 'Taladro',
                'unidades' => 'und',
                'foto' => 'photos/product/xczhfuzjvyq4pd8d2iok',
                'created_at' => '2022-07-23 00:33:44',
                'updated_at' => '2022-07-23 00:33:44',
            ),
        ));
        
        
    }
}