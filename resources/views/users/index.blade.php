@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-1 col-sm-1 col-md-1"></div>
	    <div class="col-xs-10 col-sm-10 col-md-10 well well-sm">

			<legend><b>Usuarios</b></legend>

			<div class="tablaUsuarios table-responsive">
				<div class="tablausuarios col-sm-12">
					<table class="table col-sm-12">
							<thead>
								<tr>
									<th>Nombres</th>
									<th>Apellidos Paterno</th>
									<th>Sexo</th>
									<th> Ver</th>
									<th> Editar </th>

								</tr>
							</thead>
							<tbody>
								@foreach($users as $persona)
									<tr>
										<td>{{$persona->nombres}}</td>
										<td>{{$persona->apellidos}}</td>
										<td>
													@if ("M" == $persona->sexo) Masculino @endif
													@if ("F" == $persona->sexo) Femenino @endif
													@if ("O" == $persona->sexo) Otro @endif
										</td>

										<td>
											<a href="{{asset('users')}}{{'/'.$persona->id}}"  class="btn btn-info btn-xs"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
										</td>
										<td>
												<a href="{{asset('users')}}{{'/'.$persona->id.'/edit'}}"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
