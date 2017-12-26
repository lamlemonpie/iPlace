@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-3 col-sm-3 col-md-3"></div>
	    <div class="col-xs-6 col-sm-6 col-md-6 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{asset('users/'.$user->id)}}">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend><b>Editar Usuario</b></legend>
	        	<div class="col-sm-6 col-md-4">
	        	<br>
		            <div class="text-center">
		              <img class="img-responsive" src="{{$user->link_foto}}" id="img-preview" />
		            </div>
		            <input type="hidden" name="link_foto" id="link_foto" value="{{$user->link_foto}}">
		            <br>
		            <label class="file-upload-container" for="file-upload">
		              <input class="file-upload-container" id="file-upload" type="file" style="display:none;">
		              Select an Image
		            </label>
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
                <option value="M" @if ("M" == $user->sexo) selected @endif>Masculino</option>
                <option value="F" @if ("F" == $user->sexo) selected @endif>Femenino</option>
                <option value="O" @if ("O" == $user->sexo) selected @endif>Otro</option>
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

<script src="/js/upload.js"></script>


<style type="">
	.well{
      background-color: rgb(250, 250, 250);
    }
	.file-upload-container {
	  width: 100%;
	  height: 50px;
	  overflow: hidden;
	  background: #80bfff;
	  user-select: none;
	  transition: all 150ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;
	  text-align: center;
	  color: white;
	  line-height: 50px;
	  font-weight: 300;
	  font-size: 20px;
	}

	.file-upload-container:hover {
	  cursor: pointer;
	  background: #4da6ff;
	}
</style>

@endsection
