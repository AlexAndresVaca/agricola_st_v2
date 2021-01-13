@extends('plantillaDashboard')
@section('name-page')
Producción
@endsection
@section('production-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Producción</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="row justify-content-center my-5">
        @if($estado == 'realizado')
        <a class="btn btn-outline-danger disabled">
            La producción de hoy ya fue cerrada!
        </a>
        @endif
        @if($produccion_exists_hoy == false)
        <form action="{{route('produccion_add')}}" method="POST">
            @CSRF
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Nueva producción
            </button>
        </form>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                @if($produccion_exists_hoy == true AND $estado == 'en curso')
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Produccion del dia de hoy</strong> puedes gestionar sus productos <a
                        href="{{route('produccionInfo',$id_exists_hoy)}}">aquí</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('delete_produccion'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Producción cancelada!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('update_produccion'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Producción cerrada!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="card-header">
        <div class="container mb-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800 text-center">Lista de producción</h1>
                <button type="button" class="d-none d-sm-inline-block btn btn-secondary btn-sm shadow-sm"
                    data-toggle="modal" data-target="#info">
                    <i class="fas fa-info-circle"></i>
                    Filtrado de datos
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light table-bordered table-striped table-hover mx-auto" id="tablaProduccion"
                width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach($list_producciones as $item)
                    <tr class="text-capitalize" title="{{ucfirst( $item->created_at->diffForHumans()) }}">
                        <td scope="row">{{$item->cod_trans}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            {{\Carbon\Carbon::parse($item->created_at)->isoFormat('ddd D \d\e MMMM \d\e\l YYYY')}}
                        </td>
                        <td>{{$item->tipo_trans}}</td>
                        <td class="text-center">
                            @if($item->estado_trans == 'en curso')
                            <i class="fas fa-spinner fa-spin text-primary"></i>
                            @elseif($item->estado_trans == 'realizado')
                            <i class="fas fa-clipboard-check text-success"></i>
                            @endif
                            <span class="ml-1 d-none d-md-inline text-capitalize">{{$item->estado_trans}}</span>
                        </td>
                        <td class="text-center w-75px">
                            <a href="{{route('produccionInfo',$item)}}" class="text-secondary">
                                <i class="fas fa-eye"></i>
                                <span class="d-none d-sm-inline">Ver</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-center d-block d-sm-none">
        <button type="button" class="btn btn-secondary shadow-sm" data-toggle="modal" data-target="#info">
            <i class="fas fa-info-circle"></i>
            Filtrado de datos
        </button>
    </div>
</div>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Como filtrar datos en el buscador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="h5">Por dia:</div>
                            <p>Si desea utilizar el buscador para una fecha determinada puede hacerlo de las siguientes
                                maneras:</p>
                            <ul>
                                <li><strong>25 de diciembre del 2020</strong></li>
                                <li><strong>2020-12-25</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="h5">Por mes:</div>
                            <p>Si busca un mes en particular puede hacerlo de las siguientes maneras:</p>
                            <ul>
                                <li><strong>diciembre del 2020</strong></li>
                                <li><strong>diciembre 2020</strong></li>
                                <li><strong>2020-12</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="h5">Por año:</div>
                            <p>Si requiere información por año puede hacerlo a si:</p>
                            <ul>
                                <li><strong>2020</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection