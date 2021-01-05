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
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-secondary">Información de la compra</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <div class="text-gray-900 font-weight-bolder ">
                                <div>
                                    <i class="fas fa-calendar-day"></i>
                                    Fecha:
                                    <span class="font-weight-normal">
                                        {{\Carbon\Carbon::parse($read_compra->created_at)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}</span>
                                </div>
                                <div>
                                    <i class="fas fa-id-card"></i>
                                    Nombre del cliente:
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
                                    Estado: <span class="font-weight-normal">En curso</span>
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
                <form action="" method="post">
                    @CSRF
                    <div class="form-row">
                        <div class="form-group col-md-2 ">
                            <label for="">Tipo</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Rosa</option>
                                <option value="">Clavel</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="">Color</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Rojo</option>
                                <option value="">Blanco</option>
                                <option value="">Varios</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="">Destino</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Nacional</option>
                                <option value="">Extranjero</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="">Tamaño</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Largo</option>
                                <option value="">Corto</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="">Cantidad</label>
                            <div class="input-group">
                                <input type="number" min="0" class="form-control is-valid" placeholder="Ej: 500">
                                <div class="input-group-append" title="Unidades">
                                    <div class="input-group-text">U.</div>
                                </div>
                                <div class="invalid-feedback">
                                    Mensaje error
                                </div>
                                <div class="valid-feedback">
                                    Mensaje confirmación
                                </div>
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
                    @if(session('add_prod_compra'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Producto agregado!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('add_prod_no_encontrado'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Producto no encontrado!</strong> revisa tus datos y vuelve a intentar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('add_prod_eliminado'))
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
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Rosa</td>
                                    <td>Rojo</td>
                                    <td>Extranjero</td>
                                    <td>Largo</td>
                                    <td>160</td>
                                    <td class="text-center w-75px">
                                        @if($read_compra->estado_trans == 'en curso')
                                        <form action="" method="POST">
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