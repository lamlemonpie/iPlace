@extends('layouts.app')
@section('title', 'Ver Categoría')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">


	        <legend class="text-center"><b>Datos de la Categoría</b></legend>

	        	<div class="col-sm-6 col-md-4">
	        		<div class="img">
		            	<img src="{{$categoria->link_foto}}" />
	        		</div>
		        </div>
		        <div class="col-sm-6 col-md-8">
		        	<table class="table table-responsive">
	                <tr>
	                  <td><i class="glyphicon glyphicon-folder-open"></i><b> Nombre:</b></td>
	                  <td>{{$categoria->nombre}}</td>
	                </tr>
	                <tr>
	                  <td><i class="glyphicon glyphicon-th-list"></i><b> Descripción:</b></td>
	                  <td> {{$categoria->descripcion}} </td>
	                </tr>
	              </table>
	              <a href="{{ ('/ambitos/'.$categoria->id.'/edit') }}" role="button" class="btn btn-info btn-md pull-right">Editar categoría</a><br>
	              <p>
		        </div>

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
