@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cotización {{$cotizacion->numero}}</title>
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
        margin: 0 0 20px 0;
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
        padding: 10px;
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
      <div id="logo">
        <img src="{{public_path('assets/sb/assets/img/top-pdf.png')}}">
      </div>
      <h1>COTIZACIÓN N° {{$cotizacion->numero}}</h1>
      <div id="project">
        <div><strong>REFERENCIA</strong>Obra {{$cotizacion->equipo->obra->nombre}} O.E {{$cotizacion->equipo->oe}}</div>
        <div><strong>CLIENTE</strong>{{$cotizacion->equipo->empresa->razon_social}}</div>
        {{-- <div><strong>DIRECCIÓN</strong> {{$cotizacion->equipo->empresa->direccion}}</div> --}}
        <div><strong>DIRIGIDO A</strong>{{$cotizacion->dirigido_a}}</div>
        <div><strong>FECHA</strong>{{Carbon::parse($cotizacion->fecha)->isoFormat('DD/MM/YYYY')}}</div>

      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Item</th>
            <th class="desc">Descripción</th>
            <th>Cantidad</th>
            <th>Valor Unit. S/.</th>
            <th>Total S/.</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($lineas_cotizacion as $linea_cotizacion)

            <tr>
                <td class="service">{{$loop->index+1}}</td>
                <td class="desc">{{$linea_cotizacion->descripcion}}</td>
                <td>{{number_format($linea_cotizacion->cantidad,2)}}</td>
                <td>{{number_format($linea_cotizacion->subtotal,2)}}</td>
                <td>{{number_format($linea_cotizacion->subtotal*$linea_cotizacion->cantidad,2)}}</td>
            </tr>

            @endforeach
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">S/.{{number_format($cotizacion_total->total,2)}}</td>
          </tr>
          <tr>
            <td colspan="4">IGV 18%</td>
            <td class="total">S/.{{number_format($cotizacion_total->total*0.18,2)}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">PRECIO TOTAL</td>
            <td class="grand total">S/.{{number_format($cotizacion_total->total*1.18,2)}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Son 15 días de validez de la oferta.</div>
      </div>
    </main>
    <footer>
      Forma de pago: 100% a la aprobación de la cotización.
    </footer>
  </body>
</html>
