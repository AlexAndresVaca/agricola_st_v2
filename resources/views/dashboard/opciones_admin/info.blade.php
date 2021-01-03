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
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="h3 text-center text-gray-800 mb-4"><i class="fa fa-info-circle"></i> Información</div>
                <div class="row">
                    <div class="col-lg-12 text-success">
                        @if($read_user->cargo_usu == 'Administrador')
                        <span class="badge badge-primary text-lg mr-4">Administrador</span>
                        @else
                        <span class="badge badge badge-warning text-lg mr-4 px-4">Empleado</span>
                        @endif
                        <hr>
                    </div>
                    @if($read_user->celular_usu)
                    <div class="col-lg-12">
                        <a href="https://api.whatsapp.com/send?phone=+593{{$read_user->celular_usu}}&text=" class="btn bg-success text-white" style="font-size: 1.5rem;"><i
                                class="fab fa-whatsapp"></i> 0{{$read_user->celular_usu}}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
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
                                <a href="" class="text-secondary">
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
@endsection