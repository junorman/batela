            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <style type="text/css">
               /* *{
                    font-family: 'Roboto', sans-serif;
                }*/

                .cont{
                    width: 100%;
                    height: 200vh;
                    background: linear-gradient(#fff, #f9ffd6);
                    position: relative;
                    padding-left: 8%;
                    padding-right: 8%;
                    box-sizing: border-box;
                }

                .nave img{
                    width: 30px;
                    cursor: pointer;
                }

                .nave ul{
                    position: absolute;
                    top: 40px;
                    right: 0;
                }

                .nave ul li{
                    list-style: none;
                    color: #a1a1a1;
                    font-size: 12px;
                    cursor: pointer;
                }

                .nave ul:after{
                    content: '';
                    width: 1px;
                    height: 130px;
                    background: #d0d0d0;
                    position: absolute;
                    top: 20px;
                    left: -10px;
                }

                .content{
                    max-width: 600px;
                    margin-top: 100px;
                }

                .content h1{
                    font-size: 60px;
                }

                .content p{
                    max-width: 450px;
                    color: #a1a1a1;
                    font-size: 15px;
                    font-weight: 300;
                    line-height: 22px;
                    margin: 40px 0;
                }

                .content button{
                    width: 160px;
                    padding: 10px 0;
                    border: none;
                    outline: none;
                    font-size: 16px;
                    font-weight: 300;
                    background: #ffff70;
                    box-shadow: 0 30px 6px rgba(0, 0, 0, 0.16);
                    cursor: pointer;
                }

                .car-image{
                    width: 30%;
                    right: 50px;
                    animation: run 2s  linear 1;
                }

                .bottom-menu{
                    display: flex;
                    position: absolute;
                    bottom: 50px;
                }

                .bottom-menu div{
                    display: flex;
                    align-items: center;
                    font-size: 14px;
                    margin-right: 50px;
                }

                .bottom-menu img{
                    width: 25px;
                    margin-right: 15px;
                }
                
                @keyframes run{
                    0%{
                        transform: translate(-100px, -100px);
                    }100%{
                        transform: translate(0px, 0px);
                    }
                }

               /* * {
                  box-sizing: border-box;
                }*/

                .column {
                  float: left;
                  width: 33.33%;
                  padding: 5px;
                }

                /* Clearfix (clear floats) */
                .row2::after {
                  content: "";
                  clear: both;
                  display: table;
                }
            </style>
            <div class="main-content">

                <div class="page-content">
                    <div class="contaiSner-fluid">
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=gestions_vehicules&id_user=<?php echo $id_chauffeur ?>"><i class="fa fa-arrow-left"></i> Retour</a>

                       <button class="btn btn-primary btn-print">
                            <i class="fa fa-print"></i> Générer la vignette
                       </button><br>
                        <div class="container cont" style="background:<?php echo MENU_H?>;border-radius: 5%;">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="img/flag2.jpg" style="width:100px;height:100px">
                                </div>
                                <div class="col-md-8">
                                    <h1 style="text-align:center;font-size: 40px;color: #ffffff;font-weight: bold;">
                                        REPUBLIQUE GABONAISE
                                    </h1>
                                    <h3 style="text-align:center;font-size: 40px;color: #ffffff;font-weight: bold;">Vignette de suivi de conduite</h3>
                                </div>
                                <div class="col-md-2">
                                    <img src="img/dev2.png" style="width:100px;height:100px">
                                </div>
                            </div>
                            <div class="row" style="margin-top:15%;margin: 0;">
                                <div class="col-md-6" style="">
                                    <p style="font-size: 90px;font-weight: bold; text-align: center;position: relative;top: 15%;background: <?php echo MENU_N?>;">
                                        N°
                                        <?php 
                                            if ($data['id_ve'] >= 1 && $data['id_ve'] <= 9) {
                                                echo '0000'.$data['id_ve'];
                                            }if ($data['id_ve'] >= 10 && $data['id_ve'] <= 99) {
                                                echo '000'.$data['id_ve'];
                                            }if ($data['id_ve'] >= 100 && $data['id_ve'] <= 999) {
                                                echo '00-'.$data['id_ve'];
                                            }if ($data['id_ve'] >= 1000 && $data['id_ve'] <= 9999) {
                                                echo '0-'.$data['id_ve'];
                                            }if ($data['id_ve'] >= 10000 && $data['id_ve'] <= 99999) {
                                                echo $data['id_ve'];
                                            } 
                                        ?>
                                    </p>
                                    <img src="img/images_batela.jpg" class="car-image" style="width:100%;margin-top:10%">
                                </div>
                                <div class="col-md-6" style="text-align:center;">
                                    <img src="temp/<?php echo $data['qrcode'] ?>" style="width:50%;position: relative;top: 35%;bottom: 35%;text-align: center;left: 20%;right: 20%;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content">
                                        <h1 style="color:#ffffff;font-weight: bold;">Batela</h1>
                                        <p style="color:#ffffff;">
                                            Vous à lutter contre les insécurités rencontrées dans les moyens de transport et aussi de les signaler au prêt des services compétents (ambulance, police, l’armée).
                                        </p>

                                        <h3 style="color:#ffffff;font-weight: bold;">Contact:</h3>
                                        <strong style="color:#ffffff;font-weight: bold;">E-mail:&nbsp;&nbsp;</strong><span style="color:#ffffff;">batela@gmail.com</span><br>
                                        <strong style="color:#ffffff;font-weight: bold;">Tel:&nbsp;&nbsp;</strong><span style="color:#ffffff;">778787889</span><br>
                                        <strong style="color:#ffffff;font-weight: bold;">Fax:&nbsp;&nbsp;</strong><span style="color:#ffffff;">1455667</span><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row row2 content">
                                        <h2 style="color:#ffffff;font-weight: bold;">
                                            Nos partenaires
                                        </h2>
                                      <div class="column">
                                        <img src="img/airtel.png" alt="Snow" style="width:100%">
                                      </div>
                                      <div class="column">
                                        <img src="img/mobicash.png" alt="Forest" style="width:100%">
                                      </div>
                                      <div class="column">
                                        <img src="img/ubg.png" alt="Snow" style="width:100%">
                                      </div>
                                      <div class="column">
                                        <img src="img/UBAA.png" alt="Forest" style="width:100%">
                                      </div>
                                      <div class="column">
                                        <img src="img/orabank.png" alt="Mountains" style="width:100%">
                                      </div>

                                      <div class="column">
                                        <img src="img/Logo-laposte.png" alt="Snow" style="width:100%">
                                      </div>
                                      
                                      <div class="column">
                                        <img src="img/Ecobank_Logo.png" alt="Mountains" style="width:100%">
                                      </div>

                                      <div class="column">
                                        <img src="img/finam.png" alt="Snow" style="width:100%">
                                      </div>
                                      <div class="column">
                                        <img src="img/loxia.png" alt="Forest" style="width:100%">
                                      </div>
                                     
                                    </div>
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

       
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/libs/jquery/html2canvas.js"></script>
        <script type="text/javascript" src="assets/libs/jquery/jsPdf.debug.js"></script>
        <script src="assets/libs/jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css">
        <script>
            $(document).ready(function(){

                $('#msg-error').hide();
                $('#msg-id_user').hide();

                $('.btn-print').click(function () {   
                    /*html2canvas($('.cont')[0], {
                        onrendered: function (canvas) {
                            var data = canvas.toDataURL();
                            var docDefinition = {
                                content: [{
                                    image: data,
                                    width: 500
                                }]
                            };
                            pdfMake.createPdf(docDefinition).download("customer-details.pdf");
                        }
                    });*/

                    html2canvas($('.cont')[0], {
                      onrendered:function(canvas) {

                          //返回图片URL，参数：图片格式和清晰度(0-1)
                          var pageData = canvas.toDataURL();

                          //方向默认竖直，尺寸ponits，格式a4【595.28,841.89]
                          var pdf = new jsPDF('l', 'mm', [595.28,841.89]);
                          //var pdf = new jsPDF('', 'pt', 'a4');

                          //需要dataUrl格式
                          pdf.addImage(pageData, 'JPEG', 0, 0, 850.28, 592.28/canvas.width * canvas.height );

                          pdf.save('content.pdf');

                      }
                    });

                });


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
