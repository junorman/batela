<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Google Maps Multiple Marker(Pins) Javascript - Laratutorials.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row">
  <div class="col-12">
   <div class="alert alert-success"><h2>Add Multiple Marker(Pins) Google Maps Javascript</h2>
   </div>
   <div id="map_wrapper_div">
    <div id="map_tuts"></div>
   </div>
  </div>
</div>
</body>
</html>

<style>
.container{
  padding: 2%;
  text-align: center;
 } 
 #map_wrapper_div {
  height: 400px;
}
#map_tuts {
    width: 100%;
    height: 100%;
}
</style>

<script>
  jQuery(function($) {
// Asynchronously Load the map API 
var script = document.createElement('script');
script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
document.body.appendChild(script);
});
</script>

<script>
jQuery(function($) {
// Asynchronously Load the map API 
var script = document.createElement('script');
script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
document.body.appendChild(script);
});
function initialize() {
var map;
var bounds = new google.maps.LatLngBounds();
var mapOptions = {
     mapTypeId: 'roadmap'
};
                
// Display a map on the page
map = new google.maps.Map(document.getElementById("map_tuts"), mapOptions);
map.setTilt(45);
    
// Multiple Markers
var markers = [
  ['Mumbai', 19.0760,72.8777],
  ['Pune', 18.5204,73.8567],
  ['Bhopal ', 23.2599,77.4126],
  ['Agra', 27.1767,78.0081],
  ['Delhi', 28.7041,77.1025],
];
                    
// Info Window Content
var infoWindowContent = [
    ['<div class="info_content">' +
    '<h3>Mumbai</h3>' +
    '<p>Lorem Ipsum  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>' +'</div>'],
    ['<div class="info_content">' +
    '<h3>Pune</h3>' +
    '<p>Lorem Ipsum  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>' +'</div>'],
    ['<div class="info_content">' +
    '<h3>Bhopal</h3>' +
    '<p>Lorem Ipsum  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>' +'</div>'],  
    ['<div class="info_content">' +
    '<h3>Agra</h3>' +
    '<p>Lorem Ipsum  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>' +'</div>'],
    ['<div class="info_content">' +
    '<h3>Delhi</h3>' +
    '<p>Lorem Ipsum  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>' +'</div>'],
];
    
// Display multiple markers on a map
var infoWindow = new google.maps.InfoWindow(), marker, i;
// Loop through our array of markers & place each one on the map  
for( i = 0; i < markers.length; i++ ) {
    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
    bounds.extend(position);
    marker = new google.maps.Marker({
        position: position,
        map: map,
        title: markers[i][0]
    });
    
    // Each marker to have an info window    
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infoWindow.setContent(infoWindowContent[i][0]);
            infoWindow.open(map, marker);
        }
    })(marker, i));
    // Automatically center the map fitting all markers on the screen
    map.fitBounds(bounds);
}
// Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
    this.setZoom(5);
    google.maps.event.removeListener(boundsListener);
});
}
</script> 