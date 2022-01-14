@extends('adminlte::page')

@section('title', 'Principal')

@section('content_header')
    <h1>Menú Principal</h1>
@stop

@section('content')

<div class="alert alert-warning mt-4" role="alert">
  <b>Atención <i class="fas fa-exclamation-circle ml-1"></i></b> ... Bienvenid(a) a nuestro aplicativo
</div>


<div class="card">
  <div class="card-header">
    Bienvenid (a)
  </div>
  <div class="card-body">
    <h5 class="card-title">Hola <b>{{Auth()->user()->name;}}</b> Te damos la bienvenida a nuestro aplicativo</h5>
    <br>
    
  </div>
</div>

   


@stop

@section('css')
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop