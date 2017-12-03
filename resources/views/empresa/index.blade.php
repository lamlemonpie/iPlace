@extends('layouts.app')
@section('title', 'Nueva empresa')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-1 col-sm-1 col-md-1"></div>
	    <div class="col-xs-10 col-sm-10 col-md-10 well well-sm">

			<legend><b>Mis Empresas</b></legend>

			<div class="tablaEmpresas table-responsive">
				<div class="tablaempresa col-sm-12">
						<table class="table col-sm-12">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th> Ver</th>
									<th> Editar </th>

								</tr>
							</thead>
							<tbody>
								@foreach($empresas as $empresa)
									<tr>
										<td>{{$empresa->nombre}}</td>
										<td>{{$empresa->descripcion}}</td>
										<td>
											<a href="{{asset('empresas')}}{{'/'.$empresa->id}}" class="btn btn-info btn-xs">
											  <span class="glyphicon glyphicon-user"></span> 
											</a>
										</td>
										<td>
											<a href="{{asset('empresas')}}{{'/'.$empresa->id.'/edit'}}" class="btn btn-warning btn-xs">
											  <span class="glyphicon glyphicon-pencil"></span> 
											</a>
										 </td>

									</tr>
								@endforeach
							</tbody>
						</table>
				</div>

			</div>
		</div>
	</div>
	<br><br><br>
</div>

@endsection('content')
