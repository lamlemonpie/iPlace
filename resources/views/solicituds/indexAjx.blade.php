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
