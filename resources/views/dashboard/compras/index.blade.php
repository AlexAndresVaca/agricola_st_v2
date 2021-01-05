@extends('plantillaDashboard')
@section('name-page')
Compras
@endsection
@section('purchase-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Compras</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="row justify-content-center my-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#elegirComerciante">
            <i class="fa fa-plus-circle"></i>
            Nueva compra
        </button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                @if(session('update_compra'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Compra finalizada!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('delete_compra'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Compra eliminada!</strong>
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
                <h1 class="h3 mb-0 text-gray-800 text-center">Lista de compras</h1>
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
            <table class="table table-light table-bordered table-striped table-hover mx-auto" id="tablaCompras"
                width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Persona</th>
                        <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach($list_compras as $item)
                    <tr class="text-capitalize">
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
                        <td>{{$item->apellido_neg}} {{$item->nombre_neg}}</td>
                        <td class="text-center w-75px">
                            <a href="{{route('compraInfo',$item)}}" class="text-secondary">
                                <i class="fas fa-eye"></i>
                                <span class="d-none d-sm-inline">Ver</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($list_compras_sn_personas as $item)
                    <tr class="text-capitalize tr-danger">
                        <td scope="row" class="border-left-danger">{{$item->cod_trans}}</td>
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
                        <td class=""> <span class="text-muted ">[Negociante eliminado]</span></td>
                        <td class="text-center w-75px">
                            <a href="{{route('compraInfo',$item)}}" class="text-secondary">
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
<!-- Modal Elegir negociante -->
<div class="modal fade" id="elegirComerciante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Elegir un comerciante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-light table-bordered table-striped table-hover"
                                    id="tablaNegociantes" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">CI / ID</th>
                                            <th>Apellido y Nombre</th>
                                            <th>Correo</th>
                                            <th class="text-center w-75px">Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach($list_negociantes as $item)
                                        <tr>
                                            <td scope="row">{{$item->ci_neg}}</td>
                                            <td>{{$item->apellido_neg}} {{$item->nombre_neg}}</td>
                                            <td>{{$item->correo_neg}}</td>
                                            <td class="text-center w-75px">
                                                <form action="{{route('compra_add',$item->cod_neg)}}" method="POST">
                                                    @CSRF
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="far fa-hand-pointer"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
</div>
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
                            <p>Si desea utilizar el buscador para una fecha determinada puede hacerlo de las
                                siguientes
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