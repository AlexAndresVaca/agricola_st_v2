@extends('plantillaDashboard')
@section('name-page')
Detalles de la compra
@endsection
@section('purchase-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('compra')}}">Compras</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Detalles de compra</h1>
        @if(session('add_compra'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Compra lista!</strong> Ahora puedes ingresar los productos a la compra.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-secondary">Información de la compra</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body text-capitalize">
                            <div class="text-gray-900 font-weight-bolder ">
                                <div>
                                    <i class="fas fa-calendar-day"></i>
                                    Fecha:
                                    <span class="font-weight-normal">
                                        {{\Carbon\Carbon::parse($read_compra->created_at)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}</span>
                                </div>
                                <div>
                                    <i class="fas fa-clock"></i>
                                    Hora:
                                    <span class="font-weight-normal">
                                        {{\Carbon\Carbon::parse($read_compra->created_at)->isoFormat('h:mm a')}}</span>
                                </div>
                                <div>
                                    <i class="fas fa-id-card"></i>
                                    Nombre del proveedor:
                                    <span class="font-weight-normal">
                                        @if(isset($read_negociante))
                                        {{$read_negociante->apellido_neg}} {{$read_negociante->nombre_neg}}
                                        @else
                                        <span class="text-muted ">[Negociante eliminado]</span>
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <i class="fas fa-info-circle"></i>
                                    Estado: <span class="font-weight-normal">{{$read_compra->estado_trans}}</span>
                                </div>
                                <div>
                                    <i class="fas fa-user-tag"></i>
                                    Registrado por:
                                    <span class="font-weight-normal">
                                        @if(isset($read_usuario))
                                        {{$read_usuario->apellido_usu}} {{$read_usuario->nombre_usu}}
                                        @else
                                        <span class="text-muted ">[Usuario eliminado]</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            @if($read_compra->estado_trans == 'en curso')
            <div class="row">
                <form action="{{route('add_prod_det',['id' => $read_compra, 'tipo' => 'compra'])}}" method="POST">
                    @CSRF
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="">Tipo</label>
                            <select name="tipo_prod"
                                class="custom-select mr-sm-2 text-capitalize @if($errors->get('tipo_prod')) is-invalid @endif">
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
                        <div class="form-group col-md-2 ">
                            <label for="">Color</label>
                            <select name="color_prod"
                                class="custom-select mr-sm-2 text-capitalize @if($errors->get('color_prod')) is-invalid @endif">
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
                        <div class="form-group col-md-2 ">
                            <label for="">Destino</label>
                            <select name="destino_prod"
                                class="custom-select mr-sm-2 text-capitalize @if($errors->get('destino_prod')) is-invalid @endif">
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
                        <div class="form-group col-md-2 ">
                            <label for="">Tamaño</label>
                            <select name="tamano_prod"
                                class="custom-select mr-sm-2 text-capitalize @if($errors->get('tamano_prod')) is-invalid @endif">
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
                        <div class="form-group col-md-2 ">
                            <label for="">Cantidad</label>
                            <div class="input-group">
                                <input type="number" min="0" name="cant_prod"
                                    class="form-control @if($errors->get('cant_prod')) is-invalid @endif"
                                    placeholder="Ej: 500" value="{{old('cant_prod')}}">
                                <div class="input-group-append" title="Unidades">
                                    <div class="input-group-text text-xs">Unidades</div>
                                </div>
                                @if($errors->get('cant_prod'))
                                <div class="invalid-feedback">
                                    {{$errors->first('cant_prod')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-2  text-center">
                            <label class="" style="opacity: 0;" for="">Opción:</label>
                            <div class="input-group">
                                <button type="submit" class="btn btn-success mx-auto">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            <div class="row">
                <div class="col">
                    @if(session('add_prod_det'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Producto agregado!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if($errors->has('prod_no_encontrado'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Producto no encontrado!</strong> revisa tus datos y vuelve a intentar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('delete_prod_det'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Producto eliminado!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        @if($read_compra->estado_trans == 'en curso')
                        <div class="col-12 text-right my-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#cerrarCompra">Cerrar compra</button>
                        </div>
                        @endif
                        <table class="table table-light table-bordered table-striped table-hover" id="tablaProductos"
                            width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Tamaño</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($detalle as $item)
                                <tr>
                                    <td scope="row">{{$item->cod_det}}</td>
                                    <td>{{$item->tipo_prod}}</td>
                                    <td>{{$item->color_prod}}</td>
                                    <td>{{$item->destino_prod}}</td>
                                    <td>{{$item->tamano_prod}}</td>
                                    <td>{{$item->cantidad_det}}</td>
                                    <td class="text-center w-75px">
                                        @if($read_compra->estado_trans == 'en curso')
                                        <form
                                            action="{{route('delete_prod_det',['id' => $read_compra, 'id_det' => $item->cod_det ,'tipo' => 'compra'])}}"
                                            method="POST">
                                            @CSRF
                                            <button type="submit" class="btn btn-circle btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @else
                                        <button type="button" class="btn btn-circle btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <div class="container">
            <div class="row justify-content-between">
                <a href="{{route('compra')}}" class="text-gray-600 my-2 "><i class="fa fa-angle-left"></i>
                    Regresar</a>
                <button type="button" class="btn btn-outline-danger btn-sm shadow-sm" data-toggle="modal"
                    data-target="#cancelarCompra"><i class="far fa-trash-alt"></i> Eliminar compra</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal Cancelar compra -->
<div class="modal fade" id="cancelarCompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de eliminar la compra? <strong class="text-gray-900">No podrás deshacer esta
                        acción.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{route('compra_delete',$read_compra)}}" method="POST">
                    @CSRF
                    <button type="submit" class="btn btn-danger">Eliminar compra</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Cerrar compra -->
<div class="modal fade" id="cerrarCompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cerrar compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de cerrar la compra? <strong class="text-gray-900">No podrás deshacer esta
                        acción.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{route('compra_cerrar',$read_compra)}}" method="POST">
                    @CSRF
                    <button type="submit" class="btn btn-primary">Cerrar compra</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection