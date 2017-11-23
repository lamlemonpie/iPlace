@extends('layouts.app')
@section('title', 'Nueva empresa')

@section('content')

<div class="container">
<br>
	<div class="row main">
		<div class="col-xs-6 col-md-4"></div>

		<div class="col-xs-6 col-md-4">

		<div class="panel-heading">
           <div class="panel-title text-center">
           		<h1 class="title">Nueva empresa</h1>
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
							<input type="text" class="form-control" id="id_nombre_emp" placeholder="Ingrese nombre de la empresa" name="nombre_emp" value="" >
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="descripcion" class="cols-sm-2 control-label">Descripcion:</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="" aria-hidden="true"></i>@</span>
							<textarea class="form-control" name="descripcion" cols="50" rows="5" id="id_descripcion"  placeholder="Ingrese descripcion de la empresa" required></textarea>
						</div>
					</div>
				</div>

			<br><br>
				<div class="form-group ">
					<button type="button" class="btn btn-primary btn-lg btn-block "> Crear </button>
				</div>
		</div>
		</form>
		

		<div class="col-xs-6 col-md-4"></div>

	</div>
</div>
</div>

@endsection('content')