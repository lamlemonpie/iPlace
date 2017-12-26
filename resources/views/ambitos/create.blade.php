@extends('layouts.app')
@section('title', 'Nueva Categoría')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{ asset('ambitos') }}">
	                {{ csrf_field() }}
	        <legend class="text-center"><b>Nueva Categoría</b></legend>
		        <div class="col-sm-4 col-md-4">
					<div class="text-center">
		              <img class="img-responsive" src="/images/category.png" id="img-preview" />
		            </div>
		            <input type="hidden" name="link_foto" id="link_foto" value="">

		            <br>
		            <label class="file-upload-container" for="file-upload">
		              <input class="file-upload-container" id="file-upload" type="file" style="display:none;">
		              Select an Image
		            </label>
		        </div>


		        <div class="col-sm-8 col-md-8">
					<label for="empresa_name" class="control-label">Nombre de la categoría:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre de la categoría" value="" required>
						</div><br>
		        	<label for="">Descripción de la categoría:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="7" cols="14" required="required" placeholder="Escriba aquí la descripción de la categoría"></textarea><br>
					<div class="pull-right">
						<button type="submit" class="btn btn-info btn-lg login-button">Guardar</button>
					</div>
		        </div>
			</form>
		</div>
	</div>
</div>

<script src="/js/upload.js"></script>

<style type="">
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

@endsection('content')
