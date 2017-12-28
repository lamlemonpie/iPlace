@extends('layouts.app')
@section('title', 'Ver empresa')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-2 col-sm-2 col-md-2"></div>
	    <div class="col-xs-8 col-sm-8 col-md-8 well well-sm">


	        <legend class="text-center"><b>Datos de la Empresa</b></legend>

	        	<div class="col-sm-6 col-md-4">
	        		@if($empresa->link_foto)
	        		<div class="img">
		            	<img class="img-responsive" src="{{$empresa->link_foto}}" id="img-preview"/>
	        		</div>
		            @else
		            <div class="img">
		              <img src="/images/empresa.jpg" id='img-preview' alt="" class="img-rounded img-responsive" />
		            </div>
		            @endif
		        </div>
		        <div class="col-sm-6 col-md-8">
		        	<table class="table table-responsive">
	                <tr>
	                  <td><i class="glyphicon glyphicon-folder-open"></i><b> Nombre:</b></td>
	                  <td>{{$empresa->nombre}}</td>
	                </tr>
	                <tr>
	                  <td><i class="glyphicon glyphicon-th-list"></i><b> Descripcion:</b></td>
	                  <td> {{$empresa->descripcion}} </td>
	                </tr>
	                <tr>
	                  <td><i class="glyphicon glyphicon-user"></i><b> Organizador:</b></td>
	                  <td> {{$nombres }} {{$apellidos}}</td>
	                </tr>
	                <tr>
	                  <td><i class="glyphicon glyphicon-ok"></i><b> Integrantes:</b></td>
	                  <td>
	                  @foreach($organizadores as $organizador)
	                  	<li> {{$organizador->organizador->usuario->nombres }} {{$organizador->organizador->usuario->apellidos }} </li>
	                  @endforeach
	                  </td>
	                </tr>
	              </table>

                @if($es_organizador)
	               <a href="{{ ('/empresas/'.$empresa->id.'/edit') }}" role="button" class="btn btn-info btn-md pull-right">Editar empresa</a><br>
                @endif
	              <p>
		        </div>

		</div>
	</div>
	<br>
</div>

<style type="text/css">
	img {
	  display: block;
	  max-width: 100%;
	  height: auto;
	}
</style>

@endsection('content')
