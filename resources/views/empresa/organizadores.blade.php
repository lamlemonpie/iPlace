<table class="table col-sm-12">
<thead>
  <tr>
    <th> Nombre: </th>
    <th> Eliminar </th>
  </tr>
</thead>
<tbody>
    @foreach($organizadores as $organizador)
    <tr>
                <td>{{$organizador->organizador->usuario->nombres}} {{$organizador->organizador->usuario->apellidos}}</td>
        <td>
          <a type="button" onclick="eliminarOrganizador({{$empresa->id}},{{$organizador->organizador->id}})" class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-remove"></span>
          </a>
        </td>
    </tr>
        @endforeach
</tbody>
</table>
