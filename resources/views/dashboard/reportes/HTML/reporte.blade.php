<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <style>
    .text-center>* {
        text-align: center;
    }

    .text-left>* {
        text-align: left;
    }

    .table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table td,
    .table th {
        border: 1px solid black;
        padding: 8px;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        /* text-align: left; */
        background-color: green;
        color: white;
    }

    .bg-white>* {
        background: white;
        color: black;
        font-weight: normal;
    }

    .text-bold {
        font-weight: bold;
    }

    .text-normal {
        font-weight: lighter;
    }

    .text-2 {
        font-size: 1.3rem;
    }
    .text-3 {
        font-size: 2rem;
    }

    .text-capitalize>* {
        text-transform: capitalize;
    }
    </style>

    <title>{{$desde}} | Kardex</title>
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <div class="text-center">
        <h2 class="text-3">Agrícola Santa Teresita </h2>
    </div>
    <table style="width: 100%;" class="table text-center" style="margin: 2rem 0;">
        <thead>
            <tr>
                <th class="text-center" colspan="2"><span class="text-bold text-2">Reporte Modelo Kardex</span></th>
            </tr>
            <tr class="bg-white">
                <th colspan="2"><span class="text-bold">Fecha de generación:</span> {{$ahora}}</th>
            </tr>
            <tr class="bg-white">
                <th><span class="text-bold">Datos del producto</span> </th>
                <th><span class="text-bold">Fecha</span> </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white" style="width: 50%;">
                <td>
                    <div class="text-left">
                        <ul>
                            <li class="text-normal"><span class="text-bold">#COD:</span> {{$producto->cod_prod}}</li>
                            <li class="text-normal"><span class="text-bold">Tipo:</span> {{$producto->tipo_prod}}</li>
                            <li class="text-normal"><span class="text-bold">Color:</span> {{$producto->color_prod}}</li>
                            <li class="text-normal"><span class="text-bold">Destino:</span> {{$producto->destino_prod}}
                            </li>
                            <li class="text-normal"><span class="text-bold">Tamaño:</span> {{$producto->tamano_prod}}
                            </li>
                        </ul>
                    </div>
                </td>
                <td style="width: 50%;">
                    <div class="text-left">
                        <ul>
                            <li><span class="text-bold">Desde:</span>
                                {{\Carbon\Carbon::parse($desde)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}
                            </li>
                            <li><span class="text-bold">Hasta:</span>
                                {{\Carbon\Carbon::parse($hasta)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="margin: 2rem 0;" class="text-capitalize">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="text-center table table-light table-bordered table-striped table-hover"
                        id="tablaReporte" width="100%" cellspacing="0">
                        <thead class="thead-dark text-gray-100 ">
                            <tr>
                                <th scope="col" rowspan="2">#</th>
                                <th scope="col" rowspan="2">Fecha</th>
                                <th scope="col" colspan="2">Transacción</th>
                                <th colspan="3">Cantidad</th>
                            </tr>
                            <tr>
                                <th>Tipo</th>
                                <th>Negociante</th>
                                <th scope="col">Entrada</th>
                                <th scope="col">Salida</th>
                                <th scope="col">Existencia</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900 text-capitalize">
                            @foreach($reporte as $item)
                            <tr>
                                <td>{{$item->scope}}
                                <td>{{\Carbon\Carbon::parse($item->fecha)->isoFormat('DD/MM/YYYY H:mm a')}}
                                </td>
                                <td>{{$item->tipo}}</td>
                                <td>{{$item->apellido_neg}} {{$item->nombre_neg}}</td>
                                <td style="color: blue">
                                    @if($item->tipo == 'compra' OR $item->tipo == 'produccion')
                                    {{$item->cantidad}}
                                    @endif
                                </td>
                                <td style="color: green;">
                                    @if($item->tipo == 'venta')
                                    {{$item->cantidad}}
                                    @endif
                                </td>
                                <td style="color: darkslategrey;">{{$item->existencia}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" style="color: darkslategrey;">Copyright © Santa Teresita 2020</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>