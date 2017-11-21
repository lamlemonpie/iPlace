@extends('layouts.app')
@section('title', 'Editar empresa')

@section('content')

<div class="container">
	<div class="row main">
		<div class="col-xs-6 col-md-4"></div>

		<div class="col-xs-6 col-md-4">

		<div class="panel-heading">
           <div class="panel-title text-center">
           		<h1 class="title">Editar empresa</h1>
           		<br>
           	</div>
        </div> 


        <form class="form-horizontal" role="form" method="POST" action="">
        <input name="_method" type="hidden" value="PATCH">
                {{ csrf_field() }}

		<div class="main-login main-center">
				<div class="form-group">
					<label for="nombre_emp" class="cols-sm-2 control-label">Nombre:</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="id_nombre_emp" name="nombre_emp" value="{empresa->nombre}" autofocus>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="descripcion" class="cols-sm-2 control-label">Descripcion:</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="" aria-hidden="true"></i>@</span>
							<input class="form-control" name="descripcion"  id="id_descripcion" value="{empresa->descripcion}" required></textarea>
						</div>
					</div>
				</div>

			<br><br>
				<div class="form-group ">
					<button type="button" class="btn btn-primary btn-lg btn-block "> Guardar </button>
				</div>
		</div>
		</form>
		

		<div class="col-xs-6 col-md-4"></div>

	</div>
</div>

@endsection('content')