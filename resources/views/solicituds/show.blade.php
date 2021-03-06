@extends('layouts.app')
@section('title', 'Ver Solicitud')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-3 col-sm-3 col-md-3"></div>
	    <div class="col-xs-6 col-sm-6 col-md-6 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{asset('solicituds/'.$solicitud->id.'/accept')}}">
	                {{ csrf_field() }}

	        <legend class="text-center"><b>Ver Solicitud</b></legend>

            <div class="tabla">

              <div class="col-sm-12 col-md-12">
                <table class="table table-responsive">
                    <tr>
                      <td><i class="glyphicon glyphicon-folder-open"></i><b> Nombre Empresa:</b></td>
                      <td>{{$empresa->nombre}}</td>
                    </tr>
                    <tr>
                      <td><i class="glyphicon glyphicon-th-list"></i><b> Solicitante:</b></td>
                      <td> {{$usuario->nombres}} {{$usuario->apellidos}} </td>
                    </tr>
                    <tr>
                      <td><i class="glyphicon glyphicon-user"></i><b> Organizador:</b></td>
                      <td> {{$organizador->nombres }} {{$organizador->apellidos}}</td>
                    </tr>
                  </table>
                  <input type="hidden" name="solicitud" value="{{$solicitud->id}}" >
                  @if($solicitud->aceptado == False)
                  <button  type="submit" class="btn btn-info btn-md pull-right">Aceptar Solicitud</button><br>
                  @endif
                  <p>
              </div>

            </div>
			</form>

		</div>
	</div>
</div>

<style type="text/css">
	img {
	  display: block;
	  max-width: 100%;
	  height: auto;
	}
</style>





@endsection('content')
