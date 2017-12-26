@extends('layouts.app')
@section('title', 'Mostrar Usuario')

@section('content')

<div class="container">
  <br><br> <br>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 well well-sm">
          <legend><b>Perfil de Usuario</b></legend>
          <div class="col-sm-6 col-md-4">
              <img src="{{$user->link_foto}}" alt="" class="img-rounded img-responsive" />
          </div>
          <div class="col-sm-6 col-md-8">
              <table class="table table-responsive">
                <tr>
                  <td><i class="glyphicon glyphicon-user"></i><b> NOMBRE:</b></td>
                  <td>{{$user->nombres}}</td>
                </tr>
                <tr>
                  <td><i class="glyphicon glyphicon-user"></i><b> APELLIDOS:</b></td>
                  <td> {{$user->apellidos}} </td>
                </tr>
                <tr>
                  <td><i class="glyphicon glyphicon-envelope"></i><b> E-MAIL:</b></td>
                  <td> {{$user->email}} </td>
                </tr>
                <tr>
                  <td><i class="glyphicon glyphicon-heart-empty"></i><b> SEXO:</b></td>
                  @if ($user->sexo == "F")
                    <td> Femenino </td>
                  @elseif ($user->sexo == "M")
                    <td> Masculino </td>
                  @else
                    <td> Otro </td>
                  @endif
                </tr>
              </table>
              <a href="{{ ('/users/'.$user->id.'/edit') }}" role="button" class="btn btn-info btn-md pull-right">Editar usuario</a><br>
              <p>
          </div>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3"></div>
  </div>
  <br>
</div>

<style>
  th, td {
    padding: 8px;
  }
  .well{
      background-color: rgb(255, 255, 255);
      }
</style>

@endsection('content')
