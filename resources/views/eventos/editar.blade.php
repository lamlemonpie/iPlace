@extends('layouts.app')
@section('title', 'Editar Evento')
@section('content')

<div class="container">
<br><br><br>

    <form class="form-horizontal" role="form" method="POST" action="{{asset('eventos/'.$evento->id)}}">
      <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

    <div class="row">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend><b>Detalles del Evento</b></legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-4 col-md-4">

                    <div class="text-center">
                      <img class="img-responsive" src="{{$evento->link_foto}}" id="img-preview" />
                    </div>
                    <input type="hidden" name="link_foto" id="link_foto" value="{{$evento->link_foto}}">
                    <br>
                    <label class="file-upload-container" for="file-upload">
                      <input class="file-upload-container" id="file-upload" type="file" style="display:none;">
                      Seleccione imagen
                    </label><br><br>

                    
                    <label>Fecha de inicio <FONT COLOR="red">*</FONT> </label><br>
                        <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" onfocusout="setFinMin($('#fecha_inicio').val())" value="<?php echo date_format(date_create($evento->fecha_inicio),'Y-m-d\TH:i') ?>" min="<?php echo date('Y-m-d\TH:i') ?>" required>

                    <br>
                    <label>Fecha de finalización <FONT COLOR="red">*</FONT> </label><br>
                        <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" min = "<?php echo date('Y-m-d\TH:i') ?>" value="<?php echo date_format(date_create($evento->fecha_fin),'Y-m-d\TH:i') ?>"  required>
                    <br>
                    <label for="">Empresa organizadora <FONT COLOR="red">*</FONT></label>
                        <select class="form-control" id="id_empresa" name="id_empresa">
                            @foreach ($empresas as $empresa)
                              <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                            @endforeach
                        </select>
                    <br>
                </div>
                <div class="col-xs-6 col-md-6">

                    <label for="">Nombre del evento <FONT COLOR="red">*</FONT> </label>
                        <input class="form-control" name="eventName" value="{{$evento->nombre}}" type="text"  required/><br>
                    <label for="">Elije una categoria <FONT COLOR="red">*</FONT> </label>
                        <select class="form-control" name="id_categoria">
                          @foreach ($categorias as $categoria)
                          <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                          @endforeach
                        </select><br>
                    <label for="">Descripción del evento <FONT COLOR="red">*</FONT> </label>
                        <!--<input class="form-control" id="descripcion" name="descripcion" value="{{$evento->descripcion}}" type="text"  required/><br>-->
                        <textarea class="form-control" id="descripcion" name="descripcion" type="text" rows="4" type="text"  required>{{$evento->descripcion}} </textarea> <br>

                    <label for="">Información adicional</label>
                        <textarea name="adicional" id="id_adicional" class="form-control" rows="8" cols="14" required="required">{{$evento->info_adicional}}</textarea><br>
                    <label for="">Video</label>
                        <input class="form-control" name="link_video" value="{{$evento->link_youtube}}"" type="text" /><br>
                    <FONT COLOR="red">  * Campos obligatorios </FONT>
                </div>
                <div class="col-xs-1 col-md-1"></div>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend><b>Ubicación</b></legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Ciudad <FONT COLOR="red">*</FONT></label>
                        <select class="form-control" name="ciudad">
                            <option value="{{$evento->ciudad}}">{{$evento->ciudad}}</option>
                            <option value="Amazonas">Amazonas</option>
                            <option value="Áncash">Áncash</option>
                            <option value="Apurímac">Apurímac</option>
                            <option value="Arequipa">Arequipa</option>
                            <option value="Ayacucho">Ayacucho</option>
                            <option value="Cajamarca">Cajamarca</option>
                            <option value="Callao">Callao</option>
                            <option value="Cuzco">Cuzco</option>
                            <option value="Huancavelica">Huancavelica</option>
                            <option value="Huánuco">Huánuco</option>
                            <option value="Ica">Ica</option>
                            <option value="Junín">Junín</option>
                            <option value="La Libertad">La Libertad</option>
                            <option value="Lambayeque">Lambayeque</option>
                            <option value="Lima">Lima</option>
                            <option value="Loreto">Loreto</option>
                            <option value="Madre de Dios">Madre de Dios</option>
                            <option value="Moquegua">Moquegua</option>
                            <option value="Pasco">Pasco</option>
                            <option value="Piura">Piura</option>
                            <option value="Puno">Puno</option>
                            <option value="San Martín">San Martín</option>
                            <option value="Tacna">Tacna</option>
                            <option value="Tumbes">Tumbes</option>
                            <option value="Ucayali">Ucayali</option>
                        </select><br>
                    <label for="">Dirección <FONT COLOR="red">*</FONT> </label>
                        <input class="form-control" name="direccion" value="{{$evento->direccion}}" type="text" required /><br>
                    <label for="">Referencia</label>
                        <input class="form-control" name="referencia" value="{{$evento->referencia}}" type="text" /><br>

                    <FONT COLOR="red">  * Campos obligatorios </FONT>
                </div>
                <div class="col-xs-5 col-md-5">
                  <input type="hidden" id="long" name="longitud" value=""/>
                  <input type="hidden" id="lat" name="latitud" value=""/>
                  <input type="hidden" id="id" name="id" value=""/>

                  <div id="floating-panel">
                    <input id="address" type="text"  class="controls" placeholder="Enter a location">

                  </div>


                  <div id="infowindow-content">
                    <span id="place-name"  class="title"></span><br>
                    Place ID <span id="place-id"></span><br>
                    <span id="place-address"></span>
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
                          zoom: 14,
                          disableDoubleClickZoom: true

                        });

                        var longitud = document.getElementById("long");
                        var latitud = document.getElementById("lat");
                        var id = document.getElementById("id");
                        latitud.value = -34.397;
                        longitud.value = 150.644;
                        id.value = "undefined";
                        var input = document.getElementById('address');


                        var autocomplete = new google.maps.places.Autocomplete(input);
                        autocomplete.bindTo('bounds', map);
                        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);





                        var infowindow = new google.maps.InfoWindow();
                        var marker = new google.maps.Marker({
                          position: map.getCenter(),
                          map: map,
                          draggable: true
                        });






                        autocomplete.addListener('place_changed', function() {
                          infowindow.close();
                          var place = autocomplete.getPlace();
                          if (!place.geometry) {
                            return;
                          }

                          if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                          } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);
                          }


                          marker.setPosition(place.geometry.location);



                          document.getElementById('place-name').textContent = place.name;
                          document.getElementById('place-id').textContent = place.place_id;
                          //console.log(place.name);
                          document.getElementById('place-address').textContent =
                              place.formatted_address;
                          infowindow.setContent(document.getElementById('infowindow-content'));
                          infowindow.open(map, marker);
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
                            //infoWindow.setPosition(pos);
                            //infoWindow.setContent('Location found.');
                            map.setCenter(pos);
                            marker.setPosition(pos);
                          }, function() {
                            handleLocationError(true, infoWindow, map.getCenter());
                          });
                        } else {
                          // Browser doesn't support Geolocation
                          handleLocationError(false, infoWindow, map.getCenter());
                        }

                        google.maps.event.addListener(map, 'click', function(e) {

                          var positionDoubleclick = e.latLng;
                          marker.setPosition(positionDoubleclick);
                          var longitud = document.getElementById("long");
                          var latitud = document.getElementById("lat");
                          latitud.value = e.latLng.lat();
                          longitud.value = e.latLng.lng();
                          id.value = e.placeId;

                          // if you don't do this, the map will zoom in
                          //e.stopPropagation();



                        });

                      }

                      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                        infoWindow.setPosition(pos);
                        infoWindow.setContent(browserHasGeolocation ?
                                              'Error: The Geolocation service failed.' :
                                              'Error: Your browser doesn\'t support geolocation.');
                      }



                    </script>


                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEUDWClhcBHlakaF_9bQIzvEP5XwI-OcE&libraries=places&callback=initMap">
                    </script>


                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend><b>Precios </b></legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Tipo de moneda</label>
                        <select class="form-control" name="categoria">
                            <option value="Soles" selected="selected">Soles</option>
                        </select><br>
                </div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Precio </label>
                        <input class="form-control" name="precio" value="{{$evento->precio}}" type="text" required/><br>
                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-md-8"></div>
            <div class="col-xs-4 col-md-4">
            <button type="submit" class="btn btn-info btn-success btn-lg btn-block">Editar Evento</button><br></div>
        </div>

    </div>

    </form>
</div>

<script src="/js/upload.js"></script>

<style type="text/css">
    .well{
        background-color: rgb(248, 248, 248);
        }
    .file-upload-container {
      width: 100%;
      height: 50px;
      overflow: hidden;
      background: #80bfff;
      user-select: none;
      transition: all 150ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;
      text-align: center;
      color: white;
      line-height: 50px;
      font-weight: 300;
      font-size: 20px;
    }

    .file-upload-container:hover {
      cursor: pointer;
      background: #4da6ff;
    }
</style>

<script>
    function setFinMin(fecha_inicio)
    {
        document.getElementById('fecha_fin').setAttribute("min", fecha_inicio);
    }

</script>

@endsection
