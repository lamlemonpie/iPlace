@extends('layouts.app')
@section('title', 'Solicitudes Recibidas')

@section('content')

<div class="container">
  <br><br> <br>
  	<div class="row">
	    <div class="col-xs-1 col-sm-1 col-md-1"></div>
	    <div class="col-xs-10 col-sm-10 col-md-10 well well-sm">

			<legend><b>Solicitudes Recibidas</b></legend>

			<div class="tablaEmpresas table-responsive">
				<div class="tablaempresa col-sm-12">
						<table class="table col-sm-12">
							<thead>
								<tr>
									<th> De (Persona): </th>
									<th> Para (Empresa): </th>
                  <th> Estado: </th>
									<th> Aceptar </th>
									<th> Rechazar </th>
									<th> Ver </th>

								</tr>
							</thead>
							<tbody>
								@foreach($solicitudes as $solicitud)
									<tr>
										<td>{{$solicitud->usuario_solicitante->nombres}} {{$solicitud->usuario_solicitante->apellidos}}</td>
										<td>{{$solicitud->empresa->nombre}}</td>
                    <td> @if($solicitud->aceptado == True)
                          Aceptado
                      @else
                          Espera Confirmación
                      @endif  </td>
                        @if($solicitud->aceptado == False)
                        <td>
                          <a type="button" onclick="aceptarSolicitud({{$solicitud->id}})" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-ok"></span>
                          </a>
                        </td>
                        <td>
                          <a href="{{asset('solicituds')}}" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-remove"></span>
                          </a>
                        </td>
                        <td>
                          <a href="{{asset('solicituds/'.$solicitud->id)}}" class="btn btn-warning btn-xs">
                            <span class="glyphicon glyphicon-eye-open"></span>
                          </a>
                        </td>

                        @else
                          <td> </td>
                          <td> </td>
                          <td>
                            <a href="{{asset('solicituds/'.$solicitud->id)}}" class="btn btn-warning btn-xs">
                              <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                          </td>
                        @endif
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


<script>

function aceptarSolicitud(solicitud){

  var direccion = "{{asset('solicituds')}}"+ "/" + solicitud + "/accept";
  console.log(direccion);
  $.ajax(

    {
      url:direccion,
      type: 'POST',
      data : {'_token': '{{ csrf_token() }}'},
      success: function(data){
          console.log(data);
          $(".tablaEmpresas").load("{{asset('solicituds/')}}");
      }
    }

  );

}

</script>

@endsection('content')
