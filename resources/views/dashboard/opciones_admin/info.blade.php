@extends('plantillaDashboard')
@section('name-page')
Tu perfil
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tu perfil</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Tu perfil</h1>
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
                        class="font-weight-bold ">1727676676</span>

                </div>
                <hr>
                <div class="my-2">
                    <span class="h2">Alex</span>
                    <span class="h2">Vaca</span>
                </div>
                <hr>
                <div class="my-2">
                    <div class="mb-3">
                        <span class=""><i class="fas fa-map-marker-alt text-gray-500"></i> </span><span>Cayambe, Av. 10
                            de agosto y Juan montalvo</span>
                    </div>
                    <div class="mb-3">
                        <span class=""><i class="fas fa-envelope text-gray-500"></i>
                        </span><span>alex80ghero@gmail.com</span>
                    </div>
                    <div class="">
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
                        <span class="badge badge-primary text-lg mr-4">Administrador</span>
                        <a type="button" class="" data-toggle="modal" data-target="#editarUsuario"><i
                                class="far fa-edit"></i> Editar</a>
                        <hr>
                    </div>
                    <!-- <div class="col-lg-12">
                        <span class="badge badge-warning text-lg px-4 d-block">Empleado</span>
                        <span class="text-xs"><span class="font-weight-bolder">Deseas actualizar información?</span>
                        Comunicate con un administrador.</span>
                        <hr>
                    </div> -->
                    <div class="col-lg-12">
                        <a href="" class="btn bg-success text-white" style="font-size: 1.5rem;"><i
                                class="fab fa-whatsapp"></i> 0987654321</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row px-4 py-2">
            <div class="container p-0 text-center">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="h4 text-gray-600 text-uppercase"><i class="fas fa-history"></i> Historial</div>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ">
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
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            <td scope="row">1712957396</td>
                            <td>Sab. 15 de noviembre del 2020</td>
                            <td>Compra</td>
                            <td class="text-center w-75px">
                                <a href="{{route('negociantesInfo')}}" class="text-secondary">
                                    <i class="fas fa-eye"></i>
                                    <span class="d-none d-sm-inline">Ver</span>
                                </a>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
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
<div class="modal fade" id="cambiarPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Contraseña actual</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="***********">
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
                            <label for="">Nueva contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="***********">
                                <small id="passwordHelpBlock1" class="form-text text-muted col-12">
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Repita contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="***********">
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
                    <button type="button" class="btn btn-primary">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection