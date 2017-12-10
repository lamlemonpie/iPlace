@extends('layouts.app')
@section('title', 'Ver pagos')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-1 col-sm-1 col-md-1"></div>
	    <div class="col-xs-10 col-sm-10 col-md-10 well well-sm">

			<legend><b>Ver Pagos</b></legend>

			<div class="tablaPagos table-responsive">
				<div class="tablapagos col-sm-12">
					<table class="table col-sm-12">
							<thead>
								<tr>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>Fecha de Pago</th>
									<th>Monto</th>

								</tr>
							</thead>
							<tbody>
								
									<tr>
										<td>{$persona->nombres}</td>
										<td>{$persona->apellidos}</td>
										<td>
											{$persona->fecha_pago}
										</td>
										<td>
											{$persona->monto}
										 </td>

									</tr>
								
							</tbody>
						</table>
				</div>

			</div>
		</div>
	</div>
	<br><br><br>
</div>

@endsection('content')