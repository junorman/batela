
<?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=accueil"><i class="fa fa-globe"></i> Menu </a>
                   
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                            <div class="card-body">
                                <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                    <li class="active">
                                        <a href="?page=profil&id_profil=<?php echo $info_no['id_chauffeur'] ?>">
                                            <div class="d-flex">
                                                <!-- <div class="flex-shrink-0 align-self-center me-3">
                                                    <i class="mdi mdi-circle font-size-10"></i>
                                                </div> -->
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <img src="img/profil/<?php echo $info_no['user_photo'] ?>" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="font-size-14 mb-1" <?php echo stateNotify($info_no['statut_vue']) ?>>
                                                        <?php echo $info_no['user_nom'].' '.$info_no['user_prenom'].' '.$info_no['id_user'] ?>
                                                    </p>
                                                    <p class="mb-1" key="t-simplified" <?php echo stateNotify($info_no['statut_vue']) ?>>Siganle: <?php echo $info_no['libelle_si'] ?></p>
                                                    <p class="mb-1" key="t-simplified" <?php echo stateNotify($info_no['statut_vue']) ?>>Problème: <?php echo $info_no['libelle_pro'] ?></p>
                                                     <p class="mb-1" key="t-simplified">
                                                        NUMERO DE LA VICTIME:
                                                       <span style="font-weight: bold;color: #008000;">
                                                           <?php echo $info_no['numero'] ?>
                                                       </span> 
                                                     </p>
                                                     <p class="mb-1" key="t-simplified">
                                                       MATRICULE DU VEHICULE: <span style="font-weight: bold;color: #0000FF;">
                                                           <?php echo $info_no['matricule'] ?>
                                                       </span>
                                                     </p>
                                                </div>
                                                <div class="font-size-11" <?php echo stateNotify($info_no['statut_vue']) ?>>
                                                    <i class="mdi mdi-clock-outline"></i>
                                                    <time class="timeago" datetime="<?php echo $info_no['date_not'] ?>">Dec 18, 1978</time>
                                                </div>&nbsp;&nbsp;
                                                <!-- <div class="font-size-11">
                                                    <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;color: <?php echo COLOR_H; ?>;" class="btn">
                                                        <i class="fa fa-phone"></i> Alerter la police
                                                    </button>
                                                </div> -->
                                            </div>
                                        </a>
                                    </li>

                                    
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>                 

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                <div class="card-body">
                                    <div class="alert alert-success"><h2>Localisation de la victime</h2>
                                    </div>
                                    <div id="map_wrapper_div">
                                        <div id="map_tuts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                    <!-- end row -->
				</div>
                <?php include 'footer.php' ?>
			</div>
			 <!-- JAVASCRIPT -->
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
	        <script src="assets/libs/jquery/jquery.min.js"></script>
            <script src="assets/libs/jquery/jquery.timeago.js"></script>
            <script src="assets/libs/locales/jquery.timeago.fr.js"></script>
	        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
	        <script src="assets/libs/simplebar/simplebar.min.js"></script>
	        <script src="assets/libs/node-waves/waves.min.js"></script>

            <script src="assets/libs/select2/js/select2.min.js"></script>
            <script src="assets/js/pages/form-advanced.init.js"></script>

	        <!-- apexcharts -->
	        <!-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> -->

	        <!-- apexcharts init -->
	        <!-- <script src="assets/js/pages/apexcharts.init.js"></script> -->

            
            <script>
                $(document).ready(function(){
                    $(".timeago").timeago();
                });
            </script>

    	   <script type="text/javascript">
    		/*
            * Google Maps documentation: http://code.google.com/apis/maps/documentation/javascript/basics.html
            * Geolocation documentation: http://dev.w3.org/geo/api/spec-source.html
            */
            $( document ).on( "pagecreate", "#map-page", function() {
            var defaultLatLng = new google.maps.LatLng(34.0983425, -118.3267434); // Default to Hollywood, CA when no geolocation support
            if ( navigator.geolocation ) {
            function success(pos) {
            // Location found, show map with these coordinates
            drawMap(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
            }
            function fail(error) {
            drawMap(defaultLatLng); // Failed to find location, show default map
            }
            // Find the users current position. Cache the location for 5 minutes, timeout after 6 seconds
            navigator.geolocation.getCurrentPosition(success, fail, {maximumAge: 500000, enableHighAccuracy:true, timeout: 6000});
            } else {
            drawMap(defaultLatLng); // No geolocation support, show default map
            }
            function drawMap(latlng) {
            var myOptions = {
            zoom: 10,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            // Add an overlay to the map of current lat/lng
            var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "Greetings!"
            });
            }
            });
    	  </script>

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
          /*['Mumbai', 19.0760,72.8777],
          ['Pune', 18.5204,73.8567],
          ['Bhopal ', 23.2599,77.4126],
          ['Agra', 27.1767,78.0081],
          ['Delhi', 28.7041,77.1025],*/
          <?php echo $data_map ?>
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
	        
	        <!-- App js -->
	        <script src="assets/js/app.js"></script>

	    </body>

	<!-- Mirrored from themesbrand.com/skote/layouts/charts-apex.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:37:13 GMT -->
	</html>
