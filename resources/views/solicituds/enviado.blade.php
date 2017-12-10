@extends('layouts.app')
@section('title', 'Solicitudes Enviadas')

@section('content')

<br><br><br>
 <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Solicitud Enviada</div>
            <div class="panel-body">
                Tu solicitud fue correctamente enviada a:
                <p>{{$admin->nombres}} {{$admin->apellidos}}</p>
            </div>
        </div>
    </div>
</div>
<br><br><br>

@endsection('content')
