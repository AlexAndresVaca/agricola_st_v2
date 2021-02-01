@extends('plantillaDashboard')
@section('name-page')
Perfil del {{$read_neg->tipo_neg}}
@endsection
@if($read_neg->tipo_neg == 'Proveedor')
@section('proveedor-item')
active
@endsection
@else
@section('cliente-item')
active
@endsection
@endif
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('negociantes',['negociantes' => strtolower($read_neg->tipo_neg)])}}">@if($read_neg->tipo_neg == 'Proveedor') Proveedores @else Clientes @endif</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Información</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Perfil del {{$read_neg->tipo_neg}}</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                <img src="{{asset('resources/img/undraw_businessman_97x4.svg')}}" alt="" class="img-thumbnail border-0" style="width: 400px;">
            </div>
            <div class="col-lg-6 text-gray-900 mb-3">
                <div class="my-2">
                    <span class=""><i class="fas fa-id-card text-gray-500"></i> </span><span class="font-weight-bold ">{{$read_neg->ci_neg}}</span>

                </div>
                <hr>
                <div class="my-2">
                    <span class="h2 text-capitalize">{{$read_neg->nombre_neg}} {{$read_neg->apellido_neg}}</span>
                    <span class="mx-2">
                        <a type="button" class="" data-toggle="modal" data-target="#editarNegociante"><i class="far fa-edit"></i> Editar</a>
                    </span>
                </div>
                <hr>
                <div class="my-2">
                    @if($read_neg->direccion_neg)
                    <div class="mb-3">
                        <span class=""><i class="fas fa-map-marker-alt text-gray-500"></i> </span>
                        <span class="text-capitalize">{{$read_neg->direccion_neg}}</span>
                    </div>
                    @endif
                    @if($read_neg->correo_neg)
                    <div class="mb-3">
                        <span class=""><i class="fas fa-envelope text-gray-500"></i>
                        </span><span>{{$read_neg->correo_neg}}</span>
                    </div>
                    @endif
                    <!-- <div class="mb-3">
                        <span class=""><i class="fas fa-user-alt text-gray-500"></i> </span>
                        <span class="text-capitalize">{{$read_neg->tipo_neg}}</span>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="h3 text-center text-gray-800">Actividad</div>
                <div class="row">
                    @if($read_neg->tipo_neg == 'Proveedor')
                    <div class="col text-success">
                        <div class="h5">Ventas realizadas:</div>
                        <div class="h2">{{$num_compras->count()}}</div>
                    </div>
                    @else
                    <div class="col text-primary">
                        <div class="h5">Compras realizadas:</div>
                        <div class="h2">{{$num_ventas->count()}}</div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12 my-3">
                        @if($read_neg->celular_neg)
                        <a href="https://api.whatsapp.com/send?phone=+593{{$read_neg->celular_neg}}&text=" class="btn bg-success text-white" style="font-size: 1.5rem;"><i class="fab fa-whatsapp"></i>
                            0{{$read_neg->celular_neg}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                @if(session('update_negociante'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Registro actualizado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>No puedes eliminar este usuario!</strong> Actualmente las producciones se les atribuyen a
                    esta persona.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
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
                <table class="table table-light table-bordered table-striped table-hover" id="tablaHistorial" width="100%" cellspacing="0">
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
        @if($historial->count() == 0 )
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
                <button type="button" class="btn btn-outline-danger shadow-sm" data-toggle="modal" data-target="#eliminarNegociante"><i class="far fa-trash-alt"></i> Eliminar</button>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col my-4">
                <a href="{{route('negociantes',['negociantes' => strtolower($read_neg->tipo_neg)])}}" class="text-gray-600 text-lg"><i class="fa fa-angle-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal Editar -->
<div class="modal fade" id="editarNegociante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('negociantes_update',$read_neg)}}" method="POST" autocomplete="off"> @CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">CI/ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('ci_neg'))is-invalid @endif" placeholder="Ej: 1705XXXXXX" name="ci_neg" value="@if($errors->has('ci_neg')){{old('ci_neg')}}@else{{$read_neg->ci_neg}}@endif" minlength="10" maxlength="13" required>
                                @if($errors->has('ci_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ci_neg')}}
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
                                <input type="text" class="form-control @if($errors->has('celular_neg'))is-invalid @endif" placeholder="Ej: 0987XXXXXX" name="celular_neg" value="@if($errors->has('celular_neg')){{old('celular_neg')}}@else{{$read_neg->celular_neg}}@endif" minlength="9" maxlength="9">
                                @if($errors->has('celular_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('celular_neg')}}
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Apellido</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('apellido_neg'))is-invalid @endif" placeholder="Ej: Lee" name="apellido_neg" value="@if($errors->has('apellido_neg')){{old('apellido_neg')}}@else{{$read_neg->apellido_neg}}@endif" maxlength="50" required>
                                @if($errors->has('apellido_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('apellido_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('nombre_neg'))is-invalid @endif" placeholder="Ej: Steve" name="nombre_neg" value="@if($errors->has('nombre_neg')){{old('nombre_neg')}}@else{{$read_neg->nombre_neg}}@endif" maxlength="50" required>
                                @if($errors->has('nombre_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nombre_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Dirección</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('direccion_neg'))is-invalid @endif" placeholder="Ej: Av.Principal y 10 de Agosto" name="direccion_neg" value="@if($errors->has('direccion_neg')){{old('direccion_neg')}}@else{{$read_neg->direccion_neg}}@endif" maxlength="150">
                                @if($errors->has('direccion_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('direccion_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Correo electronico</label>
                            <div class="input-group">
                                <input type="email" class="form-control @if($errors->has('correo_neg'))is-invalid @endif" placeholder="Ej: correo@gmail.com" name="correo_neg" value="@if($errors->has('correo_neg')){{old('correo_neg')}}@else{{$read_neg->correo_neg}}@endif" maxlength="60" required>
                                @if($errors->has('correo_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('correo_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col d-none">
                            <label for="">Tipo</label>
                            <div class="input-group">
                                <select class="form-control @if($errors->has('tipo_neg'))is-invalid @endif" name="tipo_neg" required>
                                    <option value="Proveedor" @if($read_neg->tipo_neg == 'Proveedor') selected @elseif(old('tipo_neg')=='Proveedor' ) selected @endif)>Proveedor</option>
                                    <option value="Cliente" @if($read_neg->tipo_neg == 'Cliente') selected @elseif(old('tipo_neg')=='Cliente' ) selected @endif)>Cliente</option>
                                </select>
                                @if($errors->has('tipo_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('tipo_neg')}}
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
<!-- Modal Eliminar -->
<div class="modal fade" id="eliminarNegociante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{route('negociantes_delete',$read_neg)}}" method="POST">
                    @CSRF
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@if($errors->any())
<script>
    $(document).ready(function() {
        $('#editarNegociante').modal('show');
    });
</script>
@endif
@endsection