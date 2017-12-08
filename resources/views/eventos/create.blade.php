@extends('layouts.app')

@section('content')

<div class="container">
<br><br><br>

    <form class="form-horizontal" role="form" method="POST" action="{{asset('eventos')}}">
                    {{ csrf_field() }}

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend><b>Detalles del Evento</b></legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Nombre del evento</label>
                        <input class="form-control" name="eventName" placeholder="Nombre del evento" type="text" /><br>
                    <label for="">Elije una categoria</label>
                        <select class="form-control" name="id_categoria">
                          @foreach ($categorias as $categoria)
                          <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                          @endforeach
                        </select><br>
                    <label for="">Descripción del evento</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4" cols="14" required="required" placeholder="Escriba aquí la descripción del evento"></textarea><br>
                    <label>Fecha de inicio</label><br>
                        <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" onfocusout="setFinMin($('#fecha_inicio').val())" min="<?php echo date('Y-m-d\TH:i') ?>" required>
                    <label>Fecha de finalización</label><br>
                        <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" min = "<?php echo date('Y-m-d\TH:i') ?>" required> 
                </div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Información adicional</label>
                        <textarea name="adicional" id="id_adicional" class="form-control" rows="8" cols="14" required="required" placeholder="Escriba aquí la Información adicional del evento"></textarea><br>
                    <label for="">Video</label>
                        <input class="form-control" name="link_video" placeholder="Link de Youtube" type="text" /><br>
                    <label for="">Empresa organizadora</label>
                        <select class="form-control" id="id_empresa" name="id_empresa">
                            @foreach ($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend><b>Ubicación</b></legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Ciudad</label>
                        <select class="form-control" name="ciudad">
                            <option value="Ciudad">Ciudad</option>
                        </select><br>
                    <label for="">Dirección</label>
                        <input class="form-control" name="direccion" placeholder="Dirección donde será el evento" type="text" /><br>
                    <label for="">Referencia</label>
                        <input class="form-control" name="referencia" placeholder="Ej. A 3 cuadras de la UNSA" type="text" /><br>
                    
                </div>
                <div class="col-xs-5 col-md-5">
                  <input type="hidden" id="long" name="longitud" value=""/>
                  <input type="hidden" id="lat" name="latitud" value=""/>
                  
                  <div id="floating-panel">
                    <input id="address" type="textbox" value="Sydney, NSW">
                    <input id="submit" type="button" value="Geocode">
                    
                  </div>

                  <div id="map"></div>

                    <script>
                      // Note: This example requires that you consent to location sharing when
                      // prompted by your browser. If you see the error "The Geolocation service
                      // failed.", it means you probably did not give permission for the browser to
                      // locate you.

                      function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                          center: {lat: -34.397, lng: 150.644},
                          zoom: 14
                          
                        });
                        
                        var longitud = document.getElementById("long");
                        var latitud = document.getElementById("lat");
                        latitud.value = -34.397;
                        longitud.value = 150.644;
                        
                        var geocoder = new google.maps.Geocoder();

                        document.getElementById('submit').addEventListener('click', function() {
                          geocodeAddress(geocoder, map);
                        });
                        
                        var infoWindow = new google.maps.InfoWindow({map: map});
                        var marker = new google.maps.Marker({
                          position: map.getCenter(),
                          map: map
                        });
                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                          navigator.geolocation.getCurrentPosition(function(position) {
                            var pos = {
                              lat: position.coords.latitude,
                              lng: position.coords.longitude
                            };
                            latitud.value = position.coords.latitude;
                            longitud.value = position.coords.longitude;
                            infoWindow.setPosition(pos);
                            infoWindow.setContent('Location found.');
                            map.setCenter(pos);
                            marker.setPosition(pos);
                          }, function() {
                            handleLocationError(true, infoWindow, map.getCenter());
                          });
                        } else {
                          // Browser doesn't support Geolocation
                          handleLocationError(false, infoWindow, map.getCenter());
                        }
                        
                        google.maps.event.addListener(map, 'dblclick', function(e) {
                          var positionDoubleclick = e.latLng;
                          marker.setPosition(positionDoubleclick);
                          var longitud = document.getElementById("long");
                          var latitud = document.getElementById("lat");
                          latitud.value = e.latLng.lat();
                          longitud.value = e.latLng.lng();
                          // if you don't do this, the map will zoom in
                          e.stopPropagation();
                        });
                        
                      }

                      


                      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                        infoWindow.setPosition(pos);
                        infoWindow.setContent(browserHasGeolocation ?
                                              'Error: The Geolocation service failed.' :
                                              'Error: Your browser doesn\'t support geolocation.');
                      }
                      
                      
                      function geocodeAddress(geocoder, resultsMap) {
                       var address = document.getElementById('address').value;
                       geocoder.geocode({'address': address}, function(results, status) {
                         if (status === 'OK') {
                           resultsMap.setCenter(results[0].geometry.location);
                           //markers[0].setPosition(results[0].geometry.location);
                         } else {
                           alert('Geocode was not successful for the following reason: ' + status);
                         }
                       });
                     }
                    </script>
                    
                    
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEUDWClhcBHlakaF_9bQIzvEP5XwI-OcE&callback=initMap">
                    </script>


                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend><b>Precios</b></legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Tipo de moneda</label>
                        <select class="form-control" name="categoria">
                            <option value="Soles" selected="selected">Soles</option>
                        </select><br>
                </div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Precio</label>
                        <input class="form-control" name="precio" placeholder="00.0" type="text" /><br>
                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-md-8"></div>
            <div class="col-xs-4 col-md-4">
            <button type="submit" class="btn btn-info btn-success btn-lg btn-block">Crear Evento</button><br></div>
        </div>

    </div>

    </form>
</div>

<style type="text/css">
    .well{
        background-color: rgb(248, 248, 248);
        }
</style>

<script>
    function setFinMin(fecha_inicio)
    {
        document.getElementById('fecha_fin').setAttribute("min", fecha_inicio);
    }
</script>

@endsection
