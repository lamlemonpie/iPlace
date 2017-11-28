@extends('layouts.app')
@section('title', 'Mis Empresas')

@section('content')

<br><br><br>

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
									<a href="{{asset('empresas')}}{{'/'.$empresa->id}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
							</td>
							<td>
									<a href="{{asset('empresas')}}{{'/'.$empresa->id.'/edit'}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							 </td>

						</tr>
					@endforeach
				</tbody>
			</table>
	</div>

</div>



<br><br><br>
@endsection('content')
