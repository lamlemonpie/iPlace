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
                            <h2><b>{{$evento->nombre}}</b></h2>
                        </div>
                        <div class="card-image">
                            <a href="{{asset('#')}}" title=""><img src="../images/Fondo1.jpg" class="img-responsive"></a>
                        </div><!-- card image -->
                        <div class="card-content">
                            <span class="card-title">Descripción del evento</span>
                            <p>{{$evento->descripcion}}</p>
                            <br>
                        </div><!-- card content -->
                    </div>
                </div>
                <div class="col-xs-5 col-md-5">
                    <div class="card">
                        <div class="container"></div>
                        <div class="card-content">
                            <a href="https://www.facebook.com/bootsnipp"><i id="social-fb1" class="fa fa-facebook-square fa-3x social"></i></a>
                            <a href="https://twitter.com/bootsnipp"><i id="social-tw1" class="fa fa-twitter-square fa-3x social"></i></a>
                            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp1" class="fa fa-google-plus-square fa-3x social"></i></a>
                            <a href="mailto:bootsnipp@gmail.com"><i id="social-em1" class="fa fa-envelope-square fa-3x social"></i></a>
                            <font size="5">&ensp; Redes Sociales</font>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Fecha de Inicio: <?php $fechaInicio = new DateTime($evento->fecha_inicio); echo $fechaInicio->format('d/m/Y'); ?></p>
                            <p class="card-text"><i class="glyphicon glyphicon-time"></i> Hora de Inicio: <?php $horaInicio = new DateTime($evento->fecha_inicio); echo $horaInicio->format('H:i'); ?></p><br>
                            <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Fecha de Finalización: <?php $fechaFin = new DateTime($evento->fecha_fin); echo $fechaFin->format('d/m/Y'); ?></p>
                            <p class="card-text"><i class="glyphicon glyphicon-time"></i> Hora de Finalización: <?php $horaFin = new DateTime($evento->fecha_fin); echo $horaFin->format('H:i'); ?></p><br>
                            <p class="card-text"><i class="glyphicon glyphicon-tags"></i> Categoría: @foreach ($categorias as $categoria) {{$categoria->nombre}}  @endforeach</p>
                        </div><!-- card content -->
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Ubicación</span><br><br>
                            <p class="card-text"><i class="glyphicon glyphicon-plane"></i> {{$evento->ciudad}}</p>
                            <p class="card-text"><i class="glyphicon glyphicon-map-marker"></i> {{$evento->direccion}}</p>
                            <p class="card-text"><i> {{$evento->referencia}}</i></p>
                            <div class="embed-responsive embed-responsive-16by9">
                                <div id="map"></div>
                                
                                <div id="infowindow-content">
                                  <span id="place-name"  class="title"></span><br>
                                  <span id="place-id"></span><br>
                                  <span id="place-address"></span>
                                </div>  
                                
                                
                                
                                
                                      <script>
                                        var datos = {!! json_encode($ubicacion->toArray()) !!}
                                        var latitud = datos["latitud"];
                                        var longitud = datos["longitud"];
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

@endsection
