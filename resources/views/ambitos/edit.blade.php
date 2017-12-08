@extends('layouts.app')
@section('title', 'Editar Categoría')

@section('content')


<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{asset('ambitos/'.$categoria->id)}}">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend class="text-center"><b>Editar Categoría</b></legend>

	        	<div class="col-sm-6 col-md-4">
	        		<div class="img">
		            	<img src="{{asset('images/foto.png')}}" />
	        		</div>
		        </div>
		        <div class="col-sm-6 col-md-8">
		        	<label for="categoria_name" class="control-label">Nombre de la categoría:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria->nombre}}" required>
						</div><br>
					<label for="">Descripción de la categoría:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></span>
                        	<input type="text" class="form-control" id="descripcion" placeholder="Ingrese Descripcion" name="descripcion" value="{{$categoria->descripcion}}" required>
                        </div><br>

					<div class="pull-right">
						<button type="submit" class="btn btn-info btn-lg login-button">Guardar</button>
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

@endsection
