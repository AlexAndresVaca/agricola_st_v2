@extends('plantillaDashboard')
@section('name-page')
Home
@endsection
@section('home-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>
@endsection
@section('body')
<h1 class="h3 mb-4 text-gray-800">Home</h1>
<div class="container-fluid">
  @if(session('error_sin_acceso'))
    <div class="row">
        <div class="col">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Sin acceso!</strong> Comuníquese con el administrador si cree que es un error.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
  @endif
</div>
@endsection