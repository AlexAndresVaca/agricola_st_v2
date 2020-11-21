@extends('plantillaDashboard')
@section('name-page')
Productos
@endsection
@section('products-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="row justify-content-center my-5">
        <form action="">
            @CSRF
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoProducto"><i
                    class="fa fa-plus-circle"></i> Nuevo producto</button>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Producto agregado!</strong> puedes editar su información <a href="{{route('productosInfo')}}">aquí</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Producto actualizado!</strong>
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
    </div>
    <div class="card-header">
        <div class="container mb-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800 text-center">Lista de productos</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ">
                    <i class="fas fa-file-pdf"></i>
                    Descargar PDF
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light table-bordered table-striped table-hover" id="tablaProductos" width="100%"
                cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Color</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Tamaño</th>
                        <th scope="col">Stock</th>
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
                        <td>16000</td>
                        <td class="text-center w-75px">
                            <a href="{{route('productosInfo')}}" class="text-secondary">
                                <i class="fas fa-edit"></i>
                                <span class="d-none d-sm-inline">Editar</span>
                            </a>
                        </td>
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-block d-sm-none card-footer">
        <div class="container">
            <div class="col d-flex justify-content-center">
                <a href="#" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-file-pdf fa-sm text-white-50"></i>
                    Descargar PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="nuevoProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                @CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Tipo</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Rosa</option>
                                <option value="">Clavel</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="">Color</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Rojo</option>
                                <option value="">Blanco</option>
                                <option value="">Varios</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Destino</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Nacional</option>
                                <option value="">Extranjero</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Tamaño</label>
                            <select name="" id="" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value="">Largo</option>
                                <option value="">Corto</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="">Stock</label>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection