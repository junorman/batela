<!DOCTYPE html>
<html>

<head>
  <title>
    Google Maps | Types
  </title>

  <!-- Add Google map API source -->
  <script src =
    "https://maps.googleapis.com/maps/api/js">
  </script>
    
  <script>
    function GFG() {
      const myLatlng = { lat: 0.3699982667531344, lng: 9.47995563640294 };
      var CustomOp = {
        center:new google.maps.LatLng(
            0.3699982667531344, 9.47995563640294),
        zoom:8,
        mapTypeId:google.maps.MapTypeId.HYBRID
        //mapTypeId:google.maps.MapTypeId.SATELLITE
        //mapTypeId:google.maps.MapTypeId.TERRAIN
      };
      
      // Map object
      var map = new google.maps.Map(
        document.getElementById("DivID"),
        CustomOp
      );

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
</head>

<!-- Function that execute when page load -->
<body onload = "GFG()">
  <center>
    <h1 style="color:green">
      GeeksforGeeks
    </h1>
    
    <h3>Google Maps</h3>
    
    <!-- Basic Container -->
    <div id = "DivID" style =
      "width:400px; height:300px;">
    </div>
  </center>
</body>
  
</html>
