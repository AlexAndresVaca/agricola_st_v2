@extends('plantillaBootstrap')
@section('slot-name-page')
Bienvenido
@endsection

@section('slot-nav')
<nav class="navbar navbar-dark bg-dark">
    <a href="{{url('')}}" class="navbar-brand">Santa Teresita</a>
    <form class="form-inline">
        <a class="btn btn-danger my-2 my-sm-0" href="{{route('login')}}">Iniciar Sesión</a>
        <div class="px-1"></div>
        <a href="{{route('register')}}" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Registrarte</a>
    </form>
</nav>
@endsection

@section('slot-breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>
@endsection

@section('slot-body')
<div class="jumbotron">
    <h1 class="display-4">Santa Teresita te da la bienvenida!</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, doloribus sequi numquam atque
        suscipit facilis quibusdam quae dolorum similique nulla. Aspernatur inventore eligendi nam placeat animi in
        facilis nemo excepturi!</p>
    <hr class="my-4">
    <p>Este es nuestro nuevo <span class="font-weight-bold">Sistema de control de productos</span>, puedes conocer mas
        en el siguiente enlace.</p>
    <a class="btn btn-danger btn-lg" href="#" role="button">Quiero conocer más</a>
</div>
@endsection
