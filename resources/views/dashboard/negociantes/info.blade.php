@extends('plantillaDashboard')
@section('name-page')
Perfil del negociante
@endsection
@section('dealer-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('negociantes')}}">Negociantes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Perfil del negociante</h1>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="">CI/ID</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Ej: 1705XXXXXX">
                            <div class="invalid-feedback">
                                Mensaje error
                            </div>
                            <div class="valid-feedback">
                                Mensaje confirmación
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="">Telefono</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Ej: 0987XXXXXX">
                            <div class="invalid-feedback">
                                Mensaje error
                            </div>
                            <div class="valid-feedback">
                                Mensaje confirmación
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="">Apellido</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ej: Lee">
                            <div class="invalid-feedback">
                                Mensaje error
                            </div>
                            <div class="valid-feedback">
                                Mensaje confirmación
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="">Nombre</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ej: Steve">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="">Dirección</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ej: Av.Principal y 10 de Agosto">
                            <div class="invalid-feedback">
                                Mensaje error
                            </div>
                            <div class="valid-feedback">
                                Mensaje confirmación
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="">Correo electronico</label>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Ej: correo@gmail.com">
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
                <a href="{{route('negociantes')}}" class="text-gray-600 text-dm"><i class="fa fa-angle-left"></i>
                    Regresar</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar negociante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de eliminar este negociante?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@endsection