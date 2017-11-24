@extends('layouts.app')
@section('title', 'Nuevo Organizador')

@section('content')

<div class="container">
<br>
  
  <form class="form-horizontal" role="form" method="POST" action="">
    <input name="_method" type="hidden" value="PATCH">
                {{ csrf_field() }}
    
    <div class="row main">
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4">

        <div class="panel-heading">
          <div class="panel-title text-center">
            <h1 class="title">Eres nuevo organizador</h1>
            <br>
          </div>
        </div> 
                <br><br>
        <div class="form-group ">
            <a type="button" class="btn btn-primary btn-lg btn-block " href="{{ ('/home') }}"> Aceptar 
            </a>
        </div>

      </div>
    </div>
  </form>
</div>

@endsection('content')