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
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('productos')}}">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Editar producto</h1>
    </div>
    <div class="card-body">
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
            <div class="modal-footer d-flex justify-content-between">
                <a href="{{route('productos')}}" class="text-gray-600 text-dm"><i class="fa fa-angle-left"></i> Regresar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="container">
            <div class="row justify-content-end">
                <button type="button" class="btn btn-outline-danger btn-sm shadow-sm" data-toggle="modal"
                    data-target="#eliminarProducto"><i class="far fa-trash-alt"></i> Eliminar</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de eliminar este producto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@endsection