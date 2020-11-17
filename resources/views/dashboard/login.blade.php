@extends('plantillaBootstrap')
@section('slot-name-page')
Login
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('resources/css/_login.css')}}">
@endsection
@section('slot-breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</nav>
@endsection
@section('slot-body')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-8  mx-auto">
            <div class="card border-dark faded">
                <h5 class="card-header bg-danger text-white">
                    Inicio de Sesión
                </h5>
                <div class="card-body bg-dark">
                    <form class="my-5">
                        <div class="form-group">
                            <label class="h4 text-white" for="exampleInputEmail1">Usuario</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Nunca compartimos sus datos con nadie más.</small>
                        </div>
                        <div class="form-group">
                            <label class="h4 text-white" for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-white" for="exampleCheck1">Recordarme</label>
                        </div>
                        <div style="height: 50px;"></div>
                        <a href="{{route('index')}}" class="btn btn-block btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-block btn-danger">Ingresar</button>
                    </form>
                    
                </div>
                <div class="card-footer bg-dark text-center text-white">
                    Universidad Técnica de Cotopaxi
                </div>
            </div>
        </div>
    </div>
</div>
@endsection