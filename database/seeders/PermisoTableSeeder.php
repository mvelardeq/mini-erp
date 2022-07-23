<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermisoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permiso')->delete();
        
        \DB::table('permiso')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'listar obras',
                'slug' => 'listar-obras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'crear obras',
                'slug' => 'crear-obras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'editar obras',
                'slug' => 'editar-obras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'eliminar obras',
                'slug' => 'eliminar-obras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'listar equipos',
                'slug' => 'listar-equipos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'crear equipos',
                'slug' => 'crear-equipos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'editar equipos',
                'slug' => 'editar-equipos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'eliminar equipos',
                'slug' => 'eliminar-equipos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'listar empresas',
                'slug' => 'listar-empresas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'crear empresas',
                'slug' => 'crear-empresas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'editar empresas',
                'slug' => 'editar-empresas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'eliminar empresas',
                'slug' => 'eliminar-empresas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'listar servicios',
                'slug' => 'listar-servicios',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'crear servicios',
                'slug' => 'crear-servicios',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'editar servicios',
                'slug' => 'editar-servicios',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'nombre' => 'eliminar servicios',
                'slug' => 'eliminar-servicios',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'nombre' => 'listar ot',
                'slug' => 'listar-ot',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'nombre' => 'crear ot',
                'slug' => 'crear-ot',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'nombre' => 'editar ot',
                'slug' => 'editar-ot',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'nombre' => 'eliminar ot',
                'slug' => 'eliminar-ot',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'nombre' => 'listar cotizaciones',
                'slug' => 'listar-cotizaciones',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'nombre' => 'crear cotizaciones',
                'slug' => 'crear-cotizaciones',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'nombre' => 'editar cotizaciones',
                'slug' => 'editar-cotizaciones',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'nombre' => 'eliminar cotizaciones',
                'slug' => 'eliminar-cotizaciones',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'nombre' => 'listar contratos',
                'slug' => 'listar-contratos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'nombre' => 'crear contratos',
                'slug' => 'crear-contratos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'nombre' => 'editar contratos',
                'slug' => 'editar-contratos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'nombre' => 'eliminar contratos',
                'slug' => 'eliminar-contratos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'nombre' => 'listar facturas',
                'slug' => 'listar-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'nombre' => 'crear facturas',
                'slug' => 'crear-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'nombre' => 'editar facturas',
                'slug' => 'editar-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'nombre' => 'eliminar facturas',
                'slug' => 'eliminar-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'nombre' => 'procesar facturas',
                'slug' => 'procesar-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'nombre' => 'pagar facturas',
                'slug' => 'pagar-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'nombre' => 'detraer facturas',
                'slug' => 'detraer-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'nombre' => 'anular facturas',
                'slug' => 'anular-facturas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'nombre' => 'listar trabajadores',
                'slug' => 'listar-trabajadores',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'nombre' => 'crear trabajadores',
                'slug' => 'crear-trabajadores',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'nombre' => 'editar trabajadores',
                'slug' => 'editar-trabajadores',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'nombre' => 'eliminar trabajadores',
                'slug' => 'eliminar-trabajadores',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'nombre' => 'listar cargos',
                'slug' => 'listar-cargos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'nombre' => 'crear cargos',
                'slug' => 'crear-cargos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'nombre' => 'editar cargos',
                'slug' => 'editar-cargos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'nombre' => 'eliminar cargos',
                'slug' => 'eliminar-cargos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'nombre' => 'listar boletas',
                'slug' => 'listar-boletas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'nombre' => 'crear boletas',
                'slug' => 'crear-boletas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'nombre' => 'editar boletas',
                'slug' => 'editar-boletas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'nombre' => 'eliminar boletas',
                'slug' => 'eliminar-boletas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'nombre' => 'listar productos',
                'slug' => 'listar-productos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'nombre' => 'crear productos',
                'slug' => 'crear-productos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'nombre' => 'editar productos',
                'slug' => 'editar-productos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'nombre' => 'eliminar productos',
                'slug' => 'eliminar-productos',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'nombre' => 'listar compras',
                'slug' => 'listar-compras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'nombre' => 'crear compras',
                'slug' => 'crear-compras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'nombre' => 'editar compras',
                'slug' => 'editar-compras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'nombre' => 'eliminar compras',
                'slug' => 'eliminar-compras',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'nombre' => 'listar inventario',
                'slug' => 'listar-inventario',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'nombre' => 'listar perdidas',
                'slug' => 'listar-perdidas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'nombre' => 'crear perdidas',
                'slug' => 'crear-perdidas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'nombre' => 'editar perdidas',
                'slug' => 'editar-perdidas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'nombre' => 'eliminar perdidas',
                'slug' => 'eliminar-perdidas',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'nombre' => 'listar categorias',
                'slug' => 'listar-categorias',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'nombre' => 'crear categorias',
                'slug' => 'crear-categorias',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'nombre' => 'editar categorias',
                'slug' => 'editar-categorias',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'nombre' => 'eliminar categorias',
                'slug' => 'eliminar-categorias',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'nombre' => 'listar serviciost',
                'slug' => 'listar-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'nombre' => 'crear serviciost',
                'slug' => 'crear-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'nombre' => 'editar serviciost',
                'slug' => 'editar-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'nombre' => 'eliminar serviciost',
                'slug' => 'eliminar-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'nombre' => 'listar pagos serviciost',
                'slug' => 'listar-pagos-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'nombre' => 'crear pagos serviciost',
                'slug' => 'crear-pagos-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'nombre' => 'editar pagos serviciost',
                'slug' => 'editar-pagos-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'nombre' => 'eliminar pagos serviciost',
                'slug' => 'eliminar-pagos-serviciost',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'nombre' => 'listar cuentas contables',
                'slug' => 'listar-cuentas-contables',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'nombre' => 'crear cuentas contables',
                'slug' => 'crear-cuentas-contables',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'nombre' => 'editar cuentas contables',
                'slug' => 'editar-cuentas-contables',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'nombre' => 'eliminar cuentas contables',
                'slug' => 'eliminar-cuentas-contables',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'nombre' => 'listar cuentas corrientes',
                'slug' => 'listar-cuentas-corrientes',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'nombre' => 'crear cuentas corrientes',
                'slug' => 'crear-cuentas-corrientes',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'nombre' => 'editar cuentas corrientes',
                'slug' => 'editar-cuentas-corrientes',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'nombre' => 'eliminar cuentas corrientes',
                'slug' => 'eliminar-cuentas-corrientes',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'nombre' => 'eliminar posts',
                'slug' => 'eliminar-posts',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'nombre' => 'crear ascenso trabajador',
                'slug' => 'crear-ascenso-trabajador',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'nombre' => 'listar observacion trabajador',
                'slug' => 'listar-observacion-trabajador',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'nombre' => 'crear observacion trabajador',
                'slug' => 'crear-observacion-trabajador',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'nombre' => 'finalizar contrato',
                'slug' => 'finalizar-contrato',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'nombre' => 'retomar contrato',
                'slug' => 'retomar-contrato',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}