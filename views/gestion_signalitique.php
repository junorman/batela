            <?php include 'header.php' ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <input type="hidden" id="ent" value="<?php echo $row_info_ent ?>">
                    <div class="contaiSner-fluid">
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success" href="?page=parametrages_infos_entreprises&type=1"><i class="fa fa-arrow-left"></i> Retour</a>
                        <?php //if ($row_info_ent > 0) {?>
                        <a style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-success btn-ent" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">
                               <i class="bx bx-edit-alt"></i> Edition des données entreprises
                        </a>
                        <?php //} ?>
                        <a style="background: <?php echo MENU_N ?>;border: 1px solid <?php echo BORDER_N ?>;" class="btn btn-success" href="?page=accueil"><i class="fa fa-globe"></i> Menu </a>
                        <div class="row">
                           <h4 class="my-3">Gestion signalitique</h4>
                           <?php if ($row_info_ent == 0) {?>
                           <div class="col-md-12 form-ent">
                               <div class="row">
                                <div class="col-md-9">
                                    <div class="card" style="border: 3px solid <?php echo BUTTON_B ?>;">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4"><i class="bx bx-calculator"></i> Creation de l'entreprise
                                            </h4>
                                            <input type="hidden" id="row_info_ent" value="<?php echo $row_info_ent ?>">
                                            <form class="form-horizontal" id="image_profil">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="designation" name="designation" placeholder="Désignation">
                                                            <span id="msg-designation"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="sigle" placeholder="Sigle" name="sigle">
                                                            <span id="msg-sigle"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="nif" placeholder="NIF" name="nif">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="rccm" placeholder="RCCM" name="rccm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="capital_social" placeholder="Capital social" name="capital_social">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="adresse" placeholder="Adresse géographique" name="adresse">
                                                            <span id="msg-adresse"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                           <input type="text" class="press_enter form-control" id="bp" placeholder="B.P" name="bp">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="tel" placeholder="Téléphone" name="tel">
                                                            <span id="msg-tel"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="email" placeholder="Adresse électronique" name="email">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                              
                                               <div class="row">
                                                   
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter form-control" id="siteweb" placeholder="Site web" name="siteweb">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input name="chiffre_daffaire" type="text" class="press_enter form-control" id="chiffre_daffaire" placeholder="Chiffre d'affaires" name="chiffre_daffaire">
                                                            <span id="msg-chiffre_daffaire"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" id="file" name="file" >
                                                            <span id="msg-file"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                           <textarea class="form-control" placeholder="A propos..." id="mots" name="mots"></textarea>
                                                            <span id="msg-mots"></span>
                                                        </div>
                                                    </div>

                                               </div>
                                               <div class="row">
                                                   <div class="col-md-4">
                                                       <button class="btn btn-primary btn-save">
                                                          <i class="fa fa-check"></i> Valider
                                                       </button>
                                                   </div>
                                               </div>
                                            </form>


                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->

                                <div class="col-md-3">
                                    <div class="card text-center" style="border: 3px solid <?php echo BUTTON_B ?>;"><br>
                                        <h4 class="card-title mb-4"><i class="fa fa-camera"></i> Logo
                                            </h4>
                                        <div class="card-body text-center" id="preview" alt="preview">
                                            <img src="img/favicon.png" style="width: 200px;height:150px;text-align: center;">
                                        </div>
                                    </div>
                                </div>

                                

                                </div>

                           
                           <!-- end row -->
                           </div>
                           <?php } ?>
                        </div>
                        

                        
                        <!-- end row -->

                        <?php //if ($row_info_ent == 1) { ?>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-lg-8 load_card_ent">
                                
                            </div>
                            <div class="col-md-2"></div>
                            <!-- end col -->
                        </div>
                        <?php //} ?>
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

        <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background:<?php echo MENU_H ?>;">
                        <h5 style="color: #ffffff;" class="modal-title" id="myExtraLargeModalLabel">Edition des données</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                               <div class="row">
                                <div class="col-md-9">
                                    <div class="card" style="bsorder: 3px solid <?php echo BUTTON_B ?>;">
                                        <div class="card-body">
                                            

                                            <form class="form-horizontal" id="image_profil2">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="designation2" name="designation2" placeholder="Désignation" value="<?php echo $designation ?>">
                                                            <span id="msg-designation2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="sigle2" placeholder="Sigle" name="sigle2" value="<?php echo $sigle ?>">
                                                            <span id="msg-sigle2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="nif2" placeholder="NIF" name="nif2" value="<?php echo $nif ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="rccm2" placeholder="RCCM" name="rccm2" value="<?php echo $rccm ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="capital_social2" placeholder="Capital social" name="capital_social2" value="<?php echo $capital_social ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="adresse2" placeholder="Adresse géographique" name="adresse2" value="<?php echo $adresse ?>">
                                                            <span id="msg-adresse2"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                           <input type="text" class="press_enter2 form-control" id="bp2" placeholder="B.P" name="bp2" value="<?php echo $bp ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="tel2" placeholder="Téléphone" name="tel2" value="<?php echo $tel ?>">
                                                            <span id="msg-tel2"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="email2" placeholder="Adresse électronique" name="email2" value="<?php echo $email ?>">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                              
                                               <div class="row">
                                                   
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="siteweb2" placeholder="Site web" name="siteweb2" value="<?php echo $siteweb ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="press_enter2 form-control" id="chiffre_daffaire2" placeholder="Chiffre d'affaires" name="chiffre_daffaire2" value="<?php echo $chiffre_daffaire ?>">
                                                            <span id="msg-chiffre_daffaire2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" id="file2" name="file2" >
                                                            <span id="msg-file2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                           <textarea class="form-control" placeholder="A propos..." id="mots2" name="mots2"></textarea>
                                                            <span id="msg-mots2"></span>
                                                        </div>
                                                    </div>

                                               </div>

                                               <div class="row">
                                                   <div class="col-md-4">
                                                       <button class="btn btn-primary btn-edit">
                                                          <i class="fa fa-edit"></i> Modifier
                                                       </button>
                                                   </div>
                                               </div>
                                            </form>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->

                                <div class="col-md-3">
                                    <div class="card text-center" style="border: 3px solid <?php echo BUTTON_B ?>;"><br>
                                        <h4 class="card-title mb-4"><i class="fa fa-camera"></i> Logo 
                                            </h4>
                                        <div class="card-body text-center" id="preview2" alt="preview2">
                                            
                                            <img src="img/logo/<?php echo $logo ?>" 
                                                style="width: 200px;height:150px;text-align: center;">
                                        </div>
                                    </div>

                                    <form class="form-horizontal" id="image_profil3">
                                        <div class="card text-center" 
                                        style="border: 3px solid <?php echo BUTTON_B ?>;"><br>
                                            <h4 class="card-title mb-2"><i class="fa fa-camera">
                                                
                                            </i> Cachet
                                            </h4>
                                            <div class="card-body text-center" id="previewx" 
                                            alt="previewx">
                                                <img src="img/cachet/<?php echo $cachet ?>" 
                                                style="width: 200px;height:150px;text-align: center;">
                                            </div>
                                        </div>
                                        <input type="file" name="file" id="filex">
                                        <span id="msg-filex"></span>
                                        <br><br>
                                        <button class="btn btn-primary btn-edit2">
                                          <i class="fa fa-upload"></i> Mettre un cachet
                                        </button>
                                    </form>
                                    
                                </div>

                                  

                                </div>

                           
                           <!-- end row -->
                           </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    
       
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css">

        <script>
          $(document).ready(function(){
              
          });
          </script>

        <script>
          $(document).ready(function(){
               var i=1;
               var image_js = $('#image_js').val();
               var ent = $('#ent').val();
               if (ent > 0) {
                $('.btn-ent').show();
               }else{
                $('.btn-ent').hide();
               }

                $('#file').on('change', function(e){

                    var val = 0;
                    var interval = setInterval(function(){

                        val = val + 1;
                        
                        //$('#percent1').text(val + '%');

                        if (val == 100) {
                            clearInterval(interval);
                        }
                    }, 50);

                    //$('.btn-upload').show();

                        function readURL(input){
                      if (input.files && input.files[0]) {
                          var reader = new FileReader();
                          reader.onload=function(e){
                            //$('#uploadForm + img').remove();
                           var template = 
                          '<div class="text-center" style="text-align: center;">'
                        +'<img src="'+e.target.result+'" class="text-center" alt="avatar" style="width: 200px;height:150px;text-align: center;" >'
                            
                            +'<br><br><br><br> <div id="percent1" style="font-weight: bold;"></div>'
                            //+'<button class="btn btn-danger btn-img1">x</button>'
                            +'</div>';


                            $('#preview').html(template);

                    
                          }
                          reader.readAsDataURL(input.files[0]);
                      }
                   }

                   $(document).on('change','#file',function(){
                       readURL(this);
                   });

                   $(document).on('click','.btn-img1',function(e){
                       e.preventDefault();  
                       //$('#preview').html('<img src="img/profil/'+image_js+'" class="img-thumbnail rounded-circle" alt="avatar">');
                       
                       return false;
                   });

                });

                $('#filex').on('change', function(e){

                    var val = 0;
                    var interval = setInterval(function(){

                        val = val + 1;
                        
                        //$('#percent1').text(val + '%');

                        if (val == 100) {
                            clearInterval(interval);
                        }
                    }, 50);

                    //$('.btn-upload').show();

                        function readURL(input){
                      if (input.files && input.files[0]) {
                          var reader = new FileReader();
                          reader.onload=function(e){
                            //$('#uploadForm + img').remove();
                           var template = 
                          '<div class="text-center" style="text-align: center;">'
                        +'<img src="'+e.target.result+'" class="text-center" alt="avatar" style="width: 200px;height:150px;text-align: center;" >'
                            
                            +'<br><br><br><br> <div id="percent1" style="font-weight: bold;"></div>'
                            //+'<button class="btn btn-danger btn-img1">x</button>'
                            +'</div>';


                            $('#previewx').html(template);

                    
                          }
                          reader.readAsDataURL(input.files[0]);
                      }
                   }

                   $(document).on('change','#filex',function(){
                       readURL(this);
                   });

                   $(document).on('click','.btn-img1',function(e){
                       e.preventDefault();  
                       //$('#preview').html('<img src="img/profil/'+image_js+'" class="img-thumbnail rounded-circle" alt="avatar">');
                       
                       return false;
                   });

                });

                $('#file2').on('change', function(e){

                    var val = 0;
                    var interval = setInterval(function(){

                        val = val + 1;
                        
                        //$('#percent1').text(val + '%');

                        if (val == 100) {
                            clearInterval(interval);
                        }
                    }, 50);

                    //$('.btn-upload').show();

                        function readURL(input){
                      if (input.files && input.files[0]) {
                          var reader = new FileReader();
                          reader.onload=function(e){
                            //$('#uploadForm + img').remove();
                           var template = 
                          '<div class="text-center" style="text-align: center;">'
                        +'<img src="'+e.target.result+'" class="text-center" alt="avatar" style="width: 200px;height:150px;text-align: center;" >'
                            
                            +'<br><br><br><br> <div id="percent1" style="font-weight: bold;"></div>'
                            //+'<button class="btn btn-danger btn-img1">x</button>'
                            +'</div>';


                            //$('#preview2').html(template);

                    
                          }
                          reader.readAsDataURL(input.files[0]);
                      }
                   }

                   $(document).on('change','#file2',function(){
                       readURL(this);
                   });



                });

                var row_info_ent = $('#row_info_ent').val();

                if (row_info_ent == 0) {
                    $('.load_card_ent').hide();
                }
                load_ent();
                function load_ent(){

                    $.ajax({  
                    url:"./traitements/load_json_data_ent.php",  
                    method:"POST",  
                    //dataType: "JSON",  
                    success:function(res)  
                    {     
                          $('#designation2').val(res.split('kata')[0]);                        
                          $('#sigle2').val(res.split('kata')[1]);                        
                          $('#nif2').val(res.split('kata')[2]);                        
                          $('#rccm2').val(res.split('kata')[3]);                        
                          $('#capital_social2').val(res.split('kata')[4]);                        
                          $('#adresse2').val(res.split('kata')[5]);                        
                          $('#bp2').val(res.split('kata')[6]);                        
                          $('#tel2').val(res.split('kata')[7]);                        
                          $('#email2').val(res.split('kata')[8]);                        
                          $('#siteweb2').val(res.split('kata')[9]);                        
                          $('#chiffre_daffaire2').val(res.split('kata')[10]);                        
                          $('#mots2').val(res.split('kata')[12]); 

                          var template = 
                          '<div class="text-center" style="text-align: center;">'
                        +'<img src="img/logo/'+res.split('kata')[11]+'" class="text-center" alt="avatar" style="width: 200px;height:150px;text-align: center;" >'
                            
                            +'<br><br><br><br> <div id="percent1" style="font-weight: bold;"></div>'
                            //+'<button class="btn btn-danger btn-img1">x</button>'
                            +'</div>';

                            var template2 = 
                          '<div class="text-center" style="text-align: center;">'
                        +'<img src="img/cachet/'+res.split('kata')[13]+'" class="text-center" alt="avatar" style="width: 200px;height:150px;text-align: center;" >'
                            
                            +'<br><br><br><br> <div id="percent12" style="font-weight: bold;"></div>'
                            //+'<button class="btn btn-danger btn-img1">x</button>'
                            +'</div>';


                            $('#preview2').html(template);                       
                            $('#previewx').html(template2);                       
                    },
                     
                   });
                }

                $('.btn-save').click(function(e){
                   e.preventDefault();
                   var form = $('#image_profil')[0];
                   var data = new FormData(form);
                   var file = $('#file').val();
                   var designation = $('#designation').val();
                   var sigle = $('#sigle').val();
                   var chiffre_daffaire = $('#chiffre_daffaire').val();

                        $('#add_name').show();
                        if (designation.length == '') {
                         $('#msg-designation').show();
                         $('#msg-designation').
                         html("Veuillez saisir la désignation ***").fadeIn();
                         $('#msg-designation').focus();
                         $('#msg-designation').css("color", "red");
                         setTimeout(function(){
                         $('#msg-designation').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (sigle.length == '') {
                         $('#msg-sigle').show();
                         $('#msg-sigle').
                         html("Veuillez saisir le sigle ***").fadeIn();
                         $('#msg-sigle').focus();
                         $('#msg-sigle').css("color", "red");
                         setTimeout(function(){
                         $('#msg-sigle').fadeOut('slow');
                         },5000);
                         return false;
                    }/*else if (chiffre_daffaire.length == '') {
                         $('#msg-chiffre_daffaire').show();
                         $('#msg-chiffre_daffaire').
                         html("Veuillez saisir le chiffre d'affaire ***").fadeIn();
                         $('#msg-chiffre_daffaire').focus();
                         $('#msg-chiffre_daffaire').css("color", "red");
                         setTimeout(function(){
                         $('#msg-chiffre_daffaire').fadeOut('slow');
                         },5000);
                         return false;
                    }*/else{

                        row_info_ent = 1;
                                                       
                        $.ajax({  
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url:'./traitements/gestion_signalitique.php',
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 600000,  
                            success:function(res)  
                                {   
                                    swal({
                                    title: "Signalitique",
                                    text: "Enregistrement effectué avec succès",
                                        type: "success"
                                    },function(){
                                        
                                    });

                                    if (row_info_ent ==1) {
                                        $('.btn-ent').show();
                                        $('.load_card_ent').show();
                                        load_card_ent();
                                    }
                                    $('.form-ent').hide();
                                    load_ent();
                                    $('.btn-upload').hide();
                                }  
                          });
                                
                    }
                   
                });


                $('.btn-edit').click(function(e){
                   e.preventDefault();
                   var form = $('#image_profil2')[0];
                   var data = new FormData(form);
                   var file = $('#file2').val();
                   var designation = $('#designation2').val();
                   var sigle = $('#sigle2').val();
                   var chiffre_daffaire2 = $('#chiffre_daffaire2').val();

                        if (designation.length == '') {
                         $('#msg-designation2').show();
                         $('#msg-designation2').
                         html("Veuillez saisir la désignation ***").fadeIn();
                         $('#msg-designation2').focus();
                         $('#msg-designation2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-designation2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (sigle.length == '') {
                         $('#msg-sigle2').show();
                         $('#msg-sigle2').
                         html("Veuillez saisir le sigle ***").fadeIn();
                         $('#msg-sigle2').focus();
                         $('#msg-sigle2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-sigle2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (chiffre_daffaire2.length == '') {
                         $('#msg-chiffre_daffaire2').show();
                         $('#msg-chiffre_daffaire2').
                         html("Veuillez saisir le chiffre d'affaire ***").fadeIn();
                         $('#msg-chiffre_daffaire2').focus();
                         $('#msg-chiffre_daffaire2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-chiffre_daffaire2').fadeOut('slow');
                         },5000);
                         return false;
                    }else{

                        swal({
                          title: "Etes vous sûre?",
                          text: "D'effectuer la modification de cette information?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Oui modifier",
                          cancelButtonText: "Non, annuler la modification!",
                          closeOnConfirm: true,
                          closeOnCancel: false
                        },
                        function(isConfirm){
                          if (isConfirm) {
                                
                                $.ajax({  
                                    type: "POST",
                                    enctype: 'multipart/form-data',
                                    url:'./traitements/modifier_gestion_signalitique.php',
                                    data: data,
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    timeout: 600000,  
                                    success:function(res)  
                                        {   
                                            load_card_ent();
                                        }  
                                  });
                                   // submitting the form when user press yes
                          } else {
                            swal("Annuler", "Modification annuler", "error");
                          }
                        });


                    }

                   
                });

                $('.btn-edit2').click(function(e){
                   e.preventDefault();
                   var form = $('#image_profil3')[0];
                   var data = new FormData(form);
                   var filex = $('#filex').val();
                  

                    if (filex.length == '') {
                     $('#msg-filex').show();
                     $('#msg-filex').
                     html("Veuillez uploader un cachet ***").fadeIn();
                     $('#msg-filex').focus();
                     $('#msg-filex').css("color", "red");
                     setTimeout(function(){
                     $('#msg-filex').fadeOut('slow');
                     },5000);
                     return false;
                    }else{

                        swal({
                          title: "Etes vous sûre?",
                          text: "De mettre un cachet?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Oui modifier",
                          cancelButtonText: "Non, annuler la modification!",
                          closeOnConfirm: true,
                          closeOnCancel: false
                        },
                        function(isConfirm){
                          if (isConfirm) {
                                
                                $.ajax({  
                                    type: "POST",
                                    enctype: 'multipart/form-data',
                                    url:'./traitements/modifier_cachet.php',
                                    data: data,
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    timeout: 600000,  
                                    success:function(res)  
                                        {   
                                            //alert(res);
                                        }  
                                  });
                                   // submitting the form when user press yes
                          } else {
                            swal("Annuler", "Modification annuler", "error");
                          }
                        });

                    }

                });


                load_card_ent();
                function load_card_ent(){

                    $.ajax({  
                        url:"./traitements/load_card_ent.php",  
                        method:"POST",  
                        data:{nom:"nom"},  
                        success:function(res)  
                        {     
                            $('.load_card_ent').html(res);                              
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
