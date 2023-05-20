            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <h4 class="my-3">Accueil</h4>

                            <div <?php echo deactivate_table($BIB, BIB) ?> class="col-lg-3">
                                <a href="?page=pages&type=1">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>" >
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="bx bx-archive-in"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Bibliothèque</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div <?php echo deactivate_table($USERS, USERS) ?> class="col-lg-3">
                                <a href="?page=pages&type=2">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>">
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="bx bx-male"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Utilisateurs</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div <?php echo deactivate_table($AP, AP) ?> class="col-lg-3">
                                <a href="?page=parametrages_appreciations">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>">
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="fa fa-check"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Appréciations</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div <?php echo deactivate_table($SP, SP) ?> class="col-lg-3">
                                <a href="?page=parametrages_signaler_probleme">
                                    <div class="card text-white-50" style="background: <?php echo MENU_H ?>">
                                        <div class="card-body">
                                            <h1 class="mb-4 text-white text-center"><i class="fa fa-car-crash"></i></h1>
                                            <p class="card-text text-center" style="font-size: 12px;font-weight: bold;color: #ffffff;">Signaler problème</p>
                                        </div>
                                    </div>
                                </a>
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
