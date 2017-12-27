@extends('layouts.app')

@section('content')

<div class="container">
<br><br><br>
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <div class="col-xs-7 col-md-7">
                    <div class="card">
                        <div class="container">
                            <h2><b id="id_nombre">{{$evento->nombre}}</b></h2>
                        </div>
                        <div class="card-image">
                            @if($evento->link_foto)
                              <div class="img">
                                  <img class="img-responsive" src="{{$evento->link_foto}}" id="img-preview"/>
                              </div>
                            @else
                            <div class="img">
                              <img src="/images/Library.jpg" id='img-preview' alt="" class=" img-responsive" />
                            </div>
                            @endif
                        </div><!-- card image -->
                        <div class="card-content">
                            <span class="card-title">Descripción del evento</span>
                            <p>{{$evento->descripcion}}</p>
                            <br>
                        </div><!-- card content -->
                    </div>


                    <div class="card">

                       <div class="card-content">

                        <span class="card-title">Asistentes</span>
                          <table class="table table-responsive">
                            <tr>
                              <td>


                                @foreach( $asistentes as $asistente)
                                <li> {{$asistente->nombres }} {{$asistente->apellidos }} </li>
                                @endforeach

                              </td>
                            </tr>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5">
                          <!--
                            <a href="https://www.facebook.com/bootsnipp"><i id="social-fb1" class="fa fa-facebook-square fa-3x social"></i></a>
                            <a href="https://twitter.com/bootsnipp"><i id="social-tw1" class="fa fa-twitter-square fa-3x social"></i></a>
                            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp1" class="fa fa-google-plus-square fa-3x social"></i></a>
                            <a href="mailto:bootsnipp@gmail.com"><i id="social-em1" class="fa fa-envelope-square fa-3x social"></i></a>
                          -->

                    @if($es_organizador)

                      <div class="card">
                        <div class="card-content">
                          <span class="card-title">¿Editar evento?</span><br><br>
                            <a href="{{asset('eventos/'.$evento->id.'/edit')}}" id="id_evento_editar" name="evento_editar" class=" btn-warning btn-lg">Editar Evento</a>

                        </div>
                      </div>
                    @endif

                    @if(is_null($es_organizador))
                    <div class="card">
                        <div class="card-content">
                          <span class="card-title">¿Asistir a evento?</span>
                                @if($usuario_evento)
                                  <h1><span class="label label-success" id="id_precio">Usted ya es asistente</span></h1>
                                  <a href="{{asset('eventos/'.$evento->id.'/cancelar')}}" id="id_evento_cancelar" name="evento_cancelar" class=" btn-warning btn-lg">Cancelar</a>
                                @else
                                    @if($evento->precio == 0)
                                      <a href="{{asset('eventos/'.$evento->id.'/asistir')}}" id="id_evento_asistir_gratuito" name="evento_asistir_gratuito" class=" btn-warning btn-lg">Asistir a este evento</a>
                                    @else
                                      <br><br><a href="#" id="id_evento_asistir" name="evento_asistir" class=" btn-warning btn-md btn-lg">Asistir a este evento</a>
                                      <br><br>
                                      Acepto los términos y condiciones <a href="#"> </a> <input type="checkbox" id="check"/>
                                    @endif
                                @endif
                        </div>
                    </div>
                    @endif

                    <div class="card">
                      <div class="card-content">
                          <span class="card-title">Precio</span>
                            @if( $evento->precio == 0)
                              <!--<a  name="evento_precio" id="id_evento_precio" class="btn-primary btn-lg disabled" role="button" aria-disabled="true">Gratuito</a>-->
                              <h1><span class="label label-info">Gratuito</span></h1>
                            @else
                              <!--<a  name="evento_precio" id="id_evento_precio" class="btn-info btn-lg disabled" aria-disabled="true">S/. {{$evento->precio}}</a>-->
                              <h1><span class="label label-info" id="id_precio">S/. {{$evento->precio}}</span></h1>
                            @endif
                      </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                          <span class="card-title">Información</span> <br><br>
                            <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Fecha de Inicio: <?php $fechaInicio = new DateTime($evento->fecha_inicio); echo $fechaInicio->format('d/m/Y'); ?></p>
                            <p class="card-text"><i class="glyphicon glyphicon-time"></i> Hora de Inicio: <?php $horaInicio = new DateTime($evento->fecha_inicio); echo $horaInicio->format('H:i'); ?></p><br>
                            <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Fecha de Finalización: <?php $fechaFin = new DateTime($evento->fecha_fin); echo $fechaFin->format('d/m/Y'); ?></p>
                            <p class="card-text"><i class="glyphicon glyphicon-time"></i> Hora de Finalización: <?php $horaFin = new DateTime($evento->fecha_fin); echo $horaFin->format('H:i'); ?></p><br>
                            <p class="card-text"><i class="glyphicon glyphicon-book"></i> Categoría: @foreach ($categorias as $categoria) {{$categoria->nombre}}  @endforeach</p>
                        </div><!-- card content -->
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Ubicación</span><br><br>
                            <p class="card-text"><i class="glyphicon glyphicon-plane"></i> {{$evento->ciudad}}</p>
                            <p class="card-text"><i class="glyphicon glyphicon-map-marker"></i> {{$evento->direccion}}</p>
                            <p class="card-text"><i> {{$evento->referencia}}</i></p>
                            <div class="embed-responsive embed-responsive-16by9">
                                <div id="map" style="  height: 250px; width: 100%;"></div>


                                <div id="infowindow-content">
                                  <span id="place-name"  class="title"></span><br>
                                  <span id="place-id"></span><br>
                                  <span id="place-address"></span>
                                </div>


                                      <script>
                                        var datos = {!! json_encode($ubicacion->toArray()) !!}
                                        var latitud = datos["latitud"];
                                        var longitud = datos["longitud"];
                                        // var latitud = 17.866666634;
                                        //var longitud = -71.13141516;
                                        var id = datos["id_maps"];

                                        var LatLng = {lat: latitud, lng: longitud};


                                        var map;
                                        function initMap() {
                                          map = new google.maps.Map(document.getElementById('map'), {
                                            center: LatLng,
                                            zoom: 14
                                          });
                                          var secretMessages = "secret message";
                                          var infowindow = new google.maps.InfoWindow();

                                          var marker = new google.maps.Marker({
                                            position: LatLng,
                                            map: map


                                          });





                                          marker.addListener('click', function() {
                                            infowindow.open(map, marker);
                                          });

                                          var request = {
                                            placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
                                          };

                                          service = new google.maps.places.PlacesService(map);
                                          service.getDetails(request, callback);

                                          function callback(place, status) {
                                            infowindow.close();
                                            if (status == google.maps.places.PlacesServiceStatus.OK) {
                                              document.getElementById('place-name').textContent = place.name;
                                              document.getElementById('place-id').textContent = place.place_id;
                                              document.getElementById('place-address').textContent =
                                                  place.formatted_address;
                                              infowindow.setContent(document.getElementById('infowindow-content'));
                                              infowindow.open(map, marker);

                                            }
                                          }





                                        }
                                      </script>
                                      <script async defer
                                      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEUDWClhcBHlakaF_9bQIzvEP5XwI-OcE&libraries=places&callback=initMap">
                                      </script>
















                            </div><!-- card content -->
                        </div>


                    @if ($evento->link_youtube)
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Video</span><br><br>
                                <div class="embed-responsive embed-responsive-16by9" >
                                <iframe class="embed-responsive-item"  src="{{$evento->link_youtube}}"></iframe>
                                </div>
                        </div><!-- card content -->
                    </div>
                    @endif
                </div>
            </div>
        </div>

      </div>
  </div>
