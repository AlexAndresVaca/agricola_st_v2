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
                @if(session('add_user') == true)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Usuario agregado!</strong> puedes <ins>ver</ins> o <ins>editar</ins> su información <a
                        href="{{route('usuariosInfo',session('id_user'))}}">aquí</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('delete_user') == true)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Usuario eliminado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
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
            <table class="table table-hover tr-hover-red border table-bordered table-striped" id="tablaUsuarios" width="100%"
                cellspacing="0">
                <thead class="text-gray-900">
                    <tr>
                        <th scope="col">CI / ID</th>
                        <th scope="col">Apellido y Nombre</th>
                        <th scope="col">Cargo</th>
                        <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    @foreach($list_usuarios as $item)
                    <tr class="@if($item->estado_usu == false) tr-danger @endif">
                        <td scope="row"
                            class="@if($item->estado_usu == false)border-left-danger @else border-left-success @endif">
                            {{$item->ci_usu}}</td>
                        <td class="text-capitalize">{{$item->apellido_usu}} {{$item->nombre_usu}}</td>
                        <td>
                            @if($item->cargo_usu == 'Administrador')
                            <span class="badge badge-primary">Administrador</span>
                            @else
                            <span class="badge badge-warning px-3">Empleado</span>
                            @endif
                        </td>
                        <td class="text-center w-75px">
                            <a href="{{route('usuariosInfo',$item->cod_usu)}}" class="text-secondary">
                                <i class="fas fa-eye"></i>
                                <span class="d-none d-sm-inline">Ver perfil</span>
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
<div class="modal fade" hidden id="nuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('usuarios_add')}}" method="POST" autocomplete="off">@CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">CI/ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->get('ci_usu')) is-invalid @endif"
                                    placeholder="Ej: 1705XXXXXX" name="ci_usu" value="{{old('ci_usu')}}" maxlength="10"
                                    required>
                                @if($errors->has('ci_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ci_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+593</div>
                                </div>
                                <input type="text"
                                    class="form-control @if($errors->get('celular_usu')) is-invalid @endif"
                                    placeholder="Ej: 0987XXXXXX" name="celular_usu" value="{{old('celular_usu')}}" maxlength="9">
                                @if($errors->has('celular_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('celular_usu')}}
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Apellido</label>
                            <div class="input-group">
                                <input type="text" maxlength="50" required
                                    class="form-control @if($errors->get('apellido_usu')) is-invalid @endif"
                                    placeholder="Ej: Lee" name="apellido_usu" value="{{old('apellido_usu')}}">
                                @if($errors->has('apellido_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('apellido_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <input type="text" maxlength="50" required
                                    class="form-control @if($errors->get('nombre_usu')) is-invalid @endif"
                                    placeholder="Ej: Steve" name="nombre_usu" value="{{old('nombre_usu')}}">
                                @if($errors->has('nombre_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nombre_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Tipo</label>
                            <select class="form-control" name="cargo_usu">
                                <option value="Administrador">Administrador</option>
                                <option value="Empleado" selected>Empleado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Contraseña</label>
                            <div class="input-group">
                                <input type="password" minlength="8" required
                                    class="form-control @if($errors->get('clave_usu')) is-invalid @endif"
                                    placeholder="*******************" name="clave_usu">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    La contraseña debe constar de al menos 8 caracteres.
                                </small>
                                @if($errors->has('clave_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('clave_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Repita contraseña</label>
                            <div class="input-group">
                                <input type="password" minlength="8" required
                                    class="form-control @if($errors->get('clave_usu_rep')) is-invalid @endif"
                                    placeholder="*******************" name="clave_usu_rep">
                                @if($errors->has('clave_usu_rep'))
                                <div class="invalid-feedback">
                                    {{$errors->first('clave_usu_rep')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Dirección</label>
                            <div class="input-group">
                                <input type="text" maxlength="150"
                                    class="form-control @if($errors->get('direccion_usu')) is-invalid @endif"
                                    placeholder="Ej: Av.Principal y 10 de Agosto" name="direccion_usu"
                                    value="{{old('direccion_usu')}}">
                                @if($errors->has('direccion_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('direccion_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Correo electronico</label>
                            <div class="input-group">
                                <input type="email" maxlength="60" required
                                    class="form-control @if($errors->get('correo_usu')) is-invalid @endif"
                                    placeholder="Ej: correo@gmail.com" name="correo_usu" value="{{old('correo_usu')}}">
                                @if($errors->has('correo_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('correo_usu')}}
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
@section('js')
<script>
$(document).ready(function() {
    $("#nuevoUsuario").removeAttr("hidden");
});
</script>
@if($errors->any())
<script>
$(document).ready(function() {
    $('#nuevoUsuario').modal('show');
});
</script>
@endif
@endsection