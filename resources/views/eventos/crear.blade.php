@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row main">

        <div class="col-xs-6 col-md-4"></div>

        <div class="col-xs-6 col-md-4">

            <div class="panel-heading">
               <div class="panel-title text-center">
                    <h1 class="title">Nuevo evento</h1>
                    <br>
                </div>
            </div> 


				<form class="form-horizontal" role="form" method="POST" action="">
                <input name="_method" type="hidden" value="PATCH">
					{{ csrf_field() }}
					
				<div class="main-login main-center">
                    <div class="form-group">
						<label for="nombre_evento" class="cols-sm-2 control-label">Nombre:</label>
						<div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></span>
                                <input type="text" id="id_nombre_evento" name="nombre_evento" class="form-control" placeholder="Ingresa el nombre aqui" required autofocus>
                            </div>
						</div>
					</div>

					<div class="form-group">
						<label for="ubicacion" class="cols-sm-2 control-label">Ubicacion:</label>
						<div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i></span>
                                    <input type="text" id="id_ubicacion" name="ubicacion" class="form-control" placeholder="Ingrese la ubicacion aqui" required autofocus>
                            </div>
						</div>
					</div>

                    <div class="form-group">
                        <label for="precio" class="cols-sm-2 control-label">Precio</label>
                        <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i></span>
                                <input type="text" id="id_precio" name="precio" class="form-control" placeholder="Ingresa el precio aqui" required>
                        </div>
                        </div>
                    </div>
					
                    <br><br>
                    <div class="form-group ">
                        <button type="button" class="btn btn-primary btn-lg btn-block "> Crear 
                        </button>
                    </div>
                </div>
				</form>

                <div class="col-xs-6 col-md-4"></div>

            </div>
        </div>
    </div>
@endsection