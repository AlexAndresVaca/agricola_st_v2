@extends('plantillaDashboard')
@section('name-page')
Reporte Kardex
@endsection
@section('reports-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Reportes Kardex</li>
    </ol>
</nav>
@endsection
@section('body')
<h1 class="h3 mb-4 text-gray-800">Kardex</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ingresa los datos</div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form action="{{route('generar_reporte')}}" method="POST">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <h3>Busca un producto por su clave:</h3>
                                    <label for="">Codigo</label>
                                    <div class="input-group">
                                        <input type="text" maxlength="4" id="autocomplete" name="clave_prod" class="form-control @if($errors->get('clave_prod')) is-invalid @endif" placeholder="----" value="{{old('clave_prod')}}">
                                        @if($errors->get('clave_prod'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('clave_prod')}}
                                        </div>
                                        @endif
                                    </div>
                                    <!-- <hr> -->
                                </div>
                                <div class="form-group col-12">
                                    <h3>O por sus características:</h3>
                                </div>
                                <div class="form-group col-md">
                                    <label for="">Tipo</label>
                                    <select name="tipo_prod" class="custom-select mr-sm-2 text-capitalize @if($errors->get('tipo_prod')) is-invalid @endif">
                                        @if($errors->any() AND old('tipo_prod') != '')
                                        <optgroup label="Actual">
                                            <option selected>{{old('tipo_prod')}}</option>
                                        </optgroup>
                                        @else
                                        <option value="">Seleccione</option>
                                        @endif
                                        @foreach($tipo as $item)
                                        <option value="{{$item->tipo_prod}}">{{$item->tipo_prod}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md ">
                                    <label for="">Color</label>
                                    <select name="color_prod" class="custom-select mr-sm-2 text-capitalize @if($errors->get('color_prod')) is-invalid @endif">
                                        @if($errors->any() AND old('color_prod') != '')
                                        <optgroup label="Actual">
                                            <option selected>{{old('color_prod')}}</option>
                                        </optgroup>
                                        @else
                                        <option value="">Seleccione</option>
                                        @endif
                                        @foreach($color as $item)
                                        <option value="{{$item->color_prod}}">{{$item->color_prod}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md ">
                                    <label for="">Destino</label>
                                    <select name="destino_prod" class="custom-select mr-sm-2 text-capitalize @if($errors->get('destino_prod')) is-invalid @endif">
                                        @if($errors->any() AND old('destino_prod') != '')
                                        <optgroup label="Actual">
                                            <option selected>{{old('destino_prod')}}</option>
                                        </optgroup>
                                        @else
                                        <option value="">Seleccione</option>
                                        @endif
                                        @foreach($destino as $item)
                                        <option value="{{$item->destino_prod}}">{{$item->destino_prod}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md ">
                                    <label for="">Tamaño</label>
                                    <select name="tamano_prod" class="custom-select mr-sm-2 text-capitalize @if($errors->get('tamano_prod')) is-invalid @endif">
                                        @if($errors->any() AND old('tamano_prod') != '')
                                        <optgroup label="Actual">
                                            <option selected>{{old('tamano_prod')}}</option>
                                        </optgroup>
                                        @else
                                        <option value="">Seleccione</option>
                                        @endif
                                        @foreach($tamano as $item)
                                        <option value="{{$item->tamano_prod}}">{{$item->tamano_prod}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12 p-0">
                                <h3>Establece un rango de fechas:</h3>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md">
                                    <label for="">Desde</label>
                                    <div class="input-group">
                                        <input type="date" name="desde" class="form-control @if($errors->get('desde')) is-invalid @endif" value="{{old('desde')}}">
                                        @if($errors->get('desde'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('desde')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md">
                                    <label for="">Hasta</label>
                                    <div class="input-group">
                                        <input type="date" name="hasta" class="form-control @if($errors->get('hasta')) is-invalid @endif" value="{{old('hasta')}}">
                                        @if($errors->get('hasta'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('hasta')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12  text-center">
                                    <label class="" style="opacity: 0;" for="">Opción:</label>
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary mx-auto btn-block" style="width: 60%;">Generar reporte</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            @if($errors->has('prod_no_encontrado'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Producto no encontrado!</strong> revisa tus datos y vuelve a intentar.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if($mostrar_tabla == true)
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Reporte Generado!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if(isset($producto))
                            <div class="card my-4">
                                <div class="card-header">Reporte</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Datos del producto</label>
                                            <ul>
                                                <li>Tipo {{$producto->tipo_prod}}</li>
                                                <li>Color {{$producto->color_prod}}</li>
                                                <li>Destino {{$producto->destino_prod}}</li>
                                                <li>Tamaño {{$producto->tamano_prod}}</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <label for="">Fecha</label>
                                            <ul>
                                                <li>Desde
                                                    {{\Carbon\Carbon::parse($desde)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}
                                                </li>
                                                <li>Hasta
                                                    {{\Carbon\Carbon::parse($hasta)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col d-sm-none d-md-block">
                                            <label for="">Opciones</label>
                                            <br>
                                            <a href="{{route('download_reporte')}}" class="btn btn-danger" target="_blank">
                                                <i class="fa fa-file-pdf"></i>
                                                Generar PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="text-center table table-light table-bordered table-striped table-hover" id="tablaReporte" width="100%" cellspacing="0">
                                    <thead class="thead-dark text-gray-100 ">
                                        <tr>
                                            <th scope="col">Scope</th>
                                            <th scope="col" rowspan="2">Fecha</th>
                                            <th scope="col" colspan="2">Transaccion</th>
                                            <th colspan="3">Cantidad</th>
                                        </tr>
                                        <tr>
                                            <th>Scope</th>
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
                                            <td>
                                                @if($item->tipo == 'compra' OR $item->tipo == 'produccion' OR $item->tipo == 'Devolución venta')
                                                {{$item->cantidad}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->tipo == 'venta' OR $item->tipo == 'Deshecho' OR $item->tipo == 'Devolución compra')
                                                {{$item->cantidad}}
                                                @endif
                                            </td>
                                            <td>{{$item->existencia}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('#autocomplete').autocomplete({
        // Sugiere el primer elemento en azul
        autoFocus: true,
        // Recupera la informacion mediante una solicitud ajax
        source: function(request, response) {
            $.ajax({
                url: "{{route('autocompletar',['tipo' => 'compra'])}}",
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        // Evita que el valor cambie con la tecla arriba y abajo
        focus: function(e, ui) {
            return false;
        },
        // A menos que elija una opción tendrá valor caso contrario sera null
        change: function(event, ui) {
            if (!ui.item) {
                $("#autocomplete").val(null);
                // $("#autocompleteID").val(null);
            }

        },
        // Coloca los valores obtenidos en la consulta (Hay que ocultar el campo ID)
        select: function(event, ui) {
            $('#autocomplete').val(ui.item.clave);
            // $('#autocompleteID').val(ui.item.value);
            return false;
        }
    });
</script>
@endsection