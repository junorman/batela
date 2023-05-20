            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="contaiSner-fluid">
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=parametrages_appreciations"><i class="fa fa-arrow-left"></i> Retour</a>
                                                 
                        <div class="row">
                            <h4 class="my-3">Gestions des conditions</h4>

                           <div class="col-md-4">
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4"><i class="bx bx-user-plus"></i> Ajouter une condition</h4>

                                            <form>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <input type="text" id="libelle" class="form-control">
                                                        </div>
                                                        <span id="msg-libelle"></span>
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
                                        <div class="card-body load_gestions_conditions">
                        
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
                        <form class="form-horizontal" role="form" name="gestions_conditions">
                            <div class="row">
                                <div class="col-md-12">
                                     <div class="mb-3">
                                        <input type="text" id="libelle2" class="form-control">
                                    </div>
                                    <span id="msg-libelle2"></span>
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
                $('#msg-libelle').hide();

                $('.btn-add').click(function(e){
                    e.preventDefault();

                    var libelle = $('#libelle').val();
                    if (libelle.length == '') {
                         $('#msg-libelle').show();
                         $('#msg-libelle').
                         html("Veuillez ajouter une condition ***").fadeIn();
                         $('#msg-libelle').focus();
                         $('#msg-libelle').css("color", "red");
                         setTimeout(function(){
                         $('#msg-libelle').fadeOut('slow');
                         },5000);
                         return false;
                    }else{

                        $.ajax({  
                        url:"./traitements/gestions_conditions.php",  
                        method:"POST",  
                        data:{libelle:libelle},  
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
                                        title: "Condition",
                                        text: "Enregistrement effectué avec succès",
                                            type: "success"
                                        },function(){
                                            load_gestions_conditions();
                                            libelle = $('#libelle').val('');
                                        });

                              }
                              
                        },
                        cache: false  
                    });

                    }
                   
                   
                });

                load_gestions_conditions();
                function load_gestions_conditions(){

                    $.ajax({  
                        url:"./traitements/load_gestions_conditions.php",  
                        method:"POST",/*  
                        data:{nom:nom},*/  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_conditions').html(res);                              
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
