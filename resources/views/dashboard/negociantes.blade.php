@extends('plantillaDashboard')
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
<!--<h1 class="h3 mb-4 text-gray-800">Negociantes</h1>-->
<div class="row justify-content-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus-circle"></i>
        Nuevo Negociante
    </button>
</div>
@endsection