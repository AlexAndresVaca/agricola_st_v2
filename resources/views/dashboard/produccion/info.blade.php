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
    </div>
    <div class="card-body">
        <div class="container">
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
            <div class="row">
                <div class="col">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Producto agregado!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Producto no encontrado!</strong> revisa tus datos y vuelve a intentar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Producto eliminado!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
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
                                        <button type="button" class="btn btn-circle btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                            <!-- <span class="d-none d-sm-inline">Eliminar</span> -->
                                        </button>
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
                <a href="{{route('produccion')}}" class="text-gray-600 text-dm"><i class="fa fa-angle-left"></i>
                    Regresar</a>
                <button type="button" class="btn btn-outline-danger btn-sm shadow-sm" data-toggle="modal"
                    data-target="#eliminarProducto"><i class="far fa-trash-alt"></i> Vaciar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="eliminarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vaciar producción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de revertir los registros actuales? <strong>No podrás deshacer esta acción.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger">Vaciar</button>
            </div>
        </div>
    </div>
</div>
@endsection