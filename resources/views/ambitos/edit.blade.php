@extends('layouts.app')
@section('title', 'Editar Categoría')

@section('content')


<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{asset('ambitos/'.$categoria->id)}}">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend class="text-center"><b>Editar Categoría</b></legend>

	        	<div class="col-sm-6 col-md-4">
		            @if($categoria->link_foto)
	        		<div class="img">
		              	<img class="img-responsive" src="{{$categoria->link_foto}}" id="img-preview" />
	        		</div>
		            @else
		            <div class="img">
		              <img src="/images/category.jpg" id='img-preview' alt="" class="img-rounded img-responsive" />
		            </div>
		            @endif	
		            <input type="hidden" name="link_foto" id="link_foto" value="{{$categoria->link_foto}}">

		            <br>
		            <label class="file-upload-container" for="file-upload">
		              <input class="file-upload-container" id="file-upload" type="file" style="display:none;">
		              Seleccione imagen
		            </label>
		        </div>
		        <div class="col-sm-6 col-md-8">
		        	<label for="categoria_name" class="control-label">Nombre de la categoría:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria->nombre}}" required>
						</div><br>
					<label for="">Descripción de la categoría:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></span>
                        	<!--<input type="text" class="form-control" id="descripcion" placeholder="Ingrese Descripcion" name="descripcion" value="{{$categoria->descripcion}}" required>-->
                        	<textarea class="form-control" id="descripcion" name="descripcion" type="text" rows="5" type="text"  required>{{$categoria->descripcion}} </textarea> <br>
                        </div><br>

					<div class="pull-right">
						<button type="submit" class="btn btn-info btn-lg login-button">Guardar</button>
					</div>
		        </div>
			</form>
		</div>
	</div>
</div>

<script src="/js/upload.js"></script>
<style type="text/css">
	img {
	  display: block;
	  max-width: 100%;
	  height: auto;
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
