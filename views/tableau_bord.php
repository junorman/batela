
<?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                   <div class="row">
                       <div class="col-xl-2">
                           <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success btn-filtre">
                               <i class="fa fa-search"></i> Filtres
                           </button>
                       </div>
                       <div class="col-xl-10">
                           Requête demandée: <?php 
                           $requete = "";
                           $urlf = "";
                           $urlf = explode('&', $_SERVER['REQUEST_URI']);
                            foreach ($urlf as $key => $value) {
                                if ($key !== 0) {
                                    $requete .= $value.' ';
                                }
                            }
                            echo empty($requete) ? 'Aucune valeur' : $requete = substr($requete, 0, -1);
                           
                           
                             ?>
                       </div>
                   </div>
                    <div class="row my-filtre">
                        <div class="col-xl-2">
                            <input type="hidden" id="jours" value="<?php echo $jours ?>">
                            <input type="hidden" id="semaine" value="<?php echo $semaine ?>">
                            <input type="hidden" id="mois" value="<?php echo $mois ?>">
                            <input type="hidden" id="trimestres" value="<?php echo $trimestres ?>">
                            <input type="hidden" id="annees" value="<?php echo $annees ?>">
                            <div class="mb-3">
                                <label class="form-label">Jours</label>
                                <select class="select2 form-control select2-multiple jours"
                                     >
                                    <option value="">Sélectionner</option>
                                    <optgroup label="Filtre par jours">
                                        <?php while(strtotime($date) <= strtotime($end)) {
                                            setlocale(LC_TIME, 'fr_FR.utf8','fra');

                                            $day_num = date('d', strtotime($date));
                                            $day_name = date('l', strtotime($date));
                                            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                                        ?>
                                        <option value="<?php echo $day_num ?>">
                                            <?php echo strftime("%A", strtotime($day_name)).' '.$day_num ?>
                                        </option>
                                        <?php } ?>
                                    </optgroup>                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="mb-3">
                                <label class="form-label">Semaines</label>
                                <select class="select2 form-control select2-multiple semaines"
                                     >
                                    <?php 
                                    $x = explode('-', $firstDate); 
                                    $y = explode('-', $lastDate); 
                                    ?>
                                    <option value="">Sélectionner</option>
                                    <optgroup label="Filtre de la semaine">
                                        <option value="<?php echo $x[2].','.$y[2] ?>">
                                            <?php echo $firstDate.' au '.$lastDate ?>
                                        </option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="mb-3">
                                <label class="form-label">Mois</label>
                                <select class="select2 form-control select2-multiple mois"
                                     >
                                     <option value="">Sélectionner</option>
                                    <optgroup label="Filtre par mois">
                                        <?php for ($i=1; $i <= 12; $i++) { 
                                        setlocale(LC_TIME, 'fr_FR.utf8','fra');
                                        ?>
                                        <option value="<?php echo $i ?>">
                                            <?php 
                                                echo utf8_encode(strftime("%B", strtotime(date('F', mktime(0, 0, 0, $i, 1))))) 

                                                /*echo html_entity_decode(strftime("%B", strtotime(date('F', mktime(0, 0, 0, $i, 1))))) */
                                            ?>
                                        </option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="mb-3">
                                <label class="form-label">Trimestre</label>
                                <select class="select2 form-control select2-multiple trimestres"
                                     >
                                    <option value="">Sélectionner</option>
                                    <optgroup label="Filtre par trimestre">
                                        <option value="1,2,3">TRIMESTRE 1</option>
                                        <option value="4,5,6">TRIMESTRE 2</option>
                                        <option value="7,8,9">TRIMESTRE 3</option>
                                        <option value="10,11,12">TRIMESTRE 4</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="mb-3">
                                <label class="form-label">Année</label>
                                <select class="select2 form-control select2-multiple annees"
                                     >
                                    <option value="">Sélectionner</option>
                                    <optgroup label="Filtre par année">
                                        <?php foreach ( range($earliest_year, $latest_year  ) as $k ) { 
                                            echo '<option value="'.$k.'"'.($k === $currently_selected ? ' selected="selected"' : '').'>'.$k.'</option>';
                                         } ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <br>
                            <button class="btn btn-primary btn-search" style="margin:10px">
                                Rechercher
                            </button>
                        </div>
                    </div>
                    
					<div class="row">
					    <div class="col-xl-12">
					        <div class="row">
					            <div class="col-md-3">
					                <div class="card mini-stats-wid" style="background: <?php echo MENU_N ?>;color: <?php echo COLOR_N ?>;">
					                    <div class="card-body">
					                        <div class="d-flex">
					                            <div class="flex-grow-1">
					                                <p class="fw-medium">Courses</p>
					                                <p style="font-size:18px">
                                                        <?php echo $data_info_courses ?>               
                                                    </p>
					                            </div>

					                            <div class="flex-shrink-0 align-self-center">
					                                <div class="mini-stat-icons avatar-sm rounded-circle bg-primary">
					                                    <span class="avatar-title" style="background: <?php echo MENU_H ?>;border-radius: 100%;">
					                                        <i class="fa fa-car font-size-24"></i>
					                                    </span>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <div class="col-md-3">
					                <div class="card mini-stats-wid" style="background: <?php echo MENU_H ?>;color: <?php echo COLOR_H ?>;">
					                    <div class="card-body">
					                        <div class="d-flex">
					                            <div class="flex-grow-1">
					                                <p class="fw-medium">Signals</p>
					                                <p style="font-size:18px">
                                                        <?php echo $data_info_signaler_probleme ?>               
                                                    </p>
					                            </div>

					                            <div class="flex-shrink-0 align-self-center ">
					                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
					                                    <span class="avatar-title" style="background: <?php echo MENU_N ?>;border-radius: 100%;">
					                                        <i class="fa fa-bolt font-size-24"></i>
					                                    </span>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <div class="col-md-3">
					                <div class="card mini-stats-wid" style="background: <?php echo MENU_N ?>;color: <?php echo COLOR_N ?>;">
					                    <div class="card-body">
					                        <div class="d-flex">
					                            <div class="flex-grow-1">
					                                <p class="fw-medium">Problèmes</p>
					                                <p style="font-size:18px">
                                                        <?php echo $data_info_signaler_probleme ?>               
                                                    </p>
					                            </div>

					                            <div class="flex-shrink-0 align-self-center">
					                                <div class="avatar-sm rounded-circle bg-primary">
					                                    <span class="avatar-title" style="background: <?php echo MENU_H ?>;border-radius: 100%;">
					                                        <i class="fa fa-exclamation-triangle font-size-24"></i>
					                                    </span>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid" style="background: <?php echo MENU_H ?>;color: <?php echo COLOR_H ?>;">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="fw-medium">Véhicules</p>
                                                    <p style="font-size:18px">
                                                        <?php echo $data_info_veficules ?>
                                                    </p>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm rounded-circle bg-primary">
                                                        <span class="avatar-title" style="background: <?php echo MENU_N ?>;border-radius: 100%;">
                                                            <i class="fa fa-truck font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
					        </div>
					        <!-- end row -->
					        
					    </div>
					</div>
					<!-- end row -->
									
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Problèmes signalés</h4>

                                    <canvas id="myChart" style="width:100%;height: 300px;"></canvas>                              
                                </div>
                            </div><!--end card-->
                        </div>
                       
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <!-- <div class="col-xl-12">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Vitesses</h4>

                                    <canvas id="vitesses" style="width:100%;height: 300px;"></canvas>                      
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-xl-6">
                            <div class="card" style="border: 3px solid <?php //echo BORDER_CARD_H ?>;">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Courses tarifaires</h4>
                                    
                                    <canvas id="w" style="width:100%;"></canvas>                                      
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                <div class="card-body" style="text-align: center;">
                                    <h4 class="card-title mb-4">Signals</h4>
                                    <canvas id="signals" width="800" height="450"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        
                        <div class="col-xl-6">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                <div class="card-body" style="text-align: center;">
                                    <h4 class="card-title mb-4">Problèmes</h4>
                                    
                                    <canvas id="problemes" width="800" height="450"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                        

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Filtrages caractéristiques (Appréciations)</h4>
                                    <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mt-4D">
                                                   
                                                    <div class="accordion" id="accordionExample">
                                                         
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Conduites du chauffeur
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="mt-4">
                                                                        
                                                                        <?php while($row = mysqli_fetch_array($consulter_conduite)){ ?>
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input common_selector conduite" type="checkbox" id="formCheck1" value="<?php echo $row['id_type_conduite'] ?>">
                                                                            <label class="form-check-label" for="formCheck1">
                                                                                <?php echo $row['libelle_conduite'] ?>
                                                                            </label>
                                                                        </div>
                                                                        <?php } ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                Dialogues(Communication verbalistique)
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="mt-4">
                                                                        
                                                                        <?php while($row = mysqli_fetch_array($consulter_di)){ ?>
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input common_selector dialogue" type="checkbox" id="formCheck1" value="<?php echo $row['id_type_di'] ?>">
                                                                            <label class="form-check-label" for="formCheck1">
                                                                                <?php echo $row['libelle_di'] ?>
                                                                            </label>
                                                                        </div>
                                                                        <?php } ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                Conditions du véhicule du chauffeur
                                                                </button>
                                                            </h2>
                                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="mt-4">
                                                                      
                                                                        <?php while($row = mysqli_fetch_array($consulter_condition)){ ?>
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input common_selector condition" type="checkbox" id="formCheck1" value="<?php echo $row['id_type_condition'] ?>">
                                                                            <label class="form-check-label" for="formCheck1">
                                                                                <?php echo $row['libelle_condition'] ?>
                                                                            </label>
                                                                        </div>
                                                                        <?php } ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingFour">
                                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                Vitesses enregistrés du chauffeur
                                                                </button>
                                                            </h2>
                                                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="mt-4">
                                                                       
                                                                        <?php while($row = mysqli_fetch_array($consulter_vi)){ ?>
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input common_selector vitesse" type="checkbox" id="formCheck1" value="<?php echo $row['id_type_vi'] ?>">
                                                                            <label class="form-check-label" for="formCheck1">
                                                                                <?php echo $row['libelle_vi'] ?>
                                                                            </label>
                                                                        </div>
                                                                        <?php } ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                        
                                                    </div>
                                                    <!-- end accordion -->
                                                </div>
                                            </div>
                                            <!-- end col -->

                                           
                                            <!-- end col -->
                                        </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Listes des chauffeurs</h4>
                                        <div class="table-responsive filter_data">
                                            
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                <div class="card-body">
                                    <div class="alert alert-success"><h2>Localisation des victimes</h2>
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
	        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
	        <script src="assets/libs/simplebar/simplebar.min.js"></script>
	        <script src="assets/libs/node-waves/waves.min.js"></script>

            <script src="assets/libs/select2/js/select2.min.js"></script>
            <script src="assets/js/pages/form-advanced.init.js"></script>

            <script src="assets/libs/jquery/raphael-min.js"></script>
	        <script src="assets/libs/jquery/morris.min.js"></script>
	    	<script src="assets/libs/jquery/Chart.min.js"></script>
	    	<script src="assets/libs/jquery/highchart-setting.js"></script>

	        <!-- apexcharts -->
	        <!-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> -->

	        <!-- apexcharts init -->
	        <!-- <script src="assets/js/pages/apexcharts.init.js"></script> -->

            <script type="text/javascript">
                $(document).ready(function () {
                    $(".my-filtre").hide();
                    $(".btn-filtre").click(function () {
                        $(".my-filtre").toggle();
                    });
                    
                    var jours = $('#jours').val();
                    var semaines = $('#semaine').val();
                    var mois = $('#mois').val();
                    var trimestres = $('#trimestres').val();
                    var annees = $('#annees').val();

                    filter_data(jours, semaines, mois, trimestres, annees);

                    function filter_data(jours, semaines, mois, trimestres, annees)
                    {
                        $('.filter_data').html('<div id="loading" style="" ></div>');
                        var action = 'fetch_data';
                        var conduite = get_filter('conduite');
                        var dialogue = get_filter('dialogue');
                        var condition = get_filter('condition');
                        var vitesse = get_filter('vitesse');
                        $.ajax({
                            url:"./traitements/fetch_data.php",
                            method:"POST",
                            data:{action:action, conduite:conduite, dialogue:dialogue,
                             condition:condition, vitesse:vitesse,
                            jours:jours, semaines:semaines, mois:mois,
                            trimestres:trimestres, annees:annees
                            },
                            success:function(data){
                                $('.filter_data').html(data);
                            }
                        });
                    }

                    function get_filter(class_name)
                    {
                        var filter = [];
                        $('.'+class_name+':checked').each(function(){
                            filter.push($(this).val());
                        });
                        return filter;
                    }

                    $('.common_selector').click(function(){
                        filter_data(jours, semaines, mois, trimestres, annees);
                    });

                    $('.btn-search').click(function(){
                        //e.preventDefault();
                        var jours = $('.jours').val();
                        var semaines = $('.semaines').val();
                        var mois = $('.mois').val();
                        var trimestres = $('.trimestres').val();
                        var annees = $('.annees').val();
                        var page = "";                           

                        if(jours == '' && semaines == '' && mois == '' 
                        && trimestres == '' && annees == '' )
                        {
                           alert('vide');
                        }else{
                            
                         const url = [];
                        //url.push("Banana="+x, "Orange=", "Apple=", "Mango=","Kiwi=")
                        //alert(page);
                        var separator = '&';

                        if (jours != '') {
                            page = 'jours='+jours;
                            url.push(page);
                        }if (semaines != '') {
                            page = 'semaines='+semaines;
                            url.push(page);
                        }if (mois != '') {
                            page = 'mois='+mois;
                            url.push(page);
                        }if (trimestres != '') {
                            page = 'trimestres='+trimestres;
                            url.push(page);
                        }if (annees != '') {
                            page = 'annees='+annees;
                            url.push(page);
                        }

                        //alert(url.join(separator));

                        page = window.location.href='?page=tableau_bord&'+url.join(separator);

                         
                        }

                        
                        

                    });
                    
                });
            </script>

	        <script>
    			var xValues = [<?php echo $dataX; ?>];
    			var yValues = [<?php echo $dataY; ?>];

    			new Chart("myChart", {
    			  type: "line",
    			  data: {
    			    labels: xValues,
    			    datasets: [{
    			      fill: false,
    			      lineTension: 0,
    			      backgroundColor: "rgba(0,0,255,1.0)",
    			      borderColor: "rgba(0,0,255,0.1)",
    			      data: yValues
    			    }]
    			  },
    			  options: {
    			    legend: {display: false},
    			    scales: {
    			      yAxes: [{ticks: {min: 0, max:50}}],
    			    }
    			  }
    			});

    			var xValues = [<?php echo $label_si; ?>];
    			var yValues = [<?php echo $value_si; ?>];
    			var barColors = [
    			  "#b91d47",
    			  "#00aba9",
    			  "#2b5797",
    			  "#e8c3b9",
    			  "#1e7145",
                  "#800080",
                  "#FF00FF",
                  "#FFC0CB",
                  "#808000",
                  "#800000",
                  "#FFA500",
                  "#FA8072",
                  "#008080",
                  "#000080",
                  "#FF00FF",
                  "#800080",
    			];

    			new Chart("signals", {
    			  type: "pie",
    			  data: {
    			    labels: xValues,
    			    datasets: [{
    			      backgroundColor: barColors,
    			      data: yValues
    			    }]
    			  },
    			  options: {
    			    title: {
    			      display: true,
    			      text: "Signals instantanés uitilisés par les victimes lors des crises"
    			    }
    			  }
    			});

    			var xValues = [<?php echo $label_pro; ?>];
    			var yValues = [<?php echo $value_pro; ?>];
    			var barColors = [
    			  "#b91d47",
                  "#00aba9",
                  "#2b5797",
                  "#e8c3b9",
                  "#1e7145",
                  "#800080",
                  "#FF00FF",
                  "#FFC0CB",
                  "#808000",
                  "#800000",
                  "#FFA500",
                  "#FA8072",
                  "#008080",
                  "#000080",
                  "#FF00FF",
                  "#800080",
    			];

    			new Chart("problemes", {
    			  type: "doughnut",
    			  data: {
    			    labels: xValues,
    			    datasets: [{
    			      backgroundColor: barColors,
    			      data: yValues
    			    }]
    			  },
    			  options: {
    			    title: {
    			      display: true,
    			      text: "Problèmes instantanés rencontrés par les victimes lors des crises"
    			    }
    			  }
    			});

    			var xValues = [100,200,300,400,500,600,700,800,900,1000];
    			new Chart("vitesses", {
    			  type: "line",
    			  data: {
    			    labels: xValues,
    			    datasets: [{
    			      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
    			      label: "Asia",
    			      borderColor: "red",
    			      fill: false
    			    },{
    			      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
    			      borderColor: "green",
    			      fill: false
    			    },{
    			      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
    			      borderColor: "blue",
    			      fill: false
    			    }]
    			  },
    			  options: {
    			    legend: {display: true}
    			  }
    			});

    			var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    			var yValues = [55, 49, 44, 24, 15];
    			var barColors = ["red", "green","blue","orange","brown"];

    			new Chart("w", {
    			  type: "bar",
    			  data: {
    			    labels: xValues,
    			    datasets: [{
    			      backgroundColor: barColors,
    			      data: yValues
    			    }]
    			  },
    			  options: {
    			    legend: {display: false},
    			    title: {
    			      display: true,
    			      text: "World Wine Production 2018"
    			    }
    			  }
    			});

		</script>
    	<!-- EndChart -->

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
          ['victine:Delhi', 28.7041,77.1025],*/
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
            this.setZoom(1);
            google.maps.event.removeListener(boundsListener);
        });
        }
        </script>
	        
	        <!-- App js -->
	        <script src="assets/js/app.js"></script>

	    </body>

	<!-- Mirrored from themesbrand.com/skote/layouts/charts-apex.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:37:13 GMT -->
	</html>
