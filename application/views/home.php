<head>
    <style>
       #map {
        height: 650px;
        width: 70%;
        float:right;
       }
    </style>
  </head>
  <body>
    <!-- <h3>My Google Maps Demo</h3> -->
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
  </body>