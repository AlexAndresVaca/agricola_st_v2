@extends('plantillaBootstrap')
@section('slot-name-page')
Bienvenido
@endsection

@section('slot-nav')
<nav class="navbar navbar-dark bg-dark">
    <a href="{{url('')}}" class="navbar-brand"><i class="fa fa-mountain text-danger"></i> Santa Teresita</a>
    <form class="form-inline">
        @if(session('usuario_activo'))
        <a href="{{route('dashboard')}}" class="text-white">Dashboard</a>
        @else
        <a class="btn btn-danger my-2 my-sm-0" href="{{route('login')}}">Iniciar Sesión</a>
        <div class="px-1"></div>
        <!-- <a href="{{route('register')}}" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Registrarte</a> -->
        @endif
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
    <h1 class="display-3">Santa Teresita te da la bienvenida!</h1>
    <p>Este es nuestro nuevo <span class="font-weight-bold">Sistema de control de productos</span>, puedes conocer mas
        en el siguiente enlace.</p>
    <!-- <a class="btn btn-danger btn-lg" href="" role="button">Acceder la menu &raquo;</a> -->
</div>
<div class="container mb-4">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('resources/img/index/slide-1.jpg')}}" class="d-block w-100" alt="..."
                            style="width: 100vw; height: 600px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('resources/img/index/slide-2.jpg')}}" class="d-block w-100" alt="..."
                            style="width: 100vw; height: 600px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('resources/img/index/slide-3.jpg')}}" class="d-block w-100" alt="..."
                            style="width: 100vw; height: 600px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row my-4">
                <div class="col">
                    <h2>Somos Ecuador</h2>
                    <p>Los claveles y rosas ecuatorianas son consideradas como las mejores del mundo por su calidad y
                        belleza
                        inigualables, la situación geográfica del país permite contar con micro climas y luminosidad que
                        proporciona características únicas a las rosas como son: tallos gruesos, largos y totalmente
                        verticales, botones grandes y colores sumamente vivos y el mayor número de días de vida en
                        florero. </p>
                    <p><a class="btn btn-danger"
                            href="https://dspace.ucuenca.edu.ec/bitstream/123456789/3081/1/tm4a44.pdf" role="button"
                            target="_blank">Leer artículo &raquo;</a></p>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <h2>Conoce mas sobre nosotros</h2>
                    <p>Esta empresa fue legalmente constituida bajo el nombre de AGRICOLA SANTA TERESITA, en febrero del
                        2013 como personas naturales.
                        Es una empresa nueva dedicada al cultivo de ROSAS Y CLAVEL bajo invernadero llevando sus
                        productos al mercado a nivel nacional y extranjero.</p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="container">
    <p>&copy; Santa Teresita 2010-2021</p>
</footer>
@endsection