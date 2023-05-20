
<script type="text/javascript">
    function get_position(){
        // Check if geolocation supported by the browser
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(location){
                var positionDetails = "Your position: <br/>" + "Latitude: <strong>" + location.coords.latitude + "</strong> and " + "Longitude: <strong>" + location.coords.longitude+"</strong>";
                document.getElementById("location_content").innerHTML = positionDetails;
            });
        } else{
            document.getElementById("location_content").innerHTML = "This browser does not support HTML5 geolocation.";
        }
    }
</script>
</head>
<body>
    <div id="location_content"></div>
    <button type="button" onclick="get_position();">See My Position</button>

    <iframe src="https://www.google.com/maps?g=0.3699982667531344,9.47995563640294&hl=es;z=14&output=embed" style="width:100%; height: 100%;"></iframe>