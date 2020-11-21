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
    <div class="dropdown-divider my-1"></div>
    <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-5 col-sm-6" >
            <div class="text-center h3 text-gray-800">Lista de productos</div>
          </div>
          <div class="col-md-2  col-sm-6 justify-self-end">
            <a href="" class=""><button class="btn btn-danger btn-block"><i class="fas fa-file-pdf"></i> Descargar PDF</button></a>
          </div>
        </div>
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
                        <td><a href="">Editar</a></td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Rosa</td>
                        <td>Rojo</td>
                        <td>Extranjero</td>
                        <td>Largo</td>
                        <td>15000</td>
                        <td><a href="">Editar</a></td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Rosa</td>
                        <td>Rojo</td>
                        <td>Extranjero</td>
                        <td>Largo</td>
                        <td>15000</td>
                        <td><a href="">Editar</a></td>
                    </tr>
                    <tr>
                        <td scope="row">5</td>
                        <td>Rosa</td>
                        <td>Rojo</td>
                        <td>Extranjero</td>
                        <td>Largo</td>
                        <td>15000</td>
                        <td><a href="">Editar</a></td>
                    </tr>
                    <tr>
                        <td scope="row">6</td>
                        <td>Rosa</td>
                        <td>Rojo</td>
                        <td>Extranjero</td>
                        <td>Largo</td>
                        <td>15000</td>
                        <td><a href="">Editar</a></td>
                    </tr>
                    <tr>
                        <td scope="row">7</td>
                        <td>Rosa</td>
                        <td>Rojo</td>
                        <td>Extranjero</td>
                        <td>Largo</td>
                        <td>15000</td>
                        <td><a href="">Editar</a></td>
                    </tr>
                    <tr>
                        <td scope="row">8</td>
                        <td>Rosa</td>
                        <td>Rojo</td>
                        <td>Extranjero</td>
                        <td>Largo</td>
                        <td>15000</td>
                        <td><a href="">Editar</a></td>
                    </tr>
                </tbody>
            </table>
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