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
                @if(session('add_producto'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Producto agregado!</strong> puedes editar su información <a
                        href="{{route('productosInfo',session('id_producto'))}}">aquí</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                
                @if(session('delete_producto'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Producto eliminado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-header bg-light">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div class="h4 mb-0 text-gray-800 text-center text-uppercase">Lista de productos</div>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ">
                <i class="fas fa-file-pdf"></i>
                Descargar PDF
            </a> -->
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover tr-hover-red border table-bordered table-striped" id="tablaProductos" width="100%"
                cellspacing="0">
                <thead class="text-gray-900 ">
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
                <tbody class="text-gray-900">
                    @foreach($list_productos as $item)
                    <tr class="@if($item->stock_prod < 150 )tr-danger @endif">
                        <td scope="row">1</td>
                        <td class=" @if($item->stock_prod < 150 )border-left-danger @else border-left-primary @endif">
                            {{$item->tipo_prod}}</td>
                        <td>{{$item->color_prod}}</td>
                        <td>{{$item->destino_prod}}</td>
                        <td>{{$item->tamano_prod}}</td>
                        <td>{{$item->stock_prod}}</td>
                        <td class="text-center w-75px">
                            <a href="{{route('productosInfo',$item)}}" class="text-secondary">
                                <i class="fas fa-edit"></i>
                                <span class="d-none d-sm-inline">Editar</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-block d-sm-none card-footer">
        <!-- <div class="container">
            <div class="col d-flex justify-content-center">
                <a href="#" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-file-pdf fa-sm text-white-50"></i>
                    Descargar PDF</a>
            </div>
        </div> -->
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
            <form action="{{route('productos_add')}}" method="POST" autocomplete="off">
                @CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Tipo</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('tipo_prod')) is-invalid @endif"
                                    placeholder="Ej: Clavel" name="tipo_prod" value="{{old('tipo_prod')}}" required>
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
                            <label>Color</label>
                            <select class="custom-select mr-sm-2 @if($errors->has('color_prod')) is-invalid @endif"
                                name="color_prod">
                                <option selected>Seleccionar</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Color">Color (Otros)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Destino</label>
                            <select class="custom-select mr-sm-2 @if($errors->has('destino_prod')) is-invalid @endif"
                                name="destino_prod">
                                <option selected>Seleccionar</option>
                                <option value="Nacional">Nacional</option>
                                <option value="Extranjero">Extranjero</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Tamaño</label>
                            <select class="custom-select mr-sm-2 @if($errors->has('tamano_prod')) is-invalid @endif"
                                name="tamano_prod">
                                <option selected>Seleccionar</option>
                                <option value="Fancy">Fancy (Largo)</option>
                                <option value="Selecta">Selecta (Corto)</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="">Stock</label>
                            <div class="input-group">
                                <input type="number" min="0"
                                    class="form-control @if($errors->has('stock_prod')) is-invalid @endif"
                                    placeholder="Ej: 500" name="stock_prod" value="{{old('stock_prod')}}" required>
                                <div class="input-group-append" title="Unidades">
                                    <div class="input-group-text text-xs">Unidades</div>
                                </div>
                                @if($errors->has('stock_prod'))
                                <div class="invalid-feedback">
                                    {{$errors->first('stock_prod')}}
                                </div>
                                @endif
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
@if($errors->any())
<script>
$(document).ready(function() {
    $('#nuevoProducto').modal('show');
});
</script>
@endif
@endsection