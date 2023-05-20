            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=accueil"><i class="fa fa-arrow-left"></i> Retour</a>
                        <a style="background: <?php echo MENU_N ?>;border: 1px solid <?php echo BORDER_N ?>;" class="btn btn-success" href="?page=accueil"><i class="fa fa-globe"></i> Menu </a>
                        <?php if ($type == 1) {?>
                        <div class="row">
                            <h4 class="my-3">Bibliothèque</h4>

                            <div <?php echo deactivate_table($INFO_ENT, INFO_ENT) ?> class="col-lg-3">
                                <a href="?page=parametrages_infos_entreprises&type=1">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>">
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="bx bx-building-house"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Infos entreprises </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                           
                        </div>
                        <?php } ?>


                        <?php if ($type == 2) {?>
                        <div class="row">
                            <h4 class="my-3">Utilisateurs</h4>

                            <div class="col-lg-3" <?php echo deactivate_table($GESTIONS_PRO, GESTIONS_PRO) ?>>
                                <a href="?page=gestions_profils">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>" >
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="bx bx-user-pin"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Gestions profils</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3" <?php echo deactivate_table($GESTIONS_USERS, GESTIONS_USERS) ?>>
                                <a href="?page=gestions_utilisateurs">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>">
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="bx bx-group"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Gestions utilisateurs</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3" <?php echo deactivate_table($GESTIONS_CHAUFFEURS, GESTIONS_CHAUFFEURS) ?>>
                                <a href="?page=gestions_chauffeurs">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>">
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="fa fa-car"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Gestions chauffeurs</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3" <?php echo deactivate_table($DROITS, DROITS) ?>>
                                <a href="?page=parametrages_droits&type=2">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>">
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="bx bxs-key"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Droits</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
        
                           
                        </div>
                        <?php } ?>

                       

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

               
                
               <?php include 'footer.php' ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/layouts-hori-preloader.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:36:06 GMT -->
</html>
