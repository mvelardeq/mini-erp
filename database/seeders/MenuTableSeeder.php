<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu')->delete();
        
        \DB::table('menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 0,
                'nombre' => 'Inicio',
                'url' => 'inicio',
                'orden' => 1,
                'icono' => 'home',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 0,
                'nombre' => 'Admin',
                'url' => '#',
                'orden' => 2,
                'icono' => 'cog',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 2,
                'nombre' => 'Usuarios',
                'url' => 'admin/usuario',
                'orden' => 1,
                'icono' => 'users',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 2,
                'nombre' => 'Menú',
                'url' => 'admin/menu',
                'orden' => 2,
                'icono' => 'bars',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 2,
                'nombre' => 'Menú-rol',
                'url' => 'admin/menu-rol',
                'orden' => 3,
                'icono' => 'clipboard-list',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 2,
                'nombre' => 'Permiso',
                'url' => 'admin/permiso',
                'orden' => 4,
                'icono' => 'user-lock',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 2,
                'nombre' => 'Permiso-rol',
                'url' => 'admin/permiso-rol',
                'orden' => 5,
                'icono' => 'key',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 2,
                'nombre' => 'Roles',
                'url' => 'admin/rol',
                'orden' => 6,
                'icono' => 'people-arrows',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 0,
                'nombre' => 'Operaciones',
                'url' => '#',
                'orden' => 3,
                'icono' => 'tools',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 9,
                'nombre' => 'Obras',
                'url' => 'operaciones/obra',
                'orden' => 1,
                'icono' => 'building',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            10 => 
            array (
                'id' => 11,
                'menu_id' => 9,
                'nombre' => 'Equipos',
                'url' => 'operaciones/equipo',
                'orden' => 2,
                'icono' => 'sort',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            11 => 
            array (
                'id' => 12,
                'menu_id' => 9,
                'nombre' => 'Empresas',
                'url' => 'operaciones/empresa',
                'orden' => 3,
                'icono' => 'funnel-dollar',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            12 => 
            array (
                'id' => 13,
                'menu_id' => 9,
                'nombre' => 'Servicios',
                'url' => 'operaciones/servicio',
                'orden' => 4,
                'icono' => 'hard-hat',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            13 => 
            array (
                'id' => 14,
                'menu_id' => 9,
                'nombre' => 'OT',
                'url' => 'operaciones/ot',
                'orden' => 5,
                'icono' => 'file-alt',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            14 => 
            array (
                'id' => 15,
                'menu_id' => 0,
                'nombre' => 'Ventas',
                'url' => '#',
                'orden' => 4,
                'icono' => 'fas fa-cash-register',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            15 => 
            array (
                'id' => 16,
                'menu_id' => 15,
                'nombre' => 'Cotizaciones',
                'url' => 'ventas/cotizacion',
                'orden' => 1,
                'icono' => 'table',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            16 => 
            array (
                'id' => 17,
                'menu_id' => 15,
                'nombre' => 'Contratos',
                'url' => 'ventas/contrato',
                'orden' => 2,
                'icono' => 'file-signature',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            17 => 
            array (
                'id' => 18,
                'menu_id' => 15,
                'nombre' => 'Facturas',
                'url' => 'ventas/factura',
                'orden' => 3,
                'icono' => 'fas fa-file-invoice',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            18 => 
            array (
                'id' => 19,
                'menu_id' => 0,
                'nombre' => 'Administracion',
                'url' => '#',
                'orden' => 5,
                'icono' => 'fas fa-toolbox',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            19 => 
            array (
                'id' => 20,
                'menu_id' => 19,
                'nombre' => 'RRHH',
                'url' => '#',
                'orden' => 1,
                'icono' => 'people-carry',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            20 => 
            array (
                'id' => 21,
                'menu_id' => 20,
                'nombre' => 'Trabajadores',
                'url' => 'administracion/rrhh/trabajador',
                'orden' => 1,
                'icono' => 'users',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            21 => 
            array (
                'id' => 22,
                'menu_id' => 20,
                'nombre' => 'Cargo',
                'url' => 'administracion/rrhh/cargo',
                'orden' => 2,
                'icono' => 'hard-hat',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            22 => 
            array (
                'id' => 23,
                'menu_id' => 20,
                'nombre' => 'Boleta de pago',
                'url' => 'administracion/rrhh/boleta-pago',
                'orden' => 3,
                'icono' => 'calendar-check',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            23 => 
            array (
                'id' => 24,
                'menu_id' => 19,
                'nombre' => 'Logística',
                'url' => '#',
                'orden' => 2,
                'icono' => 'truck',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            24 => 
            array (
                'id' => 25,
                'menu_id' => 24,
                'nombre' => 'Productos',
                'url' => 'administracion/logistica/producto',
                'orden' => 1,
                'icono' => 'barcode',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            25 => 
            array (
                'id' => 26,
                'menu_id' => 24,
                'nombre' => 'Compras',
                'url' => 'administracion/logistica/compra',
                'orden' => 2,
                'icono' => 'fas fa-shopping-cart',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            26 => 
            array (
                'id' => 27,
                'menu_id' => 24,
                'nombre' => 'Inventario',
                'url' => 'administracion/logistica/inventario',
                'orden' => 3,
                'icono' => 'fas fa-warehouse',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            27 => 
            array (
                'id' => 28,
                'menu_id' => 24,
                'nombre' => 'Pérdida existencia',
                'url' => 'administracion/logistica/perdida',
                'orden' => 4,
                'icono' => 'trash',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            28 => 
            array (
                'id' => 29,
                'menu_id' => 24,
                'nombre' => 'Categorías',
                'url' => 'administracion/logistica/categoria',
                'orden' => 5,
                'icono' => 'project-diagram',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            29 => 
            array (
                'id' => 30,
                'menu_id' => 19,
                'nombre' => 'Servicios T.',
                'url' => 'administracion/servicio-tercero',
                'orden' => 3,
                'icono' => 'gas-pump',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            30 => 
            array (
                'id' => 31,
                'menu_id' => 19,
                'nombre' => 'Pago serv.',
                'url' => 'administracion/pago-servicio',
                'orden' => 4,
                'icono' => 'gas-pump',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            31 => 
            array (
                'id' => 32,
                'menu_id' => 0,
                'nombre' => 'Finanzas',
                'url' => '#',
                'orden' => 6,
                'icono' => 'file-invoice-dollar',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            32 => 
            array (
                'id' => 33,
                'menu_id' => 32,
                'nombre' => 'Contabilidad',
                'url' => '#',
                'orden' => 1,
                'icono' => 'calculator',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            33 => 
            array (
                'id' => 34,
                'menu_id' => 33,
                'nombre' => 'Cuentas contables',
                'url' => 'finanzas/contabilidad/cuenta-contable',
                'orden' => 1,
                'icono' => 'credit-card',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            34 => 
            array (
                'id' => 35,
                'menu_id' => 33,
                'nombre' => 'Asiento contable',
                'url' => 'finanzas/contabilidad/asiento-contable',
                'orden' => 2,
                'icono' => 'bookmark',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            35 => 
            array (
                'id' => 36,
                'menu_id' => 33,
                'nombre' => 'E.S.F',
                'url' => 'finanzas/contabilidad/esf',
                'orden' => 3,
                'icono' => 'file-invoice',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            36 => 
            array (
                'id' => 37,
                'menu_id' => 33,
                'nombre' => 'EERR',
                'url' => 'finanzas/contabilidad/eerr',
                'orden' => 4,
                'icono' => 'coins',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            37 => 
            array (
                'id' => 38,
                'menu_id' => 32,
                'nombre' => 'E. movimientos',
                'url' => 'finanzas/estado-movimientos',
                'orden' => 2,
                'icono' => 'hand-holding-usd',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            38 => 
            array (
                'id' => 39,
                'menu_id' => 32,
                'nombre' => 'Cuentas corrientes',
                'url' => 'finanzas/cuenta-corriente',
                'orden' => 3,
                'icono' => 'credit-card',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            39 => 
            array (
                'id' => 40,
                'menu_id' => 0,
                'nombre' => 'Usuario',
                'url' => '#',
                'orden' => 7,
                'icono' => 'user',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            40 => 
            array (
                'id' => 41,
                'menu_id' => 40,
                'nombre' => 'Perfil',
                'url' => 'usuario/perfil',
                'orden' => 1,
                'icono' => 'id-badge',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            41 => 
            array (
                'id' => 42,
                'menu_id' => 40,
                'nombre' => 'OTs',
                'url' => 'usuario/ot',
                'orden' => 2,
                'icono' => 'file-contract',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            42 => 
            array (
                'id' => 43,
                'menu_id' => 40,
                'nombre' => 'Notificaciones',
                'url' => 'usuario/notificaciones',
                'orden' => 3,
                'icono' => 'bell',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            43 => 
            array (
                'id' => 44,
                'menu_id' => 40,
                'nombre' => 'Calendario',
                'url' => 'usuario/calendario',
                'orden' => 4,
                'icono' => 'calendar-alt',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            44 => 
            array (
                'id' => 45,
                'menu_id' => 40,
                'nombre' => 'Mis cuentas',
                'url' => 'usuario/cuenta-corriente',
                'orden' => 5,
                'icono' => 'credit-card',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 23:12:41',
            ),
            45 => 
            array (
                'id' => 46,
                'menu_id' => 40,
                'nombre' => 'Configurar',
                'url' => 'usuario/configurar',
                'orden' => 6,
                'icono' => 'sliders-h',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 23:12:41',
            ),
        ));
        
        
    }
}