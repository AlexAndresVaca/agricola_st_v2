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
        <small class="text-xs ml-3"><b>COD</b>: ( {{$read_producto->clave_prod}} )</small>
    </div>
    <div class="card-body">
        <!-- Si existe algún error -->
        @if($errors->has('producto_existente'))
        <div class="row">
            <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops!</strong> No se realizaron cambios, ya existe otro producto con las mismas
                    características.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        @if(session('update_producto'))
        <div class="row">
            <div class="col">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Producto actualizado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <form action="{{route('productos_update',$read_producto)}}" method="POST">
            @CSRF
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="">Tipo</label>
                        <div class="input-group">
                            <input type="text" class="form-control @if($errors->has('tipo_prod')) is-invalid @endif" placeholder="Ej: Clavel" name="tipo_prod" value="@if($errors->get('tipo_prod')){{old('tipo_prod')}}@else{{$read_producto->tipo_prod}}@endif" required>
                            @if($errors->has('tipo_prod'))
                            <div class="invalid-feedback">
                                {{$errors->first('tipo_prod')}}
                            </div>
                            @endif
                        </div>
                        <small id="passwordHelpBlock" class="form-text text-muted ml-2">
                            El nombre debe ser en singular.
                        </small>
                    </div>
                    <div class="form-group col">
                        <label for="">Color</label>
                        <select class="custom-select mr-sm-2 @if($errors->has('color_prod')) is-invalid @endif" name="color_prod">
                            <option selected value="{{$read_producto->color_prod}}">{{$read_producto->color_prod}} (Sin
                                modificar)</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Color">Color (Otros)</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="">Destino</label>
                        <select class="custom-select mr-sm-2 @if($errors->has('destino_prod')) is-invalid @endif" name="destino_prod">
                            <option selected value="{{$read_producto->destino_prod}}">{{$read_producto->destino_prod}}
                                (Sin modificar)</option>
                            <option value="Nacional">Nacional</option>
                            <option value="Extranjero">Extranjero</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="">Tamaño</label>
                        <select class="custom-select mr-sm-2 @if($errors->has('tamano_prod')) is-invalid @endif" name="tamano_prod">
                            <option selected value="{{$read_producto->tamano_prod}}">{{$read_producto->tamano_prod}}
                                (Sin modificar)</option>
                            <option value="Fancy">Fancy (Largo)</option>
                            <option value="Selecta">Selecta (Corto)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <a href="{{route('productos')}}" class="text-gray-600 text-dm"><i class="fa fa-angle-left"></i>
                    Regresar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
    <div class="card-footer">
        @if($read_producto->stock_prod > 0)
        <div class="alert-info px-4 py-2 rounded mb-2">
            <div class="h4"><i class="fas fa-edit"></i> Cambiar stock del producto</div>
            <form action="{{route('productos_update_stock',$read_producto->cod_prod)}}" method="POST">
                @CSRF
                <div class="row">
                    <div class="col">
                        <div class="form-group col-md-6 col-sm-12 mx-auto">
                            <p><strong>Elija el motivo </strong></p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_trans" id="op1" value="Devolución venta">
                                <label class="form-check-label" for="op1">
                                    Devolución de productos vendidos. (Reingreso de productos)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_trans" id="op2" value="Devolución compra">
                                <label class="form-check-label" for="op2">
                                    Devolución de productos comprados. (Salida de productos)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_trans" id="op2" value="Deshecho" checked>
                                <label class="form-check-label" for="op2">
                                    Deshecho de productos. (Salida de productos)
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mx-auto">
                            <p><strong>Cantidad </strong></p>
                            <div class="input-group">
                                <input type="number" class="form-control @if($errors->has('edit_stock')) is-invalid @endif" placeholder="" name="edit_stock" value="{{old('edit_stock')}}" required min="1" max="{{$read_producto->stock_prod}}">
                                <div class="input-group-append">
                                    <span class="input-group-text text-xs" id="validatedInputGroupAppend">Unidades</span>
                                </div>
                                <button type="submit" class="btn btn-primary shadow-sm mx-2"> Modificar</button>
                                @if($errors->has('edit_stock'))
                                <div class="invalid-feedback">
                                    {{$errors->first('edit_stock')}}
                                </div>
                                @endif
                            </div>
                            <small class="form-text text-muted ml-2">
                                La cantidad no debe exceder al stock actual. <b>{{$read_producto->stock_prod}}</b>
                            </small>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endif
        @if($num_transaccciones->count() == 0)
        <div class="alert-danger px-4 py-2 rounded ">
            <div class="h4"><i class="fas fa-exclamation-triangle"></i> Precaución</div>
            <div class="row">
                <div class="col">
                    <p><strong>Condiciones para eliminar</strong></p>
                    <ul>
                        <li>No debe tener registro alguno en las transacciones como producciones, compras o ventas.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="button" class="btn btn-outline-danger shadow-sm" data-toggle="modal" data-target="#eliminarProducto"><i class="far fa-trash-alt"></i> Eliminar</button>
            </div>
        </div>
        @endif
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
                <form action="{{route('productos_delete',$read_producto)}}" method="POST">@CSRF
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection