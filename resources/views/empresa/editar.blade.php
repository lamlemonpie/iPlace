@extends('layouts.app')
@section('title', 'Editar empresa')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="{{asset('empresas/'.$empresa->id)}}">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend class="text-center"><b>Editar Empresa</b></legend>

	        	<div class="col-sm-6 col-md-4">
	        		<br>
	        		<div class="text-center">
		              <img class="img-responsive" src="{{$empresa->link_foto}}" id="img-preview" />
		            </div>
		            <input type="hidden" name="link_foto" id="link_foto" value="{{$empresa->link_foto}}">
		            <br>
		            <label class="file-upload-container" for="file-upload">
		              <input class="file-upload-container" id="file-upload" type="file" style="display:none;">
		              Select an Image
		            </label>
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
                        	<!--<input type="text" class="form-control" id="descripcion" placeholder="Ingrese Descripcion" name="descripcion" value="{{$empresa->descripcion}}" >-->
                        	<textarea class="form-control" id="descripcion" name="descripcion" type="text" rows="3" type="text"  required>{{$empresa->descripcion}} </textarea> <br>
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
          <div class="tabla">

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
                      <a type="button" onclick="eliminarOrganizador({{$empresa->id}},{{$organizador->organizador->id}})" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-remove"></span>
                      </a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
          </table>

          </div>

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


<script>


function eliminarOrganizador(empresa,organizador){
  console.log(empresa);
  console.log(organizador);
  var direccion = "{{asset('empresas')}}"+ "/" + empresa + "/expellOrganizador/"+ organizador;
  console.log(direccion);
  $.ajax(

    {
      url:direccion,
      type: 'POST',
      data : {'_token': '{{ csrf_token() }}', '_method': 'delete'},

      success: function(data){
          console.log(data);
          $(".tabla").load("{{asset('empresas')}}"+ "/" + empresa + "/organizadors");
      }
    }

  );

}

</script>

@endsection('content')
