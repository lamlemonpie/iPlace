@extends('layouts.app')
@section('title', 'Asistir a Evento')
@section('content')



<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-3 col-sm-3 col-md-3"></div>
	    <div class="col-xs-6 col-sm-6 col-md-6 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{ asset('eventos/'.$evento->id.'/confirmarAsistencia') }}">
	                {{ csrf_field() }}
	        <legend class="text-center"><b>Confirmación de Asistencia</b></legend>

	        <div class="text-center">
          	<p><font size="6">¿Confirmas asistir al evento: 
          	{{$evento->nombre}} ?
          </font></p>
	        	
	        </div>

          			@if($evento->link_foto)
	        		<div class="img">
		            	<img class="img-responsive" src="{{$evento->link_foto}}" id="img-preview"/>
	        		</div>
		            @else
		            <div class="img">
		              <img src="/images/Speech.jpg" id='img-preview' alt="" class="img-rounded img-responsive" />
		            </div>
		            @endif
		            <br>
					<div class="text-center">
						<button type="submit" class="btn btn-info btn-lg btn-block login-button">Confirmar</button>
					</div>
			</form>
		</div>
	</div>
</div>


@endsection
