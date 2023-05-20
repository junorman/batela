<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

Here is the java script.

<div id="map_canvas" style="width:500px;height:380px;"></div>
<script type="text/javascript"
            src="http://maps.google.com/maps/api/js?sensor=true">
    </script>


    <script>

      


        window.onload = function WindowLoad(event) {
        	const myLatlng = { lat: 0.3699982667531344, lng: 9.47995563640294 };
            //var myLatlng = new google.maps.LatLng(-34.397, 150.644);
            var myLatlng = new google.maps.LatLng(0.3699982667531344, 9.47995563640294);
            var myOptions = {
                zoom: 8,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            const marker = new google.maps.Marker({
        position: myLatlng,
        map,
        title: "Click to zoom",
      });

      marker.addListener("click", () => {
        map.setZoom(8);
        map.setCenter(marker.getPosition());
      });
        }

       
      
    </script>
</body>
</html>