<?php 

 include("../config/db.php");
 include("../config/styles.php");
 include("../config/statiques.php");
 include("../config/functions.php");
 include("../config/access.php");

 extract($_POST);
 
 $sql_info = "SELECT * FROM fonctionnalites WHERE id_profil='".$id."' ";
 $result_info = mysqli_query($db,$sql_info);
 $fonctions = mysqli_fetch_array($result_info);

 ?>

<input type="hidden" id="id" value="<?php echo $id ?>">
<input type="hidden" id="id_fonc" value="<?php echo $fonctions['id_fonc'] ?>">
 <table id="datatables" class="table table-bordered dt-responsive  nowrap w-100">
    <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" <?php echo deactivate_button($AJOUTER, AJOUTER) ?> class="btn btn-primary btn-valider"><i class="fa fa-check"></i> Valider</button><br><br>
    <h4 class="card-title"><i class="bx bx-group"></i> Listes des fonctionnalités</h4>
    <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
    <tr>
        <th>Fonctionnalités</th>
        <th>Accès</th>
        <th>Statut</th>
    </tr>
    </thead>


    <tbody>
    <tr>
        <td>
           <h1>
                <i class="fa fa-angle-double-right"></i> Bibliothèques
           </h1>
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['bib'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="bib" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="bib">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['bib']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Informations entreprises
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['info_ent'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="info_ent" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="info_ent">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['info_ent']) ?>
        </td>
    </tr>
    <tr>
        <td>
            <h1>
                <i class="fa fa-angle-double-right"></i> Utilisateurs
           </h1>
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['users'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="users" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="users">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['users']) ?>
        </td>
    </tr>
    
    <tr>
        <td>
            Gestions utilisateurs
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_users'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_users" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_users">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_users']) ?>
        </td>
    </tr>

    <tr>
        <td>
            Gestions chauffeurs
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_chauffeurs'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_chauffeurs" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_chauffeurs">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_chauffeurs']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Gestions profils
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_pro'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_pro" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_pro">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_pro']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Droits
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['droits'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="droits" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="droits">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['droits']) ?>
        </td>
    </tr>

     <tr>
        <td>
            <h1>
                <i class="fa fa-angle-double-right"></i> Appréciations
           </h1>
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['ap'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="ap" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="ap">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['ap']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Gestions conduites
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_conduites'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_conduites" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_conduites">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_conduites']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Gestions dialogues
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_dialogues'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_dialogues" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_dialogues">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_dialogues']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Gestions conditions
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_conditions'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_conditions" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_conditions">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_conditions']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Gestions vitesses
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_vitesses'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_vitesses" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_vitesses">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_vitesses']) ?>
        </td>
    </tr>
    <tr>
        <td>
            <h1>
                <i class="fa fa-angle-double-right"></i> Signaler problèmes
           </h1>
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['sp'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="sp" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="sp">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['sp']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Gestions signals
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_signals'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_signals" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_signals">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_signals']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Gestions problèmes
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['gestions_problemes'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_problemes" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="gestions_problemes">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['gestions_problemes']) ?>
        </td>
    </tr>
    <tr>
        <td>
            <h1>
                <i class="fa fa-angle-double-right"></i> Notifications
           </h1>
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['noti'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="noti" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="noti">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['noti']) ?>
        </td>
    </tr>
    <tr>
        <td>
            <h1>
                <i class="fa fa-angle-double-right"></i> Tableau de bord
           </h1>
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['tb'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="tb" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="tb">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['tb']) ?>
        </td>
    </tr>

    </tbody>
</table>



<!-- Required datatable js -->
<!-- JAVASCRIPT -->
<!--  <script src="assets/libs/jquery/jquery.min.js"></script> -->
<!--  <script src="assets/libs/jquery/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css"> -->
<script>
    $(document).ready(function(){

        $('.btn-valider').click(function(e){
            e.preventDefault();

            var bib = $('#bib').val();
            var info_ent = $('#info_ent').val();

            var users = $('#users').val();
            var gestions_users = $('#gestions_users').val();
            var gestions_chauffeurs = $('#gestions_chauffeurs').val();
            var gestions_pro = $('#gestions_pro').val();
            var droits = $('#droits').val();

            var ap = $('#ap').val();
            var gestions_conduites = $('#gestions_conduites').val();
            var gestions_dialogues = $('#gestions_dialogues').val();
            var gestions_conditions = $('#gestions_conditions').val();
            var gestions_vitesses = $('#gestions_vitesses').val();

            var sp = $('#sp').val();
            var gestions_signals = $('#gestions_signals').val();
            var gestions_problemes = $('#gestions_problemes').val();

            var noti = $('#noti').val();

            var tb = $('#tb').val();

            var id_fonc = $('#id_fonc').val();
            var id = $('#id').val();

            if ($('#bib').is(':checked')) {bib = 1;}
            else if(!$('#bib').is(':checked')){bib = 0;}
            if ($('#info_ent').is(':checked')) {info_ent = 1;}
            else if(!$('#info_ent').is(':checked')){info_ent = 0;}

            if ($('#users').is(':checked')) {users = 1;}
            else if(!$('#users').is(':checked')){users = 0;}
            if ($('#gestions_users').is(':checked')) {gestions_users = 1;}
            else if(!$('#gestions_users').is(':checked')){gestions_users = 0;}
            if ($('#gestions_chauffeurs').is(':checked')) {gestions_chauffeurs = 1;}
            else if(!$('#gestions_chauffeurs').is(':checked')){gestions_chauffeurs = 0;}
            if ($('#gestions_pro').is(':checked')) {gestions_pro = 1;}
            else if(!$('#gestions_pro').is(':checked')){gestions_pro = 0;}
            if ($('#droits').is(':checked')) {droits = 1;}
            else if(!$('#droits').is(':checked')){droits = 0;}

            if ($('#ap').is(':checked')) {ap = 1;}
            else if(!$('#ap').is(':checked')){ap = 0;}
            if ($('#gestions_conduites').is(':checked')) {gestions_conduites = 1;}
            else if(!$('#gestions_conduites').is(':checked')){gestions_conduites = 0;}
            if ($('#gestions_dialogues').is(':checked')) {gestions_dialogues = 1;}
            else if(!$('#gestions_dialogues').is(':checked')){gestions_dialogues = 0;}
            if ($('#gestions_conditions').is(':checked')) {gestions_conditions = 1;}
            else if(!$('#gestions_conditions').is(':checked')){gestions_conditions = 0;}
            if ($('#gestions_vitesses').is(':checked')) {gestions_vitesses = 1;}
            else if(!$('#gestions_vitesses').is(':checked')){gestions_vitesses = 0;}
            
            if ($('#sp').is(':checked')) {sp = 1;}
            else if(!$('#sp').is(':checked')){sp = 0;}
            if ($('#gestions_signals').is(':checked')) {gestions_signals = 1;}
            else if(!$('#gestions_signals').is(':checked')){gestions_signals = 0;}
            if ($('#gestions_problemes').is(':checked')) {gestions_problemes = 1;}
            else if(!$('#gestions_problemes').is(':checked')){gestions_problemes = 0;}

            if ($('#noti').is(':checked')) {noti = 1;}
            else if(!$('#noti').is(':checked')){noti = 0;}

            if ($('#tb').is(':checked')) {tb = 1;}
            else if(!$('#tb').is(':checked')){tb = 0;}
           
            $.ajax({  
                    url:"./traitements/modifier_gestions_fonctionnalites.php",  
                    method:"POST",  
                    data:{bib:bib, users:users, ap:ap,
                      tb:tb, info_ent:info_ent, gestions_conduites:gestions_conduites, gestions_dialogues:gestions_dialogues,
                      gestions_conditions:gestions_conditions, gestions_users:gestions_users, gestions_chauffeurs:gestions_chauffeurs, gestions_pro:gestions_pro,
                      droits:droits, gestions_vitesses:gestions_vitesses, sp:sp,
                     gestions_signals:gestions_signals, gestions_problemes:gestions_problemes, noti:noti,
                       id_fonc:id_fonc},  
                    success:function(res)  
                    {          
                    //alert(res);                
                          load_gestions_fonctionnalites(id);
                    },
                    cache: false  
                });
        });

        
        function load_gestions_fonctionnalites(id){

                    $.ajax({  
                        url:"./traitements/load_gestions_fonctionnalites.php",  
                        method:"POST",  
                        data:{id:id},  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_fonctionnalites').html(res);                              
                        },
                        cache: false  
                    });
                }
    
    });
</script>

