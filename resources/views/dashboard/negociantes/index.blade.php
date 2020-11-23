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
<div class="card shadow">
    <div class="row justify-content-center my-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoNegociante">
            <i class="fa fa-plus-circle"></i>
            Nuevo negociante
        </button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Negociante agregado!</strong> puedes editar su información <a
                        href="{{route('negociantesInfo')}}">aquí</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Negociante actualizado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Negociante eliminado!</strong>
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
                <h1 class="h3 mb-0 text-gray-800 text-center">Lista de negociantes</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ">
                    <i class="fas fa-file-pdf"></i>
                    Descargar PDF
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light table-bordered table-striped table-hover" id="tablaNegociantes" width="100%"
                cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">CI / ID</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Contacto</th>
                        <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr>
                        <td scope="row">1712957396</td>
                        <td>Vaca</td>
                        <td>Alex</td>
                        <td>0999999999</td>
                        <td class="text-center w-75px">
                            <a href="{{route('negociantesInfo')}}" class="text-secondary">
                                <i class="fas fa-eye"></i>
                                <span class="d-none d-sm-inline">Ver perfil</span>
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
<div class="modal fade" id="nuevoNegociante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection