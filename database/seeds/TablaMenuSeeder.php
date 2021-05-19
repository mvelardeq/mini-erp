<?php

// namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'menu_id' => 0,
            'nombre' => 'Inicio',
            'url' => 'inicio',
            'orden'=> 1,
            'icono'=> 'home',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
            'menu_id' => 0,
            'nombre' => 'Admin',
            'url' => '#',
            'orden'=> 2,
            'icono'=> 'cog',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
    );
        // DB::table('menu')->insert([
        //     'menu_id' => 0,
        //     'nombre' => 'Admin',
        //     'url' => '#',
        //     'orden'=> 2,
        //     'icono'=> 'cog',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 2,
        //     'nombre' => 'Usuarios',
        //     'url' => 'admin/usuario',
        //     'orden'=> 1,
        //     'icono'=> 'users',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 2,
        //     'nombre' => 'Menú',
        //     'url' => 'admin/menu',
        //     'orden'=> 2,
        //     'icono'=> 'bars',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 2,
        //     'nombre' => 'Menú-rol',
        //     'url' => 'admin/menu-rol',
        //     'orden'=> 3,
        //     'icono'=> 'clipboard-list',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 2,
        //     'nombre' => 'Permiso',
        //     'url' => 'admin/permiso',
        //     'orden'=> 4,
        //     'icono'=> 'user-lock',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 2,
        //     'nombre' => 'Permiso-rol',
        //     'url' => 'admin/permiso-rol',
        //     'orden'=> 5,
        //     'icono'=> 'key',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 2,
        //     'nombre' => 'Roles',
        //     'url' => 'admin/rol',
        //     'orden'=> 6,
        //     'icono'=> 'people-arrows',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 0,
        //     'nombre' => 'Operaciones',
        //     'url' => '#',
        //     'orden'=> 3,
        //     'icono'=> 'tools',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 9,
        //     'nombre' => 'Obras',
        //     'url' => 'operaciones/obra',
        //     'orden'=> 1,
        //     'icono'=> 'building',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 9,
        //     'nombre' => 'Equipos',
        //     'url' => 'operaciones/equipo',
        //     'orden'=> 2,
        //     'icono'=> 'sort',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 9,
        //     'nombre' => 'Empresas',
        //     'url' => 'operaciones/empresa',
        //     'orden'=> 3,
        //     'icono'=> 'funnel-dollar',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 9,
        //     'nombre' => 'Servicios',
        //     'url' => 'operaciones/servicio',
        //     'orden'=> 4,
        //     'icono'=> 'hard-hat',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 9,
        //     'nombre' => 'OT',
        //     'url' => 'operaciones/ot',
        //     'orden'=> 5,
        //     'icono'=> 'hard-hat',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 0,
        //     'nombre' => 'Ventas',
        //     'url' => '#',
        //     'orden'=> 4,
        //     'icono'=> 'fas fa-cash-register',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 15,
        //     'nombre' => 'Cotizaciones',
        //     'url' => 'ventas/cotizacion',
        //     'orden'=> 1,
        //     'icono'=> 'table',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 15,
        //     'nombre' => 'Contratos',
        //     'url' => 'ventas/contrato',
        //     'orden'=> 2,
        //     'icono'=> 'file-signature',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 15,
        //     'nombre' => 'Facturas',
        //     'url' => 'ventas/factura',
        //     'orden'=> 3,
        //     'icono'=> 'fas fa-file-invoice',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 0,
        //     'nombre' => 'Administracion',
        //     'url' => '#',
        //     'orden'=> 5,
        //     'icono'=> 'fas fa-toolbox',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 19,
        //     'nombre' => 'RRHH',
        //     'url' => '#',
        //     'orden'=> 1,
        //     'icono'=> 'people-carry',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 20,
        //     'nombre' => 'Trabajadores',
        //     'url' => 'administracion/rrhh/trabajador',
        //     'orden'=> 1,
        //     'icono'=> 'users',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 20,
        //     'nombre' => 'Cargo',
        //     'url' => 'administracion/rrhh/cargo',
        //     'orden'=> 2,
        //     'icono'=> 'hard-hat',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 20,
        //     'nombre' => 'Quincena',
        //     'url' => 'administracion/rrhh/quincena',
        //     'orden'=> 3,
        //     'icono'=> 'calendar-alt',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 20,
        //     'nombre' => 'Boleta de pago',
        //     'url' => 'administracion/rrhh/boleta-pago',
        //     'orden'=> 4,
        //     'icono'=> 'calendar-check',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 19,
        //     'nombre' => 'Logística',
        //     'url' => '#',
        //     'orden'=> 2,
        //     'icono'=> 'truck',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 25,
        //     'nombre' => 'Productos',
        //     'url' => 'administracion/logistica/producto',
        //     'orden'=> 1,
        //     'icono'=> 'bar-code',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 25,
        //     'nombre' => 'Compras',
        //     'url' => 'administracion/logistica/compra',
        //     'orden'=> 2,
        //     'icono'=> 'fas fa-shopping-cart',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 25,
        //     'nombre' => 'Inventario',
        //     'url' => 'administracion/logistica/inventario',
        //     'orden'=> 3,
        //     'icono'=> 'fas fa-warehouse',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 25,
        //     'nombre' => 'Pérdida existencia',
        //     'url' => 'administracion/logistica/perdida',
        //     'orden'=> 4,
        //     'icono'=> 'trash',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 25,
        //     'nombre' => 'Categorías',
        //     'url' => 'administracion/logistica/categoria',
        //     'orden'=> 5,
        //     'icono'=> 'project-diagram',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 19,
        //     'nombre' => 'Servicios T.',
        //     'url' => 'administracion/servicio-tercero',
        //     'orden'=> 3,
        //     'icono'=> 'gas-pump',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 19,
        //     'nombre' => 'Pago serv.',
        //     'url' => 'administracion/pago-servicio',
        //     'orden'=> 5,
        //     'icono'=> 'money-bill',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 0,
        //     'nombre' => 'Finanzas',
        //     'url' => '#',
        //     'orden'=> 6,
        //     'icono'=> 'file-invoice-dollar',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 33,
        //     'nombre' => 'Contabilidad',
        //     'url' => '#',
        //     'orden'=> 1,
        //     'icono'=> 'calculator',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 34,
        //     'nombre' => 'Cuentas contables',
        //     'url' => 'finanzas/contabilidad/cuenta-contable',
        //     'orden'=> 1,
        //     'icono'=> 'credit-card',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 34,
        //     'nombre' => 'Asiento contable',
        //     'url' => 'finanzas/contabilidad/asiento-contable',
        //     'orden'=> 2,
        //     'icono'=> 'bookmark',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 34,
        //     'nombre' => 'E.S.F',
        //     'url' => 'finanzas/contabilidad/esf',
        //     'orden'=> 3,
        //     'icono'=> 'file-invoice',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 34,
        //     'nombre' => 'EERR',
        //     'url' => 'finanzas/contabilidad/eerr',
        //     'orden'=> 4,
        //     'icono'=> 'coins',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 33,
        //     'nombre' => 'E. movimientos',
        //     'url' => 'finanzas/estado-movimientos',
        //     'orden'=> 2,
        //     'icono'=> 'hand-holding-usd',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 0,
        //     'nombre' => 'Usuario',
        //     'url' => '#',
        //     'orden'=> 7,
        //     'icono'=> 'user',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 39,
        //     'nombre' => 'OTs',
        //     'url' => 'usuario/ot',
        //     'orden'=> 1,
        //     'icono'=> 'file-contract',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('menu')->insert([
        //     'menu_id' => 39,
        //     'nombre' => "Notificaciones",
        //     'url' => 'usuario/notificaciones',
        //     'orden'=> 2,
        //     'icono'=> 'bell',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
    }
}
