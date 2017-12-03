@extends('layouts.app')
@section('title', 'Solicitudes Enviadas')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-1 col-sm-1 col-md-1"></div>
	    <div class="col-xs-10 col-sm-10 col-md-10 well well-sm">

			<legend><b>Solicitudes Enviadas</b></legend>

			<div class="tablaEmpresas table-responsive">
				<div class="tablaempresa col-sm-12">
						<table class="table col-sm-12">
							<thead>
								<tr>
									<th> Hacia (Empresa): </th>
									<th> Organizador (Persona): </th>
									<th> Cancelar </th>

								</tr>
							</thead>
							<tbody>
								@foreach($solicitudes as $solicitud)
									<tr>
										<td>{{$solicitud->empresa->nombre}}</td>
										<td>{{$solicitud->organizador_propietario->usuario->nombres}} {{$solicitud->organizador_propietario->usuario->apellidos}}</td>
										<td>
											<a href="{{asset('solicituds/enviado')}}" class="btn btn-danger btn-xs">
											  <span class="glyphicon glyphicon-remove"></span>
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
