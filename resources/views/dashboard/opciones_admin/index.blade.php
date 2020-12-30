@extends('plantillaDashboard')
@section('name-page')
Gestión de Usuarios
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="row justify-content-center my-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoUsuario">
            <i class="fa fa-plus-circle"></i>
            Nuevo usuario
        </button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Usuario agregado!</strong> puedes <ins>ver</ins> o <ins>editar</ins> su información <a
                        href="{{route('usuariosInfo')}}">aquí</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Usuario actualizado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Usuario eliminado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <div class="container mb-0 p-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <div class="h4 mb-0 text-gray-800 text-uppercase">Lista de usuarios</div>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ">
                    <i class="fas fa-file-pdf"></i>
                    Descargar PDF
                </a> -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover tr-hover-red border table-bordered" id="tablaUsuarios" width="100%"
                cellspacing="0">
                <thead class="text-gray-900">
                    <tr>
                        <th scope="col">CI / ID</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cargo</th>
                        <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    <tr class="alert-danger">
                        <td scope="row" class="border-left-danger">1712957396</td>
                        <td>Vaca</td>
                        <td>Alex</td>
                        <td><span class="badge badge-primary">Administrador</span></td>
                        <!-- <td><span class="badge badge-warning">Empleado</span></td> -->
                        <td class="text-center w-75px">
                            <a href="{{route('usuariosInfo')}}" class="text-secondary">
                                <i class="fas fa-eye"></i>
                                <span class="d-none d-sm-inline">Ver perfil</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="border-left-success">1712957396</td>
                        <td>Vaca</td>
                        <td>Alex</td>
                        <td><span class="badge badge-primary">Administrador</span></td>
                        <!-- <td><span class="badge badge-warning">Empleado</span></td> -->
                        <td class="text-center w-75px">
                            <a href="{{route('usuariosInfo')}}" class="text-secondary">
                                <i class="fas fa-eye"></i>
                                <span class="d-none d-sm-inline">Ver perfil</span>
                            </a>
                        </td>
                    </tr>
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
<div class="modal fade" id="nuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
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
                            <label for="">Tipo</label>
                            <select name="" id="" class="form-control">
                                <option value="">Administrador</option>
                                <option value="">Empleado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="*******************">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    La contraseña debe constar de al menos 8 caracteres.
                                </small>
                                <div class="invalid-feedback">
                                    Mensaje error
                                </div>
                                <div class="valid-feedback">
                                    Mensaje confirmación
                                </div>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Repita contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="*******************">
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