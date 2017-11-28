@extends('layouts.app')
@section('title', 'Editar empresa')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        <legend class="text-center"><b>Perfil de {empresa->nombre}</b></legend>

	        	<div class="col-sm-6 col-md-4">
	        		<div class="img">
		            	<img src="{{asset('images/foto.png')}}" />
	        		</div>
		        </div>
		        <div class="col-sm-6 col-md-8">
		        	<table class="table table-responsive">
	                <tr>
	                  <td><i class="glyphicon glyphicon-folder-open"></i><b> Nombre:</b></td>
	                  <td>{$empresa->nombre}</td>
	                </tr>
	                <tr>
	                  <td><i class="glyphicon glyphicon-th-list"></i><b> Descripcion:</b></td>
	                  <td> {$empresa->descripcion </td>
	                </tr>
	                <tr>
	                  <td><i class="glyphicon glyphicon-user"></i><b> Organizador:</b></td>
	                  <td> {$empresa->organizador } </td>
	                </tr>
	                <tr>
	                  <td><i class="glyphicon glyphicon-ok"></i><b> Integrantes:</b></td>
	                  <td>
	                  <li> {$empresa->integrante 1 } </li>
	                  <li> {$empresa->integrante 2 } </li>
	                  <li> {$empresa->integrante 3 } </li>
	                  <li> {$empresa->integrante 4 } </li>
	                  </td>
	                </tr>
	              </table>
	              <a href="{{ ('') }}" role="button" class="btn btn-info btn-md pull-right">Editar empresa</a><br>
	              <p>
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