@extends('layouts.app')
@section('title', 'Cancelar asistencia a Evento')
@section('content')



<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{ asset('eventos/'.$evento->id.'/cancelarAsistencia') }}">
	                {{ csrf_field() }}
	        <legend class="text-center"><b>Confirmación de cancelación de asistencia</b></legend>

          ¿Confirmas cancelar asistir al evento?
          {{$evento->nombre}}

					<div class="pull-right">
						<button type="submit" class="btn btn-info btn-lg login-button">Confirmar</button>
					</div>
			</form>
		</div>
	</div>
</div>


@endsection
