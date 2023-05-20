            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="contaiSner-fluid">
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=parametrages_droits&type=2"><i class="fa fa-arrow-left"></i> Retour</a>

                        <div class="row">
                            <h4 class="my-3">Gestions des affectations</h4>

                           <div class="col-md-4">
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4"><i class="bx bx-user-plus"></i> Nouvelle affectation</h4>

                                            <form>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3 load_utilisateurs_non_affectes">
                                                            
                                                        </div>
                                                        <span id="msg-id_user"></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <select id="id_profil" class="form-select">
                                                                <?php while ($row = mysqli_fetch_array($consulter_profils)) {?>
                                                                    <option value="<?php echo $row['id_profil'] ?>">
                                                                        <?php echo $row['libelle_profil'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
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


                           <div class="col-md-8">
                               <div class="row">
                                <div class="col-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body load_gestions_affectations">
                        
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                             </div> <!-- end row -->
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background: <?php echo MENU_B ?>;">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: <?php echo BUTTON_C ?>;"><i class="bx bx-edit-alt"></i> Edition des données</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" name="gestions_affectations_form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select id="id_user2" class="form-select">
                                            <?php while ($row = mysqli_fetch_array($consulter_users2)) {?>
                                                <option value="<?php echo $row['user_id'] ?>">
                                                    <?php echo $row['user_nom'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select id="id_profil2" class="form-select">
                                            <?php while ($row = mysqli_fetch_array($consulter_profils2)) {?>
                                                <option value="<?php echo $row['id_profil'] ?>">
                                                    <?php echo $row['libelle_profil'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <input type="hidden" id="id">
                               
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
                $('#msg-id_user').hide();

                $('.btn-add').click(function(e){
                    e.preventDefault();

                    var id_user = $('#id_user').val();
                    var id_profil = $('#id_profil').val();

                    if (id_user.length == null) {
                         $('#msg-id_user').show();
                         $('#msg-id_user').
                         html("Veuillez sélectionner un employé ***").fadeIn();
                         $('#msg-id_user').focus();
                         $('#msg-id_user').css("color", "red");
                         setTimeout(function(){
                         $('#msg-id_user').fadeOut('slow');
                         },5000);
                         return false;
                    }else{

                        $.ajax({  
                        url:"./traitements/gestions_affectations.php",  
                        method:"POST",  
                        data:{id_user:id_user, id_profil:id_profil},  
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
                                        title: "Affectations",
                                        text: "Enregistrement effectué avec succès",
                                            type: "success"
                                        },function(){
                                            load_gestions_affectations();
                                            load_utilisateurs_non_affectes();
                                           
                                        });

                              }
                              
                        },
                        cache: false  
                    });

                    }
                   
                   
                });

                load_gestions_affectations();
                function load_gestions_affectations(){

                    $.ajax({  
                        url:"./traitements/load_gestions_affectations.php",  
                        method:"POST",/*  
                        data:{nom:nom},*/  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_affectations').html(res);                              
                        },
                        cache: false  
                    });
                }

                load_utilisateurs_non_affectes();
                function load_utilisateurs_non_affectes(){

                    $.ajax({  
                        url:"./traitements/load_utilisateurs_non_affectes.php",  
                        method:"POST",  
                        data:{nom:"nom"},
                        dataType: "JSON",  
                        success:function(res)  
                        {     
                            var len = res.length;
                            var template = '';
                            template +='<select id="id_user" class="form-select">';
                            for(var i=0; i<len; i++)
                                {
                                    template +='<option value="'+res[i].id+'">'+res[i].nom+' '+res[i].prenom+'</option>';
                                }

                            template +='</select>';
                            $('.load_utilisateurs_non_affectes').html(template);
                                                      
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
