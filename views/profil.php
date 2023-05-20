            <?php include 'header.php'  ?>
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Profil</h4>

                                    <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=accueil"><i class="fa fa-globe"></i> Menu </a>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                    <?php if ($data_info['type'] == "CH") {?>
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
                                if ($key !== 0 && $key !== 1) {
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
                    <?php } ?>

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                    <div class="bg-primsary bg-soft" style="background: <?php echo MENU_H ?>">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primarsy" style="color: <?php echo COLOR_H ?>">Bienvenue ! <?php echo checkCivility($data_info['sexe']) ?></h5>
                                                    <p style="color: <?php echo COLOR_H ?>"><?php echo $data_info['user_nom'].' '.$data_info['user_prenom'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-4 align-self-end">
                                                <!-- <img src="assets/images/profile-img.png" alt="" class="img-fluid"> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4" id="preview" alt="preview">
                                                    <img src="img/profil/<?php echo $data_info['user_photo'] ?>" alt="" class="img-thumbnail rounded-circle" style="width: 300px;">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">
                                                    <?php echo $data_info['user_nom'].' '.$data_info['user_prenom'] ?>
                                                </h5>
                                            </div>

                                            <?php if (isset($_SESSION['id'])) {
                                                if ($_SESSION['id'] == $id_profil || $data_info['type'] == "CH") {?>
                                            <form class="form-horizontal" id="image_profil">
                                            <div class="col-sm-8">
                                                <div class="pt-4">
                                                   
                                                    <div class="row">
                                                        <!-- <div class="col-12">
                                                            <p class="text-muted mb-0">Enesemble depuis</p>
                                                            <h5 class="font-size-15">
                                                                <?php echo $data_info['user_datereg'] ?>
                                                            </h5>
                                                        </div> -->
                                                       
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="file" name="file" id="file">
                                                        <input type="hidden" name="id_user" value="<?php echo $data_info['user_id'] ?>">
                                                         <input type="hidden" id="image_js" value="<?php echo $data_info['user_photo'] ?>">
                                                    </div><br>
                                                </div>
                                            </div>
                                            <button <?php echo deactivate_button($MODIFIER, MODIFIER) ?> class="btn btn-primary waves-effect waves-light btn-sm btn-upload"><i class="fa fa-camera"></i> Modifier le profi </button>
                                            </form>
                                            <?php }
                                                } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">A propos de lui</h4>

                                        <div class="load_infos_profil">
                                                    
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Accès systèmes</h4>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table table-nowrap mb-0">
                                                    <tbody>
                                                         <tr>
                                                            <th scope="row">Ajouter :</th>
                                                            <td>
                                                                <?php echo check_access($AJOUTER) ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Consulter :</th>
                                                            <td>
                                                                <?php echo check_access($CONSULTER) ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Modifier :</th>
                                                            <td>
                                                                <?php echo check_access($MODIFIER) ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Supprimer :</th>
                                                            <td>
                                                                <?php echo check_access($SUPPRIMER) ?>
                                                            </td>
                                                        </tr>
                                                        
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>  
                               
                            </div>         
                            
                            <div class="col-xl-8">

                                <?php if ($data_info['type'] == "CH") {?>
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
                                <?php } ?>

                                <?php if (isset($_SESSION['id'])) {
                                    if ($_SESSION['id'] == $id_profil) {?>
                                <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Parametrages</h4>
                                        <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <input  type="text" class="form-control" id="nom" placeholder="Entrer le nom" value="<?php echo $data_info['user_nom'] ?>">
                                                            <span id="msg-nom"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <input  type="text" class="form-control" id="prenom" placeholder="Entrer le prénom" value="<?php echo $data_info['user_prenom'] ?>">
                                                            <span id="msg-prenom"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="adresse" placeholder="Entrer l'adresse" value="<?php echo $data_info['user_adresse'] ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="tel" placeholder="Entrer le numéro de téléphone" value="<?php echo $data_info['user_phone'] ?>">
                                                            <span id="msg-tel"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <select id="sexe" class="form-select">
                                                                <option selected value="<?php echo $data_info['sexe'] ?>">
                                                                    <?php if ($data_info['sexe'] == 'M') {?>
                                                                        Masculin
                                                                    <?php
                                                                    }else{
                                                                    ?>
                                                                        Féminin
                                                                    <?php
                                                                    } ?>
                                                                </option>
                                                                <option value="F">Féminin</option>
                                                                <option value="M">Masculin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span id="msg-error"></span>
                                                </div>
                                                

                                                

                                              
                                                <div>
                                                    <button <?php echo deactivate_button($MODIFIER, MODIFIER) ?> style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="submit" class="btn btn-primary w-md btn-edit"><i class="bx bx-edit-alt"></i> Modifier
                                                    </button>
                                                </div>
                                    </div>
                                </div>
                                <?php }} ?>
                                <input type="hidden" id="id" value="<?php echo $data_info['user_id'] ?>">

                                <?php if ($data_info['type'] == "CH") {?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Problèmes quotidiens</h4>

                                                <canvas id="myChart" style="width:100%;height: 300px;"></canvas>                              
                                            </div>
                                        </div><!--end card-->
                                    </div>
                                   
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Avis d'appréciation du chauffeur</h4>

                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
                                                        <tr>
                                                            <th class="align-middle">Conduite</th>
                                                            <th class="align-middle">Communication</th>
                                                            <th class="align-middle">Condition véhicule</th>
                                                            <th class="align-middle">Vitesses</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($row = mysqli_fetch_array($consulter_gap)){
                                                          ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row['libelle_conduite']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['libelle_di']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['libelle_condition']; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row['libelle_vi']; ?>
                                                            </td>                                                            
                                                        </tr>
                                                        <?php } ?>
                                                   </tbody>
                                                </table>
                                                                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                            <div class="card-body" style="text-align: center;">
                                                <h4 class="card-title mb-4">Signals</h4>
                                                <canvas id="signals" width="800" height="450"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Conditions véhicules</h4>
                                                
                                                <canvas id="problemes" width="800" height="450"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <?php } ?>
                            </div>
                        </div>
                        <!-- end row -->

                      

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <?php include 'footer.php' ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

      

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css">

        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/form-advanced.init.js"></script>

        <script src="assets/libs/jquery/raphael-min.js"></script>
        <script src="assets/libs/jquery/morris.min.js"></script>
        <script src="assets/libs/jquery/Chart.min.js"></script>
        <script src="assets/libs/jquery/highchart-setting.js"></script>


        <script>
            $(document).ready(function(){

                $('#msg-error').hide();
                $('#msg-nom').hide();
                $('#msg-prenom').hide();
                $('#msg-tel').hide();

                var id = $('#id').val();

                $('.btn-edit').click(function(e){
                    e.preventDefault();

                    var nom = $('#nom').val();
                    var prenom = $('#prenom').val();
                    var adresse = $('#adresse').val();
                    var tel = $('#tel').val();
                    var sexe = $('#sexe').val();
                    var id = $('#id').val();

                    if (nom.length == '') {
                         $('#msg-nom').show();
                         $('#msg-nom').
                         html("Veuillez saisir le nom ***").fadeIn();
                         $('#msg-nom').focus();
                         $('#msg-nom').css("color", "red");
                         setTimeout(function(){
                         $('#msg-nom').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (prenom.length == '') {
                         $('#msg-prenom').show();
                         $('#msg-prenom').
                         html("Veuillez saisir le prénom ***").fadeIn();
                         $('#msg-prenom').focus();
                         $('#msg-prenom').css("color", "red");
                         setTimeout(function(){
                         $('#msg-prenom').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (tel.length == '') {
                         $('#msg-tel').show();
                         $('#msg-tel').
                         html("Veuillez saisir le numéro ***").fadeIn();
                         $('#msg-tel').focus();
                         $('#msg-tel').css("color", "red");
                         setTimeout(function(){
                         $('#msg-tel').fadeOut('slow');
                         },5000);
                         return false;
                    }else if ($.isNumeric(tel) == false) {
                         $('#msg-tel').show();
                         $('#msg-tel').
                         html("Veuillez saisir le numéro en chiffres et non des lettres ***").fadeIn();
                         $('#msg-tel').focus();
                         $('#msg-tel').css("color", "red");
                         setTimeout(function(){
                         $('#msg-tel').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (tel.length == 1 || tel.length == 2 || tel.length == 3 || tel.length == 4 || tel.length == 5 || tel.length == 6 || tel.length == 7 || tel.length == 8) {
                         $('#msg-tel').show();
                         $('#msg-tel').
                         html("Le numéro doit avoir maximum 9 caractères ***").fadeIn();
                         $('#msg-tel').focus();
                         $('#msg-tel').css("color", "red");
                         setTimeout(function(){
                         $('#msg-tel').fadeOut('slow');
                         },5000);
                         return false;
                    }

                    else{

                        swal({
                          title: "Etes vous sûre?",
                          text: "D'effectuer la modification du profil?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Oui modifier",
                          cancelButtonText: "Non, annuler la modification!",
                          closeOnConfirm: true,
                          closeOnCancel: false
                        },
                        function(isConfirm){
                          if (isConfirm) {

                           $.ajax({  
                            url:"./traitements/modifier_gestions_utilisateurs.php",  
                            method:"POST",  
                            data:{nom:nom, prenom:prenom,
                                adresse:adresse, tel:tel, sexe:sexe, id:id},  
                            success:function(res)  
                            {     
                                 window.location.href='?page=profil&id_profil='+id;
                                 //load_infos_profil(id);
                                  
                            },
                            cache: false  
                        });
                       } else {
                        swal("Annuler", "Modification annuler", "error");
                      }
                    });

                    }
                });

                load_infos_profil(id);
                function load_infos_profil(id){

                    $.ajax({  
                        url:"./traitements/load_infos_profil.php",  
                        method:"POST",  
                        data:{id:id},  
                        success:function(res)  
                        {     
                            
                            $('.load_infos_profil').html(res);                              
                        },
                        cache: false  
                    });
                }

                });
        </script>

        <script>
          $(document).ready(function(){

               $('#msg-nom').hide();
               $('#msg-prenom').hide();
               $('#msg-pass').hide();
               $('#msg-file').hide();
               $('.btn-upload').hide();

               var image_js = $('#image_js').val();
               var id = $('#id').val();

                $('#file').on('change', function(e){

                    var val = 0;
                    var interval = setInterval(function(){

                        val = val + 1;
                        
                        //$('#percent1').text(val + '%');

                        if (val == 100) {
                            clearInterval(interval);
                        }
                    }, 50);

                    $('.btn-upload').show();

                        function readURL(input){
                      if (input.files && input.files[0]) {
                          var reader = new FileReader();
                          reader.onload=function(e){
                            //$('#uploadForm + img').remove();
                           var template = 
                          '<div class="text-center avatar-md profile-user-wid mb-4" >'
                        +'<img src="'+e.target.result+'" class="img-thumbnail rounded-circle" alt="avatar" >'
                            
                            +'<br><br><br><br> <div id="percent1" style="font-weight: bold;"></div>'
                            //+'<button class="btn btn-danger btn-img1">x</button>'
                            +'</div>';


                            $('#preview').html(template);

                    
                          }
                          reader.readAsDataURL(input.files[0]);
                      }
                   }

                   $(document).on('change','#file',function(){
                       readURL(this);
                   });

                   $(document).on('click','.btn-img1',function(e){
                       e.preventDefault();  
                       /*$('#preview').html('<img src="img/profil/'+image_js+'" class="img-thumbnail rounded-circle" alt="avatar">');*/
                       
                       return false;
                   });

                });


                $('.btn-upload').click(function(e){
                   e.preventDefault();
                   var form = $('#image_profil')[0];
                   var data = new FormData(form);
                   var file = $('#file').val();

                   if (file.length == '') {
                         $('#msg-file').show();
                         $('#msg-file').
                         html("Veuillez uploader une image ***").fadeIn();
                         $('#msg-file').focus();
                         $('#msg-file').css("color", "red");
                         setTimeout(function(){
                         $('#msg-file').fadeOut('slow');
                         },5000);
                         return false;
                    }else{

                        swal({
                          title: "Etes vous sûre?",
                          text: "D'effectuer la modification du profil?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Oui modifier",
                          cancelButtonText: "Non, annuler la modification!",
                          closeOnConfirm: true,
                          closeOnCancel: false
                        },
                        function(isConfirm){
                          if (isConfirm) {
                                
                                $.ajax({  
                                    type: "POST",
                                    enctype: 'multipart/form-data',
                                    url:'./traitements/modifier_profil.php',
                                    data: data,
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    timeout: 600000,  
                                    success:function(res)  
                                        {  
                                            $('.btn-upload').hide();
                                        window.location.href='?page=profil&id_profil='+id;
                                        }  
                                  });
                                   // submitting the form when user press yes
                          } else {
                            swal("Annuler", "Modification annuler", "error");
                          }
                        });


                    }

                   

                   
                });
                   
              });
        </script>

        <script type="text/javascript">
                $(document).ready(function () {
                    $(".my-filtre").hide();
                    $(".btn-filtre").click(function () {
                        $(".my-filtre").toggle();
                    });
                    
                    $('.btn-search').click(function(){
                        //e.preventDefault();
                        var id = $('#id').val();
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

                        page = window.location.href='?page=profil&id_profil='+id+'&'+url.join(separator);

                         
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
        <!-- EndChart -->

        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
       <!--  <script src="assets/libs/apexcharts/apexcharts.min.js"></script> -->

        <script src="assets/js/pages/profile.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/contacts-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:36:46 GMT -->
</html>
