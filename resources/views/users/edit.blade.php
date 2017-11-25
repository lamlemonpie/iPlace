@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{asset('users/'.$user->id)}}">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend><b>Editar Usuario</b></legend>
	        	<div class="col-sm-6 col-md-4">
	        	<br>
		            <img src="https://lh3.googleusercontent.com/-BSFw5UvWs3I/WGxL8mWashI/AAAAAAAAAaM/OdIsQkUTvlkl4k1DVxZuqCLXqtIKO7PlwCJoC/w635-h960/15823051_1065303886913447_6605360329040841707_n.jpg" alt="" class="img-rounded img-responsive" />
		        </div>
		        <div class="col-sm-6 col-md-8">
					<label for="name" class="control-label">Nombres:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="id_nombre" placeholder="Ingrese nombres" name="nombres" value="{{$user->nombres}}" >
						</div>
					<label for="name" class="control-label">Apellidos:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="id_apellidos" placeholder="Ingrese apellidos" name="apellidos" value="{{$user->apellidos}}" >
						</div>
					<label for="email" class="control-label">Email:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="" aria-hidden="true"></i>@</span>
							<input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese email" value="{{$user->email}}" readonly/>
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
						<br>
					<div class="pull-right">
						<button type="submit" class="btn btn-info btn-lg login-button">Guardar</button>
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
