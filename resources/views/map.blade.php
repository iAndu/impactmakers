<html>
  <head>
    <title>Custom Markers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(44.430575, 26.100955),
          mapTypeId: 'roadmap'
        });

        var iconBase = "/icons/";
        /*var icons = {
          university: {
            icon: iconBase + 'university.png'
          },
        };*/

        //Create markers
        @foreach($institutions as $institution)
            var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{ $institution->lat }} , {{ $institution->lng }}),
            icon: iconBase + '{{ $institution->type->badge }}',
            map: map
          });
        @endforeach
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI2EpvQc_HdFPc12TQTigdfE61gdjkEM8  &callback=initMap">
    </script>
  </body>
</html>