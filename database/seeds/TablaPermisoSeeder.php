<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            'listar obras',
            'crear obras',
            'editar obras',
            'eliminar obras',
            'listar equipos',
            'crear equipos',
            'editar equipos',
            'eliminar equipos',
            'listar empresas',
            'crear empresas',
            'editar empresas',
            'eliminar empresas',
            'listar servicios',
            'crear servicios',
            'editar servicios',
            'eliminar servicios',
            'listar ot',
            'crear ot',
            'editar ot',
            'eliminar ot',
            'listar cotizaciones',
            'crear cotizaciones',
            'editar cotizaciones',
            'eliminar cotizaciones',
            'listar contratos',
            'crear contratos',
            'editar contratos',
            'eliminar contratos',
            'listar facturas',
            'crear facturas',
            'editar facturas',
            'eliminar facturas',
            'procesar facturas',
            'pagar facturas',
            'detraer facturas',
            'anular facturas',
            'listar trabajadores',
            'crear trabajadores',
            'editar trabajadores',
            'eliminar trabajadores',
            'listar cargos',
            'crear cargos',
            'editar cargos',
            'eliminar cargos',
            'listar boletas',
            'crear boletas',
            'editar boletas',
            'eliminar boletas',
            'listar productos',
            'crear productos',
            'editar productos',
            'eliminar productos',
            'listar compras',
            'crear compras',
            'editar compras',
            'eliminar compras',
            'listar inventario',
            'listar perdidas',
            'crear perdidas',
            'editar perdidas',
            'eliminar perdidas',
            'listar categorias',
            'crear categorias',
            'editar categorias',
            'eliminar categorias',
            'listar serviciost',
            'crear serviciost',
            'editar serviciost',
            'eliminar serviciost',
            'listar pagos serviciost',
            'crear pagos serviciost',
            'editar pagos serviciost',
            'eliminar pagos serviciost',
            'listar cuentas contables',
            'crear cuentas contables',
            'editar cuentas contables',
            'eliminar cuentas contables',
            'listar cuentas corrientes',
            'crear cuentas corrientes',
            'editar cuentas corrientes',
            'eliminar cuentas corrientes',
            'eliminar posts',
            'crear ascenso trabajador',
            'listar observacion trabajador',
            'crear observacion trabajador',
            'finalizar contrato',
            'retomar contrato',
        ];
        foreach($permisos as $key=>$value){
            DB::table('permiso')->insert([
                'nombre' => $value,
                'slug'=> Str::slug($value),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
