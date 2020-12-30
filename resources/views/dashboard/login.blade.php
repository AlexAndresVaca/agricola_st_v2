@extends('plantillaBootstrap')
@section('slot-name-page')
Login
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('resources/css/_login.css')}}">
@endsection

@section('slot-body')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 col-md-6 mt-5">
            <div class="card shdw card-login ">
                <h5 class="card-header text-white border-bottom border-white">
                    Inicio de Sesión
                </h5>
                <div class="card-body">
                    <form class="my-2">
                        <div class="form-group">
                            <label class="h4 text-white" for="exampleInputEmail1">Usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="email" class="form-control " id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <small id="emailHelp" class="form-text text-muted">Nunca comparta sus datos con nadie
                                más.</small>
                        </div>
                        <div class="form-group">
                            <label class="h4 text-white" for="exampleInputPassword1">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-white" for="exampleCheck1">Recordarme</label>
                        </div>
                        <a href="{{route('index')}}" class="btn btn-block btn-outline-secondary">Volver</a>
                        <button type="submit" class="btn btn-block btn-danger">Ingresar</button>
                    </form>

                </div>
                <div class="card-footer text-center text-white">
                    <a href="{{route('dashboard')}}" class="text-white">Universidad Técnica de Cotopaxi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection