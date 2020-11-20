@extends('plantillaDashboard')
@section('name-page')
Negociantes
@endsection
@section('dealer-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Negociantes</li>
    </ol>
</nav>
@endsection
@section('body')
<!--<h1 class="h3 mb-4 text-gray-800">Negociantes</h1>-->
<div class="row justify-content-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus-circle"></i>
        Nuevo negociante
    </button>
</div>
@endsection
@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo negociante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
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
                        <div class="col">
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
                        <div class="col">
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
                        <div class="col">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Ej: Steve">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
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
                        <div class="col">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection