            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="contaiSner-fluid">
                        
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=parametrages_infos_entreprises&type=1"><i class="fa fa-arrow-left"></i> Retour</a>
                        <a style="background: <?php echo MENU_N ?>;border: 1px solid <?php echo BORDER_N ?>;" class="btn btn-success" href="?page=accueil"><i class="fa fa-globe"></i> Menu </a>
                        <div class="row">
                           <h4 class="my-3">Gestions des activités</h4>
                          
                          
                        </div>
                        <!-- end row -->
                         <br>
                            <form name="add_name" id="add_name">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4"><i class="bx bx-calculator"></i> Activités
                                                </h4>
                                                    <div>
                                                        <div class="row dynamic_field">
                                                <div  class="mb-3 col-lg-5">
                                                    <input  type="text" class="form-control"  placeholder="Intitulé" name="libelle[]">
                                                    <span id="msg-libelle"></span>
                                                </div>

                                                <div  class="mb-3 col-lg-5">
                                                    <textarea name="details[]" class="form-control" placeholder="Détails..."></textarea>
                                                    <span id="msg-details"></span>
                                                </div>
                                                
                                                <!-- <div class="col-lg-2 align-self-center">
                                                    <div class="d-grid">
                                                        <button class="btn btn-danger mt-3 mt-lg-0 btn-delete">
                                                            Supprimer
                                                        </button>
                                                    </div>
                                                </div> -->
                                                
                                            </div>
                                                        
                                            </div>
                                            <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success mt-3 mt-lg-0 btn-add">
                                               <i class="fa fa-plus"></i>
                                            </button>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="submit" class="btn btn-primary btn-activites">
                                    <i class="fa fa-check"></i> Enregistrer
                                </button>
                   </div>
                    </form>


                   
                    
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                            <div class="card-body load_gestions_activites"></div>
                        </div>
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
                        <form class="form-horizontal" role="form" name="activites_form">
                            <div class="row">
                               <div  class="mb-3 col-lg-5">
                                    <input  type="text" class="form-control"  placeholder="Intitulé" id="libelle2">
                                    <span id="msg-libelle2"></span>
                                </div>

                                <div  class="mb-3 col-lg-5">
                                    <textarea id="details2" class="form-control" placeholder="Détails..."></textarea>
                                    <span id="msg-details2"></span>
                                </div>
                            </div>
                            <input type="hidden" id="id">
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
            var i=1;  
            var j=1;  

            $(".btn-add").click(function(e){
                e.preventDefault();
                i++;
                j++;
                $('.dynamic_field').append('<div id="row'+i+'" class="row"><div  class="mb-3 col-lg-5"><input  type="text" class="form-control"  placeholder="Intitulé" name="libelle[]"><span id="msg-libelle"></span></div><div  class="mb-3 col-lg-5"><textarea name="details[]" id="details'+i+'" class="form-control" placeholder="Détails..."></textarea><span id="msg-details"></span></div><div class="col-lg-2 align-self-center"><div class="d-grid"><button class="btn btn-danger mt-3 mt-lg-0 btn_remove" id="'+i+'"><i class="fa fa-remove">X</i></button></div></div></div>');
            });

            $(document).on('click', '.btn_remove', function(e){
                    e.preventDefault();  
                   var button_id = $(this).attr("id");   
                   $('#row'+button_id+'').remove();  
              });


            $('.btn-activites').click(function(e){

               e.preventDefault();            
               $.ajax({  
                    url:"./traitements/gestions_activites.php",  
                    method:"POST",  
                    data:$('#add_name').serialize(),  
                    success:function(data)  
                    {   
                        swal({
                            title: "Activités",
                            text: "Enregistrement effectué avec succès",
                                type: "success"
                            },function(){
                                

                            });                        
                        load_gestions_activites();   
                    }  
               });  
            }); 

            load_gestions_activites();
            function load_gestions_activites(){

                $.ajax({  
                    url:"./traitements/load_gestions_activites.php",  
                    method:"POST",/*  
                    data:{nom:nom},*/  
                    success:function(res)  
                    {     
                        $('.load_gestions_activites').html(res);                              
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
