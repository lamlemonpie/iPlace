@extends('layouts.app')
@section('content')


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


@endsection


