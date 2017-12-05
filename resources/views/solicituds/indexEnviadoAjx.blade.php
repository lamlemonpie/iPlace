<table class="table col-sm-12">
  <thead>
    <tr>
      <th> Hacia (Empresa): </th>
      <th> Organizador (Persona): </th>
      <th> Estado: </th>
      <th> Ver </th>
      <th> Cancelar </th>


    </tr>
  </thead>
  <tbody>
    @foreach($solicitudes as $solicitud)
      <tr>
        <td>{{$solicitud->empresa->nombre}}</td>
        <td>{{$solicitud->organizador_propietario->usuario->nombres}} {{$solicitud->organizador_propietario->usuario->apellidos}}</td>

          @if($solicitud->aceptado == True)
            <td> Aceptado </td>
            <td>
              <a href="{{asset('solicituds/'.$solicitud->id)}}" class="btn btn-warning btn-xs">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>
            @else
            <td>Esperando Confirmación</td>
            <td>
              <a href="{{asset('solicituds/'.$solicitud->id)}}" class="btn btn-warning btn-xs">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>
            <td>
              <a type="button" onclick="eliminarSolicitud({{$solicitud->id}})" class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-remove"></span>
              </a>
            </td>
          @endif


      </tr>
    @endforeach
  </tbody>
</table>
