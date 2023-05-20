            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="contaiSner-fluid">
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=parametrages_droits&type=2"><i class="fa fa-arrow-left"></i> Retour</a>
                        
                        <div class="row">
                            <h4 class="my-3">Gestions des actions systèmes</h4>

                           <div class="col-md-5">
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4"><i class="bx bx-user-plus"></i> Profils utilisateurs</h4>

                                             <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                               
                                                <thead style="background: <?php echo TABLEAU_B ?>;color: <?php echo TABLEAU_C ?>;">
                                                <tr>
                                                    <th>Profil</th>
                                                </tr>
                                                </thead>


                                                <tbody>

                                                <?php while ($row = mysqli_fetch_array($consulter_profils)) {?>
                                                <tr class="profil" id="<?php echo $row['id_profil'] ?>">
                                                   
                                                    <td>
                                                        <?php echo $row['libelle_profil'] ?>
                                                    </td>
 
                                                </tr>

                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->

                          
                           </div>
                           <!-- end row -->
                           </div>


                           <div class="col-md-7">
                               <div class="row">
                                <div class="col-12">
                                    <div class="card" style="border: 3px solid <?php echo BORDER_CARD_H ?>;">
                                        <div class="card-body load_gestions_actions_systemes">
                        
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

      
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css">
        <script>
            $(document).ready(function(){

                $('#msg-error').hide();

                $('.profil').click(function(e){
                    e.preventDefault();

                    var id = $(this).attr('id');
                    load_gestions_actions_systemes(id);
                });

                load_gestions_actions_systemes(id);
                function load_gestions_actions_systemes(id){

                    $.ajax({  
                        url:"./traitements/load_gestions_actions_systemes.php",  
                        method:"POST",  
                        data:{id:id},  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_actions_systemes').html(res);                              
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
