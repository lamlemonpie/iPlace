@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')

		<div class="container">
			<div class="row main">
				<div class="col-xs-6 col-md-4"></div>

				<div class="col-xs-6 col-md-4">

				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Editar Usuario</h1>
	               		<br>
	               	</div>
	            </div> 


	            <form class="form-horizontal" role="form" method="POST" action="">
                <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}

				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nombre:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id="Nombre" placeholder="Ingrese nombre" name="nombre" value="" >
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="" aria-hidden="true"></i>@</span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese email" value=""/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="sexo" class="cols-sm-2 control-label">Sexo:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-heart-empty" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="sexo" id="sexo"  placeholder="Ingrese sexo" value=""/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password" value="Password"/>
								</div>
							</div>
						</div>
						<br><br>
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-lg btn-block login-button">Guardar</button>
						</div>
					</form>
				</div>
				</div>

				<div class="col-xs-6 col-md-4"></div>

			</div>
		</div>

@endsection