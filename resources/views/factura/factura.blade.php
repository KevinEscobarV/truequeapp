<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Factura FE{{$factura->id}}</title>
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
            width: 18cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 15px;
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
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 1.8em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
        }

        #project {
            float: left;
            font-size: 1.2em;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;

        }

        #company {
            float: right;
            text-align: right;
            font-size: 1.2em;
        }

        #project div,
        #company div {
            white-space: nowrap;
            margin-bottom: 9px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #dddddd;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #303133;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
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
            border-top: 1px solid #3e4349;
            ;
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
            {{-- <img src="logo.png"> --}}
            <h1>EL TRUEQUE</h1>
        </div>
        <h1>Factura de Venta No FE{{ $factura->id }}</h1>
        
        <div id="company" class="clearfix">
            <div>El Trueque</div>
            <div>Cra 21 N° 13.53 ,<br /> Yopal/Casanare</div>
            <div>310 860 13 43</div>
            <div><a href="mailto:company@example.com">company@example.com</a></div>
        </div>

        <div id="project">
            <div><span>CLIENTE:</span> {{ $factura->nombre }}</div>
            <div><span>NIT:</span> {{ $factura->nit }}</div>
            <div><span>EMAIL:</span> <a href="{{$factura->email}}">{{$factura->email}}</a></div>
            <div><span>TELEFONO:</span> {{ $factura->telefono }}</div>
            <div><span>FECHA:</span> {{ $factura->created_at->format('d/m/Y') }} Hora: {{ $factura->created_at->format('g:i a') }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    
                    <th class="service">CANTIDAD</th>
                    <th class="desc">DESCRIPCIÓN</th>
                    <th>PRECIO UNITARIO</th>
                    <th>PRECIO TOTAL</th>

                </tr>
            </thead>
            <tbody>

             
               @foreach ($productos as $producto)

                <tr>
                    
                    <td class="service" style="text-align: center">{{$producto->qty}}</td>
                    <td class="desc">{{$producto->name}}</td>
                   
                    <td class="unit">$ {{ number_format($producto->price, 0, '', '.') }}</td>           
                    <td class="total">$ {{ number_format($producto->qty * $producto->price, 0, '', '.')}}</td>
                </tr> 

               @endforeach

                <tr>
                    <td colspan="3">SUBTOTAL</td>
                    <td class="total">$ {{ number_format($suma, 0, '', '.')}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="grand total">TOTAL</td>
                    <td class="grand total">$ {{ number_format($suma, 0, '', '.')}}</td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTA:</div>
            <div class="notice">No hay devolución de dinero despues de retirar los productos del almacen.</div>
        </div>
    </main>
    <footer>
        La factura se creó en una computadora y es válida sin la firma y el sello.
    </footer>
</body>

</html>
