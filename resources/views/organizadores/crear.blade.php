@extends('layouts.app')
@section('title', 'Nuevo Organizador')

@section('content')


<div class="container">
<br><br>
  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 well well-sm">
                  {{ csrf_field() }}
          <legend><b>Nuevo Organizador</b></legend>
          
            <div class="col-sm-6 col-md-12">
              <label for="name" class="control-label"> Crear nueva empresa: </label>
              <div class="input-group">
                <div class="nuevaEmpresa">
                  <a type="button" onclick="crearNuevaEmpresa()" class="btn btn-default">Crear Empresa</a>
                </div>
              </div><br>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{asset('organizadors')}}">
            <div class="col-sm-6 col-md-12">
              <label for="empresa" class="control-label"> Seleccionar empresa:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                  <select class="form-control" id="id_empresa" name="empresa">
                    @foreach ($empresas as $empresa)
                      <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <p>&nbsp;</p>

            <div class="pull-right">
              <a href="{{asset('Inicio')}}" id="cancel" name="cancel" class="btn btn-default btn-lg">Cancel</a>
              <button type="button" class="btn btn-info btn-lg login-button">Aceptar</button>
            </div>
          </form>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3"></div>
  </div>
  <br>
</div>


<style>
  .well{
      background-color: rgb(253, 253, 253);
    }
</style>

<script>

  function crearNuevaEmpresa(){

    $.ajax(

      {
        url:'/empresas/crearNuevaEmpresaAjx',
        type: 'get',
        dataType: 'json',
        success: function(data){
            $(".nuevaEmpresa").html(data);
        }
      }

    );

  }

</script>

@endsection('content')