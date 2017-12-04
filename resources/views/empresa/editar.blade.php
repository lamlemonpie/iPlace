@extends('layouts.app')
@section('title', 'Editar empresa')

@section('content')

<div class="container">
  <br><br> <br>

	<link href="../public/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{asset('empresas/'.$empresa->id)}}">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend class="text-center"><b>Editar Empresa</b></legend>

	        	<div class="col-sm-6 col-md-4">
	        		<div class="img">
		            	<img src="{{asset('images/foto.png')}}" />
	        		</div>
		        </div>
		        <div class="col-sm-6 col-md-8">
		        	<label for="empresa_name" class="control-label">Nombre de la empresa:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="nombre" name="nombre" value="{{$empresa->nombre}}" >
						</div><br>
					<label for="">Descripción de la empresa</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></span>
                        	<input type="text" class="form-control" id="descripcion" placeholder="Ingrese Descripcion" name="descripcion" value="{{$empresa->descripcion}}" >
                        </div><br>
					<label for="organizador" class="control-label">Organizador (Administrador):</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
							<select class="form-control" id="id_organizador" name="organizador">
							<option value="$empresa->admin->id" > {{$empresa->admin->usuario->nombres}} {{$empresa->admin->usuario->apellidos}}</option>
							@foreach($organizadores as $organizador)
								@if($empresa->admin->id != $organizador->id_organizador)
				              		<option value="$organizador->id_organizador" > {{$organizador->organizador->usuario->nombres}} {{$organizador->organizador->usuario->apellidos}}</option>
				              	@endif
				            @endforeach
				            </select>
						</div><br>
					<!--
					<label for="integrantes" class="control-label">Integrantes:</label><br>
						<script src="iPlace/public/js/jquery.multi-select.js" type="text/javascript">
							$('#integrantes').multiSelect();
						</script>
						<select multiple='multiple' id='integrantes' name="integrantes[]">
							@foreach($organizadores as $organizador)
				              <option value="$organizador->id_organizador" > {{$organizador->organizador->usuario->nombres}} {{$organizador->organizador->usuario->apellidos}}</option>
				            @endforeach
					    </select>
					    <link href="iPlace/public/css/multiselect.css" media="screen" rel="stylesheet" type="text/css">
					    <br>
					-->
					<label for="integrantes" class="control-label">Integrantes:</label><br>
					    <table class="table col-sm-12">
							<thead>
								<tr>
									<th> Nombre: </th>
									<th> Eliminar </th>
								</tr>
							</thead>
							<tbody>
									@foreach($organizadores as $organizador)
									<tr>
							              	<td>{{$organizador->organizador->usuario->nombres}} {{$organizador->organizador->usuario->apellidos}}</td>
											<td>
												<a href="{{asset('')}}" class="btn btn-danger btn-xs">
												  <span class="glyphicon glyphicon-remove"></span> 
												</a>
											</td>
									</tr>
							        @endforeach
							</tbody>
						</table>
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

@endsection('content')
