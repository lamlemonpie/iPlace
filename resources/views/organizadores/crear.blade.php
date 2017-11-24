@extends('layouts.app')
@section('title', 'Nuevo Organizador')

@section('content')

<div class="container">
  <br><br> <br>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 well well-sm">
          <legend><b>Nuevo Organizador</b></legend>
            <div class="container">
              <span class="">Desea ser nuevo organizador?</span>
              <br><br>
              <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
              <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
              <br>
              <a href="#" class="btn btn-primary">Sí</a>
            </div><!-- card content -->
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3"></div>
  </div>
  <br>
</div>


<style type="">
  .well{
      background-color: rgb(253, 253, 253);
    }
</style>

@endsection('content')