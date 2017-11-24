@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend><b>Editar Usuario</b></legend>
	        	<div class="col-sm-6 col-md-4">
	        	<br>
		            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
		        </div>
		        <div class="col-sm-6 col-md-8">
					<label for="name" class="control-label">Nombres:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="id_nombre" placeholder="Ingrese nombres" name="nombre" value="{user->nombre}" >
						</div>
					<label for="name" class="control-label">Apellidos:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="id_apellidos" placeholder="Ingrese apellidos" name="apellidos" value="{user->apellidos}" >
						</div>
					<label for="email" class="control-label">Email:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="" aria-hidden="true"></i>@</span>
							<input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese email" value="{user->email}" readonly/>
						</div>
					<label for="sexo" class="control-label">Sexo:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-heart-empty" aria-hidden="true"></i></span>
							<select class="form-control" id="sexo" name="sexo">
				              <option value="M" >Masculino</option>
				              <option value="F" >Femenino</option>
				              <option value="O" >Otro</option>
				            </select>
						</div>
					<label for="password" class="control-label">Password</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password" value="Password" readonly/>
						</div>
						<br>
					<div class="pull-right">
						<button type="button" class="btn btn-info btn-lg login-button">Guardar</button>
					</div>
		        </div>
			</form>
			<div class="col-xs-2 col-sm-2 col-md-2"></div>
		</div>
	</div>
</div>


<style type="">
	.well{
      background-color: rgb(250, 250, 250);
    }
</style>
@endsection