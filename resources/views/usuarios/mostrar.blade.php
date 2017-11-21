@extends('layouts.app')
@section('title', 'Mostrar Usuario')

@section('content')


<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

        <div class="panel-heading">
                 <div class="panel-title text-center">
                    <h1 class="title">Perfil de Usuario</h1>
                    <br>
                  </div>
              </div> 

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{usuario->nombre}</h3>
            </div>
            <div class="panel-body">
              <div class="row">

              <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td>{usuario->nombre}</td>
                      </tr>
                      <tr>
                        <td>Apellidos:</td>
                        <td>{usuario->apellidos}</td>
                      </tr>
                      <tr>
                        <td>Genero:</td>
                        <td>{usuario->genero}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>info@support.com</td>
                     
                    </tbody>
                  </table>
              </div>
            </div>
        </div>
      </div>

</div>

@endsection('content')
