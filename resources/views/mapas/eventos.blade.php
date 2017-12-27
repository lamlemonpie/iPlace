@extends('layouts.app')
@section('title', 'Ver empresa')

@section('content')



<br><br><br>

  <div class="container">


    <div class="row">
      <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">

          <div id="map"></div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">

          <a type="button" onclick="getEventos()" class="btn btn-default">Radio de busqueda en kilometros</a>
          <input type="input" name="distancia" id="distancia" value=10>

        </div>
      </div>
    </div>
  </div>














  <script>
    // This sample uses the Place Autocomplete widget to allow the user to search
    // for and select a place. The sample then displays an info window containing
    // the place ID and other information about the place that the user has
    // selected.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">





    var eventos;




    var marker;
    var infoWindows;
    var markers = [];
    var ids;
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'));

      var pinColor = "FE7569";
      var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
          new google.maps.Size(21, 34),
          new google.maps.Point(0,0),
          new google.maps.Point(10, 34));
      var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
          new google.maps.Size(40, 37),
          new google.maps.Point(0, 0),
          new google.maps.Point(12, 35));


      marker = new google.maps.Marker({

        map: map,
        icon: pinImage,
        shadow: pinShadow
      });
      setTimeout(getEventos, 500);


    }
  </script>

  <script>
  function getEventos(){
    console.log("as");
    var result = "";
    var dist = document.getElementById("distancia").value;
    var u = '/ajaxEventos/'+c_latitud+'/'+c_longitud+'/'+dist;

    $.ajax(

      {
        url: u,
        type: 'get',
        dataType: 'json',
        success: function(data){
          console.log(c_latitud);
          map.setCenter({lat: c_latitud, lng: c_longitud});
          map.setZoom(13);
          marker.setPosition({lat: c_latitud, lng: c_longitud});
          function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
              markers[i].setMap(map);
            }
          }
            setMapOnAll(null);

            eventos = data;


            infoWindows = new Array(eventos.length);
            markers = new Array(eventos.length);
            ids = new Array(eventos.length);




            for(key in eventos){
              var NLatLng = {lat: eventos[key].ubicacion.latitud, lng: eventos[key].ubicacion.longitud};

              markers[key] = new google.maps.Marker({
                position: NLatLng,
                map: map

              });

              var dir = '{{asset('eventos/')}}';
              var contentString = '<div id="content">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">' + eventos[key].nombre + '</h1>'+
                    '<div id="bodyContent">'+
                    '<p><b> Ciudad: ' + eventos[key].ciudad + '</b>' +
                    '</p>'+
                    '<p><b> Dirección: ' + eventos[key].direccion + '</b>' +
                    '</p>'+
                    '<p><b> Descripción: ' + eventos[key].descripcion + '</b>' +
                    '</p>'+
                    '<p>Precio:    '+ eventos[key].precio +' , <a href="'+dir+'/'+eventos[key].id+'" ><font color="FF00CC">More info</font></a> '+

                    '</div>'+
                    '</div>';

              infoWindows[key] = new google.maps.InfoWindow({
                content: contentString
              });

              markers[key].title = key;

              markers[key].addListener('click', function() {
                for(p in infoWindows){
                  infoWindows[p].close();
                }
                infoWindows[Number(this.title)].open(map, this);

              });
            }

        }
      }





    );




  }
  </script>

  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEUDWClhcBHlakaF_9bQIzvEP5XwI-OcE&libraries=places&callback=initMap">
  </script>



@endsection('content')
