@extends('plantillaDashboard')
@section('name-page')
Tu perfil
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('usuarios')}}">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Perfil del usuario</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Perfil del usuario</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                <img src="{{asset('resources/img/undraw_pie_graph_x9dy.svg')}}" alt="" class="img-thumbnail border-0"
                    style="width: 400px;">
            </div>
            <div class="col-lg-6 text-gray-900 mb-3">
                <div class="my-2">
                    <span class=""><i class="fas fa-id-card text-gray-500"></i> </span><span
                        class="font-weight-bold ">{{$read_user->ci_usu}}</span>

                </div>
                <hr>
                <div class="my-2 text-capitalize">
                    <span class="h2">{{$read_user->nombre_usu}}</span>
                    <span class="h2">{{$read_user->apellido_usu}}</span>
                </div>
                <hr>
                <div class="my-2">
                    @if($read_user->direccion_usu)
                    <div class="mb-3">
                        <span class=""><i class="fas fa-map-marker-alt text-gray-500"></i> </span>
                        <span>{{$read_user->direccion_usu}}</span>
                    </div>
                    @endif
                    @if($read_user->correo_usu)
                    <div class="mb-3">
                        <span class=""><i class="fas fa-envelope text-gray-500"></i>
                        </span><span>{{$read_user->correo_usu}}</span>
                    </div>
                    @endif
                    <div class="mb-3">
                        <span class=""><i class="fas fa-key text-gray-500"></i>
                        </span><a type="button" class="" data-toggle="modal" data-target="#cambiarPass">Cambiar
                            contraseña</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="h3 text-center text-gray-800 mb-4"><i class="fa fa-cog"></i> Opciones</div>
                <div class="row">
                    <div class="col-lg-12 text-success">
                        @if($read_user->cargo_usu == 'Administrador')
                        <span class="badge badge-primary text-lg mr-4">Administrador</span>
                        @else
                        <span class="badge badge-warning text-lg mr-4 px-4">Empleado</span>
                        @endif
                        <a type="button" class="" data-toggle="modal" data-target="#editarUsuario"><i
                                class="far fa-edit"></i> Editar</a>
                    </div>
                    @if($read_user->celular_usu)
                    <div class="col-lg-12">
                        <a href="https://api.whatsapp.com/send?phone=+593{{$read_user->celular_usu}}&text="
                            target="_blank" class="btn bg-success text-white" style="font-size: 1.5rem;"><i
                                class="fab fa-whatsapp"></i> 0{{$read_user->celular_usu}}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if(session('update_pass'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Contraseña actualizada!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        @if(session('update_user'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Datos actualizados!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <hr>
        <div class="row px-4 py-2">
            <div class="container p-0 text-center">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="h4 text-gray-600 text-uppercase"><i class="fas fa-history"></i> Historial</div>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-danget shadow-sm ">
                        <i class="fas fa-file-pdf"></i>
                        Descargar PDF
                    </a> -->
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-light table-bordered table-striped table-hover" id="tablaHistorial"
                    width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">Date</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($historial as $item)
                        <tr class="text-capitalize">
                            <td scope="row">{{$item->cod_trans}}</td>
                            <td scope="row">{{$item->created_at}}</td>
                            <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY HH:mm a')}}
                            </td>
                            <td>{{$item->tipo_trans}}</td>
                            <td class="text-center w-75px">
                                @if($item->tipo_trans == 'produccion')
                                <a target="_blank" href="{{route('produccionInfo',$item)}}" class="text-secondary">
                                    <i class="fas fa-eye"></i>
                                    <span class="d-none d-sm-inline">Ver</span>
                                </a>
                                @elseif($item->tipo_trans == 'compra')
                                <a target="_blank" href="{{route('compraInfo',$item)}}" class="text-secondary">
                                    <i class="fas fa-eye"></i>
                                    <span class="d-none d-sm-inline">Ver</span>
                                </a>
                                @elseif($item->tipo_trans == 'venta')
                                <a target="_blank" href="{{route('ventaInfo',$item)}}" class="text-secondary">
                                    <i class="fas fa-eye"></i>
                                    <span class="d-none d-sm-inline">Ver</span>
                                </a>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="alert-danger px-4 py-2 rounded ">
            <div class="h4"><i class="fas fa-exclamation-triangle"></i> Precaución</div>
            @if($historial->count() == 0)
            <div class="container m-0 p-0">
                <div class="row">
                    <div class="col">
                        <p><strong>Condiciones para eliminar</strong></p>
                        <ul>
                            <li>No debe tener registro alguno en las transacciones como producciones, compras o ventas.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="row justify-content-end">
                <div class="">
                    @if($read_user->estado_usu == true)
                    <form action="{{route('usuario_quitar_acceso',$read_user->cod_usu)}}" method="POST"> @CSRF
                        <button type="submit" class="btn btn-danger mx-3">
                            Remover acceso
                        </button>
                    </form>
                    @else
                    <form action="{{route('usuario_dar_acceso',$read_user->cod_usu)}}" method="POST"> @CSRF
                        <button type="submit" class="btn btn-primary mx-3">
                            Permitir acceso
                        </button>
                    </form>
                    @endif
                </div>
                @if($historial->count() == 0)
                <button type="button" class="btn btn-outline-danger shadow-sm" data-toggle="modal"
                    data-target="#eliminarUsuario"><i class="far fa-trash-alt"></i> Eliminar</button>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col my-4">
                <a href="{{route('usuarios')}}" class="text-gray-600 text-lg"><i class="fa fa-angle-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal Editar -->
<div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar información del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('usuarios_update',$read_user->cod_usu)}}" method="POST" autocomplete="off">@CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">CI/ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->get('ci_usu'))is-invalid @endif"
                                    placeholder="Ej: 1705XXXXXX" name="ci_usu"
                                    value="@if($errors->has('ci_usu')){{old('ci_usu')}}@else{{$read_user->ci_usu}}@endif">
                                @if($errors->get('ci_usu'))
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
                                    class="form-control @if($errors->get('celular_usu'))is-invalid @endif"
                                    placeholder="Ej: 0987XXXXXX" name="celular_usu"
                                    value="@if($errors->has('celular_usu')){{old('celular_usu')}}@else{{$read_user->celular_usu}}@endif"
                                    maxlength="9">
                                @if($errors->get('celular_usu'))
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
                                <input type="text"
                                    class="form-control @if($errors->get('apellido_usu'))is-invalid @endif"
                                    placeholder="Ej: Lee" name="apellido_usu"
                                    value="@if($errors->has('apellido_usu')){{old('apellido_usu')}}@else{{$read_user->apellido_usu}}@endif">
                                @if($errors->get('apellido_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('apellido_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->get('nombre_usu'))is-invalid @endif"
                                    placeholder="Ej: Steve" name="nombre_usu"
                                    value="@if($errors->has('nombre_usu')){{old('nombre_usu')}}@else{{$read_user->nombre_usu}}@endif">
                                @if($errors->get('nombre_usu'))
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
                            <select name="cargo_usu" id="" class="form-control">
                                <option value="Administrador" @if($read_user->cargo_usu == 'Administrador')selected
                                    @endif>Administrador</option>
                                <option value="Empleado" @if($read_user->cargo_usu == 'Empleado')selected @endif
                                    >Empleado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Dirección</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @if($errors->get('direccion_usu'))is-invalid @endif"
                                    placeholder="Ej: Av.Principal y 10 de Agosto" name="direccion_usu"
                                    value="@if($errors->has('direccion_usu')){{old('direccion_usu')}}@else{{$read_user->direccion_usu}}@endif">
                                @if($errors->get('direccion_usu'))
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
                                <input type="email"
                                    class="form-control @if($errors->get('correo_usu'))is-invalid @endif"
                                    placeholder="Ej: correo@gmail.com" name="correo_usu"
                                    value="@if($errors->has('correo_usu')){{old('correo_usu')}}@else{{$read_user->correo_usu}}@endif">
                                @if($errors->get('correo_usu'))
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
<!-- Modal Editar Contraseña -->
<div class="modal fade" id="cambiarPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('usuarios_editar_clave',$read_user->cod_usu)}}" method="POST">@CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Nueva contraseña</label>
                            <div class="input-group">
                                <input type="password"
                                    class="form-control @if($errors->get('clave_act_usu'))is-invalid @endif"
                                    placeholder="***********" name="clave_act_usu" value="{{old('clave_act_usu')}}">
                                <small id="passwordHelpBlock1" class="form-text text-muted col-12">
                                    La contraseña debe constar de al menos 8 caracteres.
                                </small>
                                @if($errors->get('clave_act_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('clave_act_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Repita contraseña</label>
                            <div class="input-group">
                                <input type="password"
                                    class="form-control @if($errors->get('clave_rep_usu'))is-invalid @endif"
                                    placeholder="***********" name="clave_rep_usu" value="{{old('clave_rep_usu')}}">
                                @if($errors->get('clave_rep_usu'))
                                <div class="invalid-feedback">
                                    {{$errors->first('clave_rep_usu')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Eliminar -->
<div class="modal fade" id="eliminarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de eliminar este usuario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{route('usuarios_eliminar',$read_user->cod_usu)}}" method="POST">
                    @CSRF
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@if($errors->has('clave_ant_usu') OR $errors->has('clave_act_usu') OR $errors->has('clave_rep_usu') )
<script>
$(document).ready(function() {
    $('#cambiarPass').modal('show');
});
</script>
@endif
@if($errors->has('ci_usu') OR $errors->has('apellido_usu') OR $errors->has('nombre_usu') OR $errors->has('celular_usu')
OR
$errors->has('direccion_usu') OR $errors->has('correo_usu'))
<script>
$(document).ready(function() {
    $('#editarUsuario').modal('show');
});
</script>
@endif
@endsection