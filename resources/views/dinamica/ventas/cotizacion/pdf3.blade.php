<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
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
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
    /* display: flex;
    margin-left: auto; */
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 12px;
  margin-left: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
    /* margin-left: auto;
    display: flex; */
  /* display: inline-block; */
  float: right;

  /* text-align: right; */
  /* display: flex; */
  /* flex-direction: row-reverse; */
}

#project div,
#company div {
  white-space: nowrap;
  /* display: flex; */
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
  text-align: center;
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
        <img src="{{public_path('assets/sb/assets/img/logo5.jpg')}}">
      </div>
      <h1>Cotización N° {{$cotizacion->numero}}</h1>
      <div id="company" class="clearfix">
        <div>Ascensores Industriales SRL</div>
        <div>Los Olivos - Lima<br /> Perú</div>
        <div>(51) 994127770</div>
        <div><a href="ascensores_industriales@hotmail.com">ascensores_industriales@hotmail.com</a></div>
      </div>
      <div id="project">
        <div><span>REFERENCIA</span>Obra {{$cotizacion->equipo->obra->nombre}} O.E {{$cotizacion->equipo->oe}}</div>
        <div><span>CLIENTE</span>{{$cotizacion->equipo->empresa->razon_social}}</div>
        <div><span>DIRECCIÓN</span> {{$cotizacion->equipo->empresa->direccion}}</div>
        <div><span>DIRIGIDO A</span>{{$cotizacion->dirigido_a}}</div>
        <div><span>FECHA</span>{{$cotizacion->fecha}}</div>
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
                <td>{{$loop->index+1}}</td>
                <td>{{$linea_cotizacion->descripcion}}</td>
                <td>{{$linea_cotizacion->cantidad}}</td>
                <td>{{$linea_cotizacion->subtotal}}</td>
                <td>{{$linea_cotizacion->subtotal*$linea_cotizacion->cantidad}}</td>
            </tr>

            @endforeach
          {{-- <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr> --}}
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
