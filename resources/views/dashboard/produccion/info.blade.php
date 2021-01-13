@extends('plantillaDashboard')
@section('name-page')
Detalles de la producción
@endsection
@section('production-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('produccion')}}">Producción</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Detalles de producción</h1>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card my-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-secondary">Información de la producción</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <div class="text-gray-900 font-weight-bolder text-capitalize ">
                                <div>
                                    <i class="fas fa-calendar-day"></i>
                                    Fecha:
                                    <span class="font-weight-normal">
                                        {{\Carbon\Carbon::parse($read_produccion->created_at)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}</span>
                                </div>
                                <div>
                                    <i class="fas fa-info-circle"></i>
                                    Estado: <span class="font-weight-normal">{{$read_produccion->estado_trans}}</span>
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
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            @if($read_produccion->estado_trans == 'en curso')
            <div class="row">
                <form action="{{route('add_prod_det',['id' => $read_produccion, 'tipo' => 'produccion'])}}"
                    method="POST">
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
                        @if($read_produccion->estado_trans == 'en curso')
                        <div class="col-12 text-right my-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#cerrarProduccion">Cerrar producción</button>
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
                                        @if($read_produccion->estado_trans == 'en curso')
                                        <form
                                            action="{{route('delete_prod_det',['id' => $read_produccion, 'id_det' => $item->cod_det ,'tipo' => 'produccion'])}}"
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
                <a href="{{route('produccion')}}" class="text-gray-600 text-dm"><i class="fa fa-angle-left"></i>
                    Regresar</a>
                <button type="button" class="btn btn-outline-danger btn-sm shadow-sm" data-toggle="modal"
                    data-target="#eliminarProduccion"><i class="far fa-trash-alt"></i> Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="eliminarProduccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar producción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de revertir los registros actuales? <strong>No podrás deshacer esta acción.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{route('produccion_delete',$read_produccion)}}" method="POST">
                    @CSRF
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cerrarProduccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cerrar producción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de cerrar la producción? <strong class="text-gray-900">No podrás deshacer esta
                        acción.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{route('produccion_cerrar',$read_produccion)}}" method="POST">
                    @CSRF
                    <button type="submit" class="btn btn-primary">Cerrar producción</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection