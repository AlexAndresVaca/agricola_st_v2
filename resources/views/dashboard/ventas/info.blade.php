@extends('plantillaDashboard')
@section('name-page')
Detalles de la venta
@endsection
@section('sail-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('venta')}}">Ventas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Detalles de venta</h1>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Venta lista!</strong> Ahora puedes ingresar los productos a la venta.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-secondary">Información de la venta</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample" style="">
                        <div class="card-body">
                            <div class="text-gray-900 font-weight-bolder ">
                                <div>
                                    <i class="fas fa-calendar-day"></i>
                                    Fecha:
                                    <span class="font-weight-normal">Sab, 25 de noviembre del 2020</span>
                                </div>
                                <div>
                                    <i class="fas fa-id-card"></i>
                                    Nombre del cliente:
                                    <span class="font-weight-normal">Apellido Nombre</span>
                                </div>
                                <div>
                                    <i class="fas fa-info-circle"></i>
                                    Estado: <span class="font-weight-normal">En curso</span>
                                </div>
                                <div>
                                    <i class="fas fa-user-tag"></i>
                                    Registrado por:
                                    <span class="font-weight-normal">Vaca Alex</span>
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
                        <div class="col-12 text-right my-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#cerrarventa">Cerrar venta</button>
                        </div>
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
                <a href="{{route('venta')}}" class="text-gray-600 my-2 "><i class="fa fa-angle-left"></i>
                    Regresar</a>
                <button type="button" class="btn btn-outline-danger btn-sm shadow-sm" data-toggle="modal"
                    data-target="#cancelarventa"><i class="far fa-trash-alt"></i> Cancelar venta</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal Cancelar venta -->
<div class="modal fade" id="cancelarventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancelar venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de cancelar la venta? <strong class="text-gray-900">No podrás deshacer esta
                        acción.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger">Cancelar venta</button>
            </div>
        </div>
    </div>
</div>
<!-- Cerrar venta -->
<div class="modal fade" id="cerrarventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cerrar venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de cerrar la venta? <strong class="text-gray-900">No podrás deshacer esta
                        acción.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Cerrar venta</button>
            </div>
        </div>
    </div>
</div>
@endsection