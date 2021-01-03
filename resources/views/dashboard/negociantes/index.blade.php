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
                @if(session('add_negociante'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Negociante agregado!</strong> puedes editar su información <a
                        href="{{route('negociantesInfo',session('id_neg'))}}">aquí</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('delete_negociante'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Negociante eliminado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-header">
        <div class="container mb-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <div class="h4 mb-0 text-gray-800">Lista de negociantes</div>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ">
                    <i class="fas fa-file-pdf"></i>
                    Descargar PDF
                </a> -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover tr-hover-red border table-bordered table-striped" id="tablaNegociantes" width="100%"
                cellspacing="0">
                <thead class="text-gray-900">
                    <tr>
                        <th scope="col">CI / ID</th>
                        <th scope="col">Apellido y Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    @foreach($list_negociantes as $item)
                    <tr>
                        <td scope="row">{{$item->ci_neg}}</td>
                        <td class="text-capitalize">{{$item->apellido_neg}} {{$item->nombre_neg}}</td>
                        <td>{{$item->correo_neg}}</td>
                        <td class="text-center w-75px">
                            <a href="{{route('negociantesInfo',$item)}}" class="text-secondary">
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
            <form action="{{route('negociantes_add')}}" method="POST" autocomplete="off"> @CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">CI/ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('ci_neg'))is-invalid @endif"
                                    placeholder="Ej: 1705XXXXXX" name="ci_neg" value="{{old('ci_neg')}}" minlength="10"
                                    maxlength="13" required>
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
                                <input type="text"
                                    class="form-control @if($errors->has('celular_neg'))is-invalid @endif"
                                    placeholder="Ej: 0987XXXXXX" name="celular_neg" value="{{old('celular_neg')}}"
                                    minlength="9" maxlength="9">
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
                                <input type="text"
                                    class="form-control @if($errors->has('apellido_neg'))is-invalid @endif"
                                    placeholder="Ej: Lee" name="apellido_neg" value="{{old('apellido_neg')}}"
                                    maxlength="50" required>
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
                                <input type="text" class="form-control @if($errors->has('nombre_neg'))is-invalid @endif"
                                    placeholder="Ej: Steve" name="nombre_neg" value="{{old('nombre_neg')}}"
                                    maxlength="50" required>
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
                                <input type="text"
                                    class="form-control @if($errors->has('direccion_neg'))is-invalid @endif"
                                    placeholder="Ej: Av.Principal y 10 de Agosto" name="direccion_neg"
                                    value="{{old('direccion_neg')}}" maxlength="150">
                                @if($errors->has(''))
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
                                <input type="email"
                                    class="form-control @if($errors->has('correo_neg'))is-invalid @endif"
                                    placeholder="Ej: correo@gmail.com" name="correo_neg" value="{{old('correo_neg')}}"
                                    maxlength="60" required>
                                @if($errors->has('correo_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('correo_neg')}}
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
    $('#nuevoNegociante').modal('show');
});
</script>
@endif
@endsection