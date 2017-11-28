<div class="nuevaEmpresa">
  	<div class="row">
	    
	        <form class="form-horizontal" role="form" method="POST" action="{{ asset('empresas/storeAjx') }}">
	                {{ csrf_field() }}
		        <div class="col-sm-6 col-md-6">
					<label for="empresa_name" class="control-label">Nombre de la empresa:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre de la empresa" value="">
						</div>
		        </div>
		        <div class="col-sm-6 col-md-6">
		        	<label for="">Descripción de la empresa</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4" cols="14" required="required" placeholder="Escriba aquí la descripción de la empresa"></textarea><br>
		        </div>
					<div class="pull-right">
						<br><button type="submit" class="btn btn-info btn-lg login-button">Guardar</button>
					</div>
			</form>
	</div>
</div>