</div>

<style type="text/css">

.card{
    background-color: #FFF;
    margin-top: 10px;
    position: relative;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    box-shadow: 4 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
    padding: 20px;
}

.card .card-content .card-title, .card-reveal .card-title{
    font-size: 24px;
    font-weight: 200;
}

.card .card-action{
    padding: 20px;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
}

.card .card-image{
    overflow: hidden;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
}

.card .card-image img{
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.card .card-image:hover img{
    -webkit-transform: scale(1.2) rotate(-7deg);
    -moz-transform: scale(1.2) rotate(-7deg);
    -ms-transform: scale(1.2) rotate(-7deg);
    -o-transform: scale(1.2) rotate(-7deg);
    transform: scale(1.2) rotate(-7deg);
}

 #social-fb1 {
     color: #000;
 }
 #social-tw1 {
     color: #000;
 }
 #social-gp1 {
     color: #000;
 }
 #social-em1 {
     color: #000;
 }
 #social-fb1:hover {
     color: #3B5998;
 }
 #social-tw1:hover {
     color: #4099FF;
 }
 #social-gp1:hover {
     color: #d34836;
 }
 #social-em1:hover {
     color: #f39c12;
 }

</style>

<script src="https://integ-pago.culqi.com/js/v1"></script>

<script>
      //Culqi.codigoComercio = '4s4cv6LfyqNI';
      Culqi.codigoComercio = 'pk_test_TEQAToWbdZMlNCYf';
      Culqi.configurar({
          nombre: 'iPlace',
          orden: '{{$evento->id}}',
          moneda: 'PEN',
          descripcion: '{{$evento->nombre}}',
          monto: {{$evento->precio*100.00}},
          guardar:false
      });
  </script>

  <script>

      $('#id_evento_asistir').on('click', function (e) {

          if($("#check").is(':checked')){
              // Abre el formulario con las opciones de Culqi.configurar
              Culqi.abrir();
              e.preventDefault();
          }else{
              alert('Acepta los terminos y condiciones.')
          }

          });
  </script>

  <script>
  // Ejemplo: Tratando respuesta con AJAX (jQuery)
  function culqi() {

      if(Culqi.error){
         // Mostramos JSON de objeto error en consola
         console.log(Culqi.error);

         alert("Culqi.error.mensaje");
      }
      else{
         console.log(Culqi.token.id);
         var parametros = {
             token: Culqi.token.id,
             id_evento:{{$evento->id}},
             '_token': '{{ csrf_token() }}'
         };
         console.log(parametros);
         $.ajax(

           {
             url:" {{asset('/pagos/tarjeta')}} ",
             type: 'POST',
             data : parametros,
             datatype: 'json',
             success: function(data, status){
                 data=JSON.parse(data); //convertir data json a objeto js

                 console.log(data);

                 if(data.objeto=="cargo"){
                     alert("Cargo realizado exitosamente");
                     asistir({{$evento->id}});

                 }
                 else{

                     console.log(data);
                     alert(data.mensaje_usuario);
                 }


             }
           }

         );

         }
  };
  </script>

<script>

function asistir(id)
{
  var dir = "/eventos/" + id + "/confirmarAsistencia";
  var parametros ={
    '_token': '{{ csrf_token() }}'
  };
  $.ajax(

    {
      url: dir,
      type: "POST",
      data:parametros,
      success: function(data){
        console.log(data)
        if (data == "refresh"){

            window.location.reload(); // This is not jQuery but simple plain ol' JS
        }
      }
    }

  );

}

</script>

@endsection
