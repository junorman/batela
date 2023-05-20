            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="contaiSner-fluid">
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=pages&type=2"><i class="fa fa-arrow-left"></i> Retour</a>

                        <div class="row">
                            <h4 class="my-3">Gestion chauffeurs</h4>

                           <div class="col-md-12">
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4"><i class="bx bx-user-plus"></i> Nouveau chauffeur</h4>

                                            <form>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input  type="text" class="form-control" id="nom" placeholder="Entrer le nom">
                                                            <span id="msg-nom"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input  type="text" class="form-control" id="prenom" placeholder="Entrer le prénom">
                                                            <span id="msg-prenom"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="email" placeholder="Entrer l'adresse email">
                                                            <span id="msg-email"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="adresse" placeholder="Entrer l'adresse">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="tel" placeholder="Entrer le numéro de téléphone">
                                                            <span id="msg-tel"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <select id="sexe" class="form-select">
                                                                <option value="F">Féminin</option>
                                                                <option value="M">Masculin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="date" class="form-control" id="date_nais" placeholder="Entrer le date naissance">
                                                            <span id="msg-date_nais"></span>
                                                        </div>
                                                    </div>
                                                    <span id="msg-error"></span>

                                                </div>
                                                


                                              
                                                <div>
                                                    <button <?php echo deactivate_button($AJOUTER, AJOUTER) ?> style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="submit" class="btn btn-primary w-md btn-add"><i class="bx bx-check"></i> Enregistrer
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->

                          
                           </div>
                           <!-- end row -->
                           </div>


                           
                           
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                               <div class="row">
                                <div class="col-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body load_gestions_chauffeurs">
                        
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                             </div> <!-- end row -->
                           </div>
                        </div>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background: <?php echo MENU_B ?>;">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: <?php echo BUTTON_C ?>;"><i class="bx bx-edit-alt"></i> Edition des données</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" name="emp_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input  type="text" class="form-control" id="nom2" placeholder="Entrer le nom">
                                        <span id="msg-nom2"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input  type="text" class="form-control" id="prenom2" placeholder="Entrer le prénom">
                                        <span id="msg-prenom2"></span>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="adresse2" placeholder="Entrer l'adresse">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="tel2" placeholder="Entrer le numéro de téléphone">
                                        <span id="msg-tel2"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <input type="hidden" id="id">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select id="sexe2" class="form-select">
                                            <option value="F">Féminin</option>
                                            <option value="M">Masculin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="date_nais2" placeholder="Entrer la date de naissance">
                                        <span id="msg-date_nais2"></span>
                                    </div>
                                </div>
                                <span id="msg-error2"></span>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button style="background: <?php echo BUTTON_B ?>;border: 1px solid <?php echo BUTTON_B ?>;"  class="btn btn-primary w-md btn-edit"><i class="bx bx-edit"></i> Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css">
        <script>
            $(document).ready(function(){

                $('#msg-error').hide();
                $('#msg-nom').hide();
                $('#msg-prenom').hide();
                $('#msg-email').hide();
                $('#msg-date_nais').hide();
                $('#msg-tel').hide();

                $('.btn-add').click(function(e){
                    e.preventDefault();

                    var nom = $('#nom').val();
                    var prenom = $('#prenom').val();
                    var email = $('#email').val();
                    var adresse = $('#adresse').val();
                    var tel = $('#tel').val();
                    var sexe = $('#sexe').val();
                    var date_nais = $('#date_nais').val();

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
                    }else if (date_nais.length == '') {
                         $('#msg-date_nais').show();
                         $('#msg-date_nais').
                         html("Veuillez saisir la date de naissance' ***").fadeIn();
                         $('#msg-date_nais').focus();
                         $('#msg-date_nais').css("color", "red");
                         setTimeout(function(){
                         $('#msg-date_nais').fadeOut('slow');
                         },5000);
                         return false;
                    }

                    else{

                       $.ajax({  
                        url:"./traitements/gestions_chauffeurs.php",  
                        method:"POST",  
                        data:{nom:nom, prenom:prenom, email:email,
                            adresse:adresse, tel:tel, sexe:sexe,
                            date_nais:date_nais},  
                        success:function(res)  
                        {     
                            
                              if(res == "error"){

                                  swal({
                                    title: "Une erreur s'est produite",
                                    text: "Cet élément existe déjà",
                                    type: "error",
                                   });
                              }else{
                                      swal({
                                        title: "Chauffeur",
                                        text: "Enregistrement effectué avec succès",
                                            type: "success"
                                        },function(){
                                            load_gestions_chauffeurs();

                                            nom = $('#nom').val('');
                                            prenom = $('#prenom').val('');
                                            email = $('#email').val('');
                                            adresse = $('#adresse').val('');
                                            tel = $('#tel').val('');
                                            date_nais = $('#date_nais').val('');
                                        });

                              }
                              
                        },
                        cache: false  
                    });

                    }
                });

                load_gestions_chauffeurs();
                function load_gestions_chauffeurs(){

                    $.ajax({  
                        url:"./traitements/load_gestions_chauffeurs.php",  
                        method:"POST",/*  
                        data:{nom:nom},*/  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_chauffeurs').html(res);                              
                        },
                        cache: false  
                    });
                }

                });
        </script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

       <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>  
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/layouts-hori-preloader.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:36:06 GMT -->
</html>
