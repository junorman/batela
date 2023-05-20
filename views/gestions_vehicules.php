            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="contaiSner-fluid">
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=gestions_chauffeurs"><i class="fa fa-arrow-left"></i> Retour</a>
                        
                        <div class="row">
                            <h4 class="my-3">Gestion véhicules</h4>

                           <div class="col-md-12">
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4"><i class="bx bx-user-plus"></i> Nouveau véhicule</h4>

                                            <form>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="hidden" id="id_user" value="<?php echo $id_user ?>">
                                                            <input  type="text" class="form-control" id="libelle" placeholder="Entrer le nom du véhicule">
                                                            <span id="msg-libelle"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <input  type="text" class="form-control" id="matricule" placeholder="Entrer le matricule">
                                                            <span id="msg-matricule"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="marque" placeholder="Entrer la marque">
                                                            <span id="msg-marque"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <input type="number" class="form-control" id="nb_place" placeholder="Entrer le nombre de place">
                                                            <span id="msg-nb_place"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <select id="couleur" class="form-select">
                                                                <option value="#000000">Noire</option>
                                                                <option value="#FFFFFF">Blanc</option>
                                                                <option value="#FF0000">Rouge</option>
                                                                <option value="#0000FF">Bleu</option>
                                                                <option value="#FFFF00">Jaune</option>
                                                                <option value="#800080">Violet</option>
                                                                <option value="#008000">Vert</option>
                                                                <option value="##808080">Gris</option>
                                                                <option value="#FFA500">Orange</option>
                                                                <option value="#C0C0C0">Argent</option>
                                                                <option value="#A52A2A">Brun</option>
                                                                <option value="#800000">Bordeaux</option>
                                                            </select>
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
                                        <div class="card-body load_gestions_vehicules">
                        
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
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background: <?php echo MENU_B ?>;">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: <?php echo BUTTON_C ?>;"><i class="bx bx-edit-alt"></i> Edition des données</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" name="gestions_vehicules">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input  type="text" class="form-control" id="libelle2" placeholder="Entrer le nom du véhicule">
                                        <span id="msg-libelle2"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input  type="text" class="form-control" id="matricule2" placeholder="Entrer le matricule">
                                        <span id="msg-matricule2"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="marque2" placeholder="Entrer la marque">
                                        <span id="msg-marque2"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input type="number" class="form-control" id="nb_place2" placeholder="Entrer le nombre de place">
                                        <span id="msg-nb_place2"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <select id="couleur2" class="form-select">
                                            <option value="#000000">Noire</option>
                                            <option value="#FFFFFF">Blanc</option>
                                            <option value="#FF0000">Rouge</option>
                                            <option value="#0000FF">Bleu</option>
                                            <option value="#FFFF00">Jaune</option>
                                            <option value="#800080">Violet</option>
                                            <option value="#008000">Vert</option>
                                            <option value="##808080">Gris</option>
                                            <option value="#FFA500">Orange</option>
                                            <option value="#C0C0C0">Argent</option>
                                            <option value="#A52A2A">Brun</option>
                                            <option value="#800000">Bordeaux</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="id">
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
                $('#msg-libelle').hide();
                $('#msg-matricule').hide();
                $('#msg-marque').hide();
                $('#msg-nb_place').hide();

                var id_user = $('#id_user').val();
                $('.btn-add').click(function(e){
                    e.preventDefault();

                    var libelle = $('#libelle').val();
                    var matricule = $('#matricule').val();
                    var marque = $('#marque').val();
                    var nb_place = $('#nb_place').val();
                    var couleur = $('#couleur').val();
                    var id_user = $('#id_user').val();
                   

                    if (libelle.length == '') {
                         $('#msg-libelle').show();
                         $('#msg-libelle').
                         html("Veuillez saisir le nom du véhicule ***").fadeIn();
                         $('#msg-libelle').focus();
                         $('#msg-libelle').css("color", "red");
                         setTimeout(function(){
                         $('#msg-libelle').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (matricule.length == '') {
                         $('#msg-matricule').show();
                         $('#msg-matricule').
                         html("Veuillez saisir le matricule ***").fadeIn();
                         $('#msg-matricule').focus();
                         $('#msg-matricule').css("color", "red");
                         setTimeout(function(){
                         $('#msg-matricule').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (marque.length == '') {
                         $('#msg-marque').show();
                         $('#msg-marque').
                         html("Veuillez saisir la marque ***").fadeIn();
                         $('#msg-marque').focus();
                         $('#msg-marque').css("color", "red");
                         setTimeout(function(){
                         $('#msg-marque').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (nb_place.length == '') {
                         $('#msg-nb_place').show();
                         $('#msg-nb_place').
                         html("Veuillez saisir le nombre de place ***").fadeIn();
                         $('#msg-nb_place').focus();
                         $('#msg-nb_place').css("color", "red");
                         setTimeout(function(){
                         $('#msg-nb_place').fadeOut('slow');
                         },5000);
                         return false;
                    }

                    else{

                       $.ajax({  
                        url:"./traitements/gestions_vehicules.php",  
                        method:"POST",  
                        data:{libelle:libelle, matricule:matricule, marque:marque,
                            nb_place:nb_place, couleur:couleur, id_user:id_user},  
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
                                        title: "Véhicule",
                                        text: "Enregistrement effectué avec succès",
                                            type: "success"
                                        },function(){
                                            load_gestions_vehicules(id_user);

                                            libelle = $('#libelle').val('');
                                            matricule = $('#matricule').val('');
                                            marque = $('#marque').val('');
                                            nb_place = $('#nb_place').val('');

                                        });

                              }
                              
                        },
                        cache: false  
                    });

                    }
                });

                load_gestions_vehicules(id_user);
                function load_gestions_vehicules(id_user){

                    $.ajax({  
                        url:"./traitements/load_gestions_vehicules.php",  
                        method:"POST",  
                        data:{id_user:id_user},  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_vehicules').html(res);                              
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
