@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Boleta de pago</title>
    <style>
        .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

        a {
        color: #5D6975;
        text-decoration: underline;
        }

        html{
            margin: 0;
            padding: 0;
        }

        body {
        position: relative;
        /* width: 21cm;
        height: 29.7cm; */
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 13px;
        font-family: Arial;
        }

        header {
        /* padding: 10px 0; */
        /* margin-bottom: 30px; */
        padding: 0;
        margin: 0;
        }

        main {
            padding: 15px 40px;
        }

        #logo {
        text-align: center;
        margin-bottom: 10px;
        }

        #logo img {
        /* width: 90px; */
        width: 100%;
        }

        h1 {
        /* border-top: 1px solid  #5D6975; */
        /* border-bottom: 1px solid  #5D6975; */
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 60px 0 20px 0;
        background: url(dimension.png);
        }

        #project {
            padding: 0 40px;
        }

        #project strong {
            display: inline-flex;
            color: #5D6975;
            width: 72px;
            margin-right: 40px;
            margin-left: 0px;
            align-items: baseline;
            font-size: 1em;
        }


        #project div,
        #company div {
            margin-bottom: 10px;
        white-space: nowrap;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
        background: #F5F5F5;
        }

        table th,
        table td {
        text-align: right;
        }

        table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
        font-size: 16px;
        }

        table .service,
        table .desc {
        text-align: left;
        }

        table td {
        padding: 20px;
        text-align: right;
        }

        table td.service,
        table td.desc {
        vertical-align: top;
        text-align: left;
        }

        table td.unit,
        table td.qty,
        table td.total {
        font-size: 1.2em;
        }

        table td.grand {
        border-top: 1px solid #5D6975;;
        }

        #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
        }

        footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
        }
	</style>
  </head>
  <body>
    <header class="clearfix">
      <h1>Boleta de pago {{Carbon::create($periodo)->isoFormat('MMMM YYYY')}}</h1>
      <div id="project">
        <div><strong>TRABAJADOR</strong>{{$trabajador->primer_nombre.' '.$trabajador->primer_apellido}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Descripción</th>
            <th class="desc"></th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
            @if ($dias_noc->count() - $faltas->count() > 0)
                <tr>
                    <td class="service">Sueldo básico</td>
                    <td class="desc"></td>
                    <td>{{number_format($costo_hora * 8 * 30, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Días considerados ({{$dias_tra+$numeros_domingo+$faltas->count()}} dias)</td>
                    <td class="desc"></td>
                    <td>{{number_format(($dias_tra+$numeros_domingo+$faltas->count())*$costo_hora*8,2)}}</td>
                </tr>
                <tr>
                    <td class="service">Horas al 25% ({{ $horas_25p->sum('horas') }} horas)</td>
                    <td class="desc"></td>
                    <td>{{number_format($horas_25p->sum('horas') * $costo_hora * 1.25, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Horas al 35% ({{ $horas_35p->sum('horas') }} horas)</td>
                    <td class="desc"></td>
                    <td>{{number_format($horas_35p->sum('horas') * $costo_hora * 1.35, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Horas dobles ({{ $horas_dob->sum('horas') }} horas)</td>
                    <td class="desc"></td>
                    <td>{{number_format($horas_dob->sum('horas') * $costo_hora * 2, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Gastos</td>
                    <td class="desc"></td>
                    <td>{{number_format($gastos->sum('pago'), 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Adelantos</td>
                    <td class="desc"></td>
                    <td>{{number_format($adelantos->sum('pago'), 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Descuentos</td>
                    <td class="desc"></td>
                    <td>{{number_format($descuentos, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Faltas ({{$faltas->count()}} días)</td>
                    <td class="desc"></td>
                    <td>{{number_format($faltas->count() * $costo_hora * 8, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Pago quincena</td>
                    <td class="desc"></td>
                    <td>{{number_format($pago_quincena['pago'],2)}}</td>
                </tr>
            <tr>
                <td colspan="2" class="grand total">PAGO FIN DE MES</td>
                <td class="grand total">S/.{{number_format($request->pago_mes,2)}}</td>
            </tr>
            @else
                <tr>
                    <td class="service">Sueldo básico</td>
                    <td class="desc"></td>
                    <td>{{number_format($costo_hora * 8 * 30, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Horas al 25% ({{ $horas_25p->sum('horas') }} horas)</td>
                    <td class="desc"></td>
                    <td>{{number_format($horas_25p->sum('horas') * $costo_hora * 1.25, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Horas al 35% ({{ $horas_35p->sum('horas') }} horas)</td>
                    <td class="desc"></td>
                    <td>{{number_format($horas_35p->sum('horas') * $costo_hora * 1.35, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Horas dobles ({{ $horas_dob->sum('horas') }} horas)</td>
                    <td class="desc"></td>
                    <td>{{number_format($horas_dob->sum('horas') * $costo_hora * 2, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Gastos</td>
                    <td class="desc"></td>
                    <td>{{number_format($gastos->sum('pago'), 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Adelantos</td>
                    <td class="desc"></td>
                    <td>{{number_format($adelantos->sum('pago'), 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Descuentos</td>
                    <td class="desc"></td>
                    <td>{{number_format($descuentos, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Faltas ({{$faltas->count()}} días)</td>
                    <td class="desc"></td>
                    <td>{{number_format($faltas->count() * $costo_hora * 8, 2)}}</td>
                </tr>
                <tr>
                    <td class="service">Pago quincena</td>
                    <td class="desc"></td>
                    <td>{{number_format($pago_quincena->pago,2)}}</td>
                </tr>
            <tr>
                <td colspan="2" class="grand total">PAGO FIN DE MES</td>
                <td class="grand total">S/.{{number_format($request->pago_mes,2)}}</td>
            </tr>
            @endif

        </tbody>
      </table>
    </main>
    <footer>
      Boleta de pago
    </footer>
  </body>
</html>
