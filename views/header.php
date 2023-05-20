<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/layouts-hori-preloader.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:36:06 GMT -->
<head>
        
        <meta charset="utf-8" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />

        <title class="nb_notify2"><?php echo TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="img/favicon.png">

        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     

    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Loader -->
      <!--   <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar" style="background: <?php echo MENU_H ?>;">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="?page=accueil" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="img/icon.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="img/icon.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="?page=accueil" class="logo logo-light" style="color: #ffffff;font-weight: bold;font-size: 18px;">
                                <!-- <span class="logo-sm">
                                    <img src="img/logo-light.svg" alt="" height="22">
                                </span> -->
                                <span class="logo-lg">
                                    <img  style="background-color: white;" src="img/icon.png" alt="" height="20">
                                </span><?php echo TITLE ?>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                       <!--  <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form> -->

                        
                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button <?php echo deactivate_table($NOTI, NOTI) ?> type="button" class="btn header-item noti-icon waves-effect btn-notify" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="nb_notify">
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="?page=notifications" class="small" key="t-view-all"> Voir tout</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 530px;" class="load_notify">
                                                                      
                                </div>
                                <!-- <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">Voir plus..</span> 
                                    </a>
                                </div> -->
                            </div>
                        </div>

                     

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="img/profil/<?php echo $_SESSION['image'] ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">
                                    <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'] ?>
                                </span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="?page=profil&id_profil=<?php echo $_SESSION['id'] ?>"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profil</span></a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="?page=logout"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Deconnexion</span></a>
                            </div>
                        </div>

                      <!--   <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div> -->
            
                    </div>
                </div>
            </header>
    
            <div class="topnav" style="background: <?php echo MENU_N?>;">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                 <li class="nav-item dropdown">
                                    <a <?php echo deactivate_table($BIB, BIB) ?> class="nav-link dropdown-toggle arrow-none" href="?page=pages&type=1" id="topnav-dashboard" role="button"
                                    >
                                        <i class="bx bx-archive-in me-2"></i><span key="t-dashboards">Bibliothèques</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <div class="dropdown">
                                            <a <?php echo deactivate_table($INFO_ENT, INFO_ENT) ?> class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                                role="button">
                                                <span key="t-calendar">Informations sociétés</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                <a  href="?page=gestion_signalitique" class="dropdown-item" key="t-tui-calendar">Signalitique</a>
                                                 <a  href="?page=gestions_activites" class="dropdown-item" key="t-tui-calendar">Activités</a>
                                            </div>
                                        </div>
                                                                             
                                    </div>
                                </li>

                                 <li class="nav-item dropdown">
                                    <a <?php echo deactivate_table($USERS, USERS) ?> class="nav-link dropdown-toggle arrow-none" href="?page=pages&type=2" id="topnav-dashboard" role="button"
                                    >
                                        <i class="bx bx-male me-2"></i><span key="t-dashboards">Utilisateurs</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <a <?php echo deactivate_table($GESTIONS_PRO, GESTIONS_PRO) ?> href="?page=gestions_profils" class="dropdown-item" key="t-default">Gestions profils</a>
                                        <a <?php echo deactivate_table($GESTIONS_PRO, GESTIONS_USERS) ?> href="?page=gestions_utilisateurs" class="dropdown-item" key="t-saas">Gestions utilisateurs</a>
                                        <a <?php echo deactivate_table($GESTIONS_PRO, GESTIONS_CHAUFFEURS) ?> href="?page=gestions_chauffeurs" class="dropdown-item" key="t-saas">Gestions chauffeurs</a>
                                        <div class="dropdown">
                                            <a <?php echo deactivate_table($DROITS, DROITS) ?> class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                                role="button">
                                                <span key="t-calendar">Droit</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                <a href="?page=gestions_affectations" class="dropdown-item" key="t-tui-calendar">Affectations</a>
                                                <a href="?page=gestions_fonctionnalites" class="dropdown-item" key="t-full-calender">Fonctionnalités</a>
                                                <a href="?page=gestions_actions_systemes" class="dropdown-item" key="t-full-calender">Actions systèmes</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a <?php echo deactivate_table($AP, AP) ?> class="nav-link dropdown-toggle arrow-none" href="?page=parametrages_appreciations" id="topnav-dashboard" role="button"
                                    >
                                        <i class="fa fa-check"></i><span key="t-dashboards"> Appréciations</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <a <?php echo deactivate_table($GESTIONS_CONDUITES, GESTIONS_CONDUITES) ?> href="?page=gestions_conduites" class="dropdown-item" key="t-default">Conduites</a>
                                        <a <?php echo deactivate_table($GESTIONS_DIALOGUES, GESTIONS_DIALOGUES) ?> href="?page=gestions_dialogues" class="dropdown-item" key="t-saas">Dialogues</a>
                                        <a <?php echo deactivate_table($GESTIONS_DIALOGUES, GESTIONS_DIALOGUES) ?> href="?page=gestions_conditions" class="dropdown-item" key="t-saas">Conditions</a>
                                        <a <?php echo deactivate_table($GESTIONS_VITESSES, GESTIONS_VITESSES) ?> href="?page=gestions_vitesses" class="dropdown-item" key="t-saas">Vitesses</a>                                        
                                    </div>
                                </li>

                               
                                <li class="nav-item dropdown">
                                    <a <?php echo deactivate_table($SP, SP) ?> class="nav-link dropdown-toggle arrow-none" href="?page=parametrages_signaler_probleme" id="topnav-dashboard" role="button"
                                    >
                                        <i class="fa fa-car-crash"></i><span key="t-dashboards">
                                         Signaler problème</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <a <?php echo deactivate_table($GESTIONS_SIGNALS, GESTIONS_SIGNALS) ?> href="?page=gestions_signals" class="dropdown-item" key="t-default">Signal</a>
                                        <a <?php echo deactivate_table($GESTIONS_PROBLEMES, GESTIONS_PROBLEMES) ?> href="?page=gestions_problemes" class="dropdown-item" key="t-saas">Problèmes</a>                                        
                                    </div>
                                </li>
                               

                                <li class="nav-item dropdown">
                                    <a <?php echo deactivate_table($TB, TB) ?> class="nav-link dropdown-toggle arrow-none" href="?page=tableau_bord" id="topnav-components" role="button"
                                    >
                                        <i class="bx bx-search-alt me-2"></i><span key="t-components">Tableaux de bord</span> <div class="arrow-down"></div>
                                    </a>
                                    
                                </li>

                                
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <style type="text/css">
                .load_notify {
                    background-color: lightblue;
                   -ms-overflow-style: none; /* for Internet Explorer, Edge */
                  scrollbar-width: none; /* for Firefox */
                  overflow-y: scroll; 
                }

                .load_notify::-webkit-scrollbar {
                  display: none; /* for Chrome, Safari, and Opera */
                }
            </style>
            <input type="text" id="title_nb_notify" value="<?php echo TITLE ?>">
            <script src="assets/libs/jquery/jquery.min.js"></script>
            
            <script>
                $(document).ready(function(){

                    
                    var title_nb_notify = $('#title_nb_notify').val();
                    setInterval(nb_notify, 1000);

                     

                   
                    //nb_notify();

                    $('.btn-notify').click(function(e){
                        e.preventDefault();
                        $.ajax({  
                            url:"./traitements/modifier_notifications.php",  
                            method:"POST",  
                            /*data:{email:email, pass:pass},*/  
                            success:function(res)  
                            {   
                                $('.nb_notify').html('<span class="badge rounded-pill"></span>');
                                load_notify();

                                $('.nb_notify2').html(title_nb_notify);
                            },
                            cache: false  
                        });
                    });

                    function nb_notify(){
                        $.ajax({  
                            url:"./traitements/load_nb_notifications.php",  
                            method:"POST",  
                            /*data:{email:email, pass:pass},*/  
                            success:function(res)  
                            {   
                                if (res > 0) {
                                    $('.nb_notify').html('<span class="badge bg-danger rounded-pill">'+res+'</span>');

                                    $('.nb_notify2').html('('+res+') '+title_nb_notify);
                                }
                                
                            },
                            cache: false  
                        });
                    }

                    function load_notify(){
                        $.ajax({  
                            url:"./traitements/load_notifications.php",  
                            method:"POST",  
                            /*data:{email:email, pass:pass},*/  
                            success:function(res)  
                            {   
                                
                                $('.load_notify').html(res);
                            },
                            cache: false  
                        });
                    }

                });
            </script>
            