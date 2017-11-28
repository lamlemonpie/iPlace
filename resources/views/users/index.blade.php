@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')

<br><br><br>


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
									<a href="{{asset('users')}}{{'/'.$persona->id}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
							</td>
							<td>
									<a href="{{asset('users')}}{{'/'.$persona->id.'/edit'}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							 </td>

						</tr>
					@endforeach
				</tbody>
			</table>
	</div>

</div>



<br><br><br>
@endsection('content')
