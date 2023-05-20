<?php 

include("config/db.php");

//INFO ENTREPRISE
        $sql_info_ent = "SELECT * FROM entreprise ";
        $result_info_ent = mysqli_query($db,$sql_info_ent);
        $row_info_ent = mysqli_num_rows($result_info_ent);
        $logo = "";
        if ($row_info_ent > 0) {
            $data_info_ent = mysqli_fetch_array($result_info_ent);
            $logo = $data_info_ent['logo'];
        }

 ?>
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:36:46 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title><?php echo TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="img/favicon.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-prSimary bg-soft" style="background: <?php echo MENU_H ?>;">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primsary" style="color: <?php echo COLOR_H ?>;">Bienvenu sur <?php echo TITLE ?> !</h5>
                                            <p style="color: <?php echo COLOR_H ?>;">Adresse email oublié.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="img/logo/<?php echo $logo ?>" alt="" class="img-fluid" style="height:100px">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0" style="background: <?php echo MENU_N ?>;"> 
                                <div class="auth-logo">
                                    <a href="?page=login" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4" >
                                            <span class="avatar-title rounded-circle" style="background: <?php echo MENU_N ?>;">
                                                <img src="img/icon.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" action="https://themesbrand.com/skote/layouts/index.html">
        
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input" style="color: <?php echo COLOR_N ?>;">Ancienne Adresse email</label>
                                            <input style="border: 3px solid <?php echo BORDER_H ?>;" type="text" class="form-control" id="email" placeholder="Entrer l'ancienne adresse email">
                                            <span id="msg-email"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input" style="color: <?php echo COLOR_N ?>;">Nouvelle Adresse email</label>
                                            <input style="border: 3px solid <?php echo BORDER_H ?>;" type="text" class="form-control" id="email2" placeholder="Entrer nouvelle adresse email">
                                            <span id="msg-email2"></span>
                                            <span id="msg-error"></span>
                                        </div>
                
                                       

                                       
                                        
                                        <div class="mt-3 d-grid">
                                            <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;color: <?php echo COLOR_H ?>;" class="btn btn-primarsy  btn-login" ><i class="fa fa-lock"></i> Changer</button>
                                        </div>
            
                                       

                                        <div class="mt-4 text-center">
                                            <a href="?page=login" class="text-muted"><i class="mdi mdi-lock me-1"></i> Se connecter</a>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <!-- <div class="mt-5 text-center">
                            
                            <div>
                                <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Signup now </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>
                        </div>
 -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
         <script>
            $(document).ready(function(){

                $('#msg-error').hide();
                $('#msg-email').hide();
                $('#msg-email2').hide();

                $('.btn-login').click(function(e){
                    e.preventDefault();

                    var email = $('#email').val();
                    var email2 = $('#email2').val();

                    if (email.length == '') {
                         $('#msg-email').show();
                         $('#msg-email').
                         html("Veuillez saisir l'ancienne adresse email' ***").fadeIn();
                         $('#msg-email').focus();
                         $('#msg-email').css("color", "red");
                         setTimeout(function(){
                         $('#msg-email').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (email2.length == '') {
                         $('#msg-email2').show();
                         $('#msg-email2').
                         html("Veuillez saisir la nouvelle adresse email' ***").fadeIn();
                         $('#msg-email2').focus();
                         $('#msg-email2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-email2').fadeOut('slow');
                         },5000);
                         return false;
                    }

                    else{

                       $.ajax({  
                        url:"./traitements/fortgot_email.php",  
                        method:"POST",  
                        data:{email:email, email2:email2},  
                        success:function(res)  
                        {     
                            
                              if (res=="success") {
                                window.location.href='?page=login';
                                }
                                else {
                                    $('#msg-error').html('Mot de passe ou adresse email incorrecte!')
                                    $('#msg-error').show();
                                    $('#msg-error').fadeIn();
                                    $('#msg-error').focus();
                                    $('#msg-error').css("color", "red");
                                                 setTimeout(function(){
                                    $('#msg-error').fadeOut('slow');
                                     },5000);
                                    return false; 

                                    alert(res);
                                     
                                 } 
                              
                        },
                        cache: false  
                    });

                    }
                });

                $('#email').keypress(function(e){

                    var email = $('#email').val();
                    var email2 = $('#email2').val();

                    if (e.which == 13) {

                        if (email.length == '') {
                         $('#msg-email').show();
                         $('#msg-email').
                         html("Veuillez saisir l'ancienne adresse email' ***").fadeIn();
                         $('#msg-email').focus();
                         $('#msg-email').css("color", "red");
                         setTimeout(function(){
                         $('#msg-email').fadeOut('slow');
                         },5000);
                         return false;
                        }else if (email2.length == '') {
                             $('#msg-email2').show();
                             $('#msg-email2').
                             html("Veuillez saisir la nouvelle adresse email' ***").fadeIn();
                             $('#msg-email2').focus();
                             $('#msg-email2').css("color", "red");
                             setTimeout(function(){
                             $('#msg-email2').fadeOut('slow');
                             },5000);
                             return false;
                        }

                        else{

                           $.ajax({  
                            url:"./traitements/fortgot_email.php",  
                            method:"POST",  
                            data:{email:email, email2:email2},  
                            success:function(res)  
                            {     
                                
                                  if (res=="success") {
                                    window.location.href='?page=login';
                                    }
                                    else {
                                        $('#msg-error').html('Mot de passe ou adresse email incorrecte!')
                                        $('#msg-error').show();
                                        $('#msg-error').fadeIn();
                                        $('#msg-error').focus();
                                        $('#msg-error').css("color", "red");
                                                     setTimeout(function(){
                                        $('#msg-error').fadeOut('slow');
                                         },5000);
                                        return false; 

                                        alert(res);
                                         
                                     } 
                                  
                            },
                            cache: false  
                        });

                        }

                    }
                    
                });

                $('#email2').keypress(function(e){

                    var email = $('#email').val();
                    var email2 = $('#email2').val();

                    if (e.which == 13) {

                        if (email.length == '') {
                         $('#msg-email').show();
                         $('#msg-email').
                         html("Veuillez saisir l'ancienne adresse email' ***").fadeIn();
                         $('#msg-email').focus();
                         $('#msg-email').css("color", "red");
                         setTimeout(function(){
                         $('#msg-email').fadeOut('slow');
                         },5000);
                         return false;
                        }else if (email2.length == '') {
                             $('#msg-email2').show();
                             $('#msg-email2').
                             html("Veuillez saisir la nouvelle adresse email' ***").fadeIn();
                             $('#msg-email2').focus();
                             $('#msg-email2').css("color", "red");
                             setTimeout(function(){
                             $('#msg-email2').fadeOut('slow');
                             },5000);
                             return false;
                        }

                        else{

                           $.ajax({  
                            url:"./traitements/fortgot_email.php",  
                            method:"POST",  
                            data:{email:email, email2:email2},  
                            success:function(res)  
                            {     
                                
                                  if (res=="success") {
                                    window.location.href='?page=login';
                                    }
                                    else {
                                        $('#msg-error').html('Mot de passe ou adresse email incorrecte!')
                                        $('#msg-error').show();
                                        $('#msg-error').fadeIn();
                                        $('#msg-error').focus();
                                        $('#msg-error').css("color", "red");
                                                     setTimeout(function(){
                                        $('#msg-error').fadeOut('slow');
                                         },5000);
                                        return false; 

                                        alert(res);
                                         
                                     } 
                                  
                            },
                            cache: false  
                        });

                        }

                    }

                });

            });
        </script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2022 00:36:46 GMT -->
</html>
