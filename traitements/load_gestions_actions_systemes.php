<?php 

 include("../config/db.php");
 include("../config/styles.php");
 include("../config/statiques.php");
 include("../config/functions.php");
 include("../config/access.php");

 extract($_POST);
 
 $sql_info = "SELECT * FROM actions_systemes WHERE id_profil='".$id."' ";
 $result_info = mysqli_query($db,$sql_info);
 $fonctions = mysqli_fetch_array($result_info);

 ?>

<input type="hidden" id="id" value="<?php echo $id ?>">
<input type="hidden" id="id_ac" value="<?php echo $fonctions['id_ac'] ?>">
 <table id="datatables" class="table table-bordered dt-responsive  nowrap w-100">
    <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" <?php echo deactivate_button($AJOUTER, AJOUTER) ?> class="btn btn-primary btn-valider"><i class="fa fa-check"></i> Valider</button><br><br>
    <h4 class="card-title"><i class="bx bx-group"></i> Listes des actions systèmes</h4>
    <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
    <tr>
        <th>Fonctionnalités</th>
        <th>Accès</th>
        <th>Statut</th>
    </tr>
    </thead>


    <supprimerody>
    <tr>
        <td>
            Ajouter
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['ajouter'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="ajouter" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="ajouter">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['ajouter']) ?>
        </td>
    </tr>

    <tr>
        <td>
            Consulter
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['consulter'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="consulter" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="consulter">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['consulter']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Modifier
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['modifier'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="modifier" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="modifier">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['modifier']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Supprimer
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['supprimer'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="supprimer" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="supprimer">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['supprimer']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Activer
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['activer'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="activer" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="activer">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['activer']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Désactiver
        </td>
        <td>
            <div class="form-check mb-3">
                <?php 
                   if ($fonctions['desactiver'] == 1) {
                ?>
                <input class="form-check-input" type="checkbox" id="desactiver" checked>
                <?php
                   }else{
                ?>
                <input class="form-check-input" type="checkbox" id="desactiver">
                <?php
                   }
                 ?>
            </div>
        </td>
        <td>
           <?php echo check_access($fonctions['desactiver']) ?>
        </td>
    </tr>
    
   

    </supprimerody>
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

            var ajouter = $('#ajouter').val();
            var consulter = $('#consulter').val();
            var modifier = $('#modifier').val();
            var supprimer = $('#supprimer').val();
            var activer = $('#activer').val();
            var desactiver = $('#desactiver').val();
            var id_ac = $('#id_ac').val();
            var id = $('#id').val();

            if ($('#ajouter').is(':checked')) {ajouter = 1;}
            else if(!$('#ajouter').is(':checked')){ajouter = 0;}

            if ($('#consulter').is(':checked')) {consulter = 1;}
            else if(!$('#consulter').is(':checked')){consulter = 0;}

            if ($('#modifier').is(':checked')) {modifier = 1;}
            else if(!$('#modifier').is(':checked')){modifier = 0;}

            if ($('#supprimer').is(':checked')) {supprimer = 1;}
            else if(!$('#supprimer').is(':checked')){supprimer = 0;}

            if ($('#activer').is(':checked')) {activer = 1;}
            else if(!$('#activer').is(':checked')){activer = 0;}

            if ($('#desactiver').is(':checked')) {desactiver = 1;}
            else if(!$('#desactiver').is(':checked')){desactiver = 0;}

           

            $.ajax({  
                    url:"./traitements/modifier_gestions_actions_systemes.php",  
                    method:"POST",  
                    data:{ajouter:ajouter, consulter:consulter, modifier:modifier,
                      supprimer:supprimer, activer:activer, desactiver:desactiver,
                       id_ac:id_ac},  
                    success:function(res)  
                    {                          
                          load_gestions_actions_systemes(id);
                    },
                    cache: false  
                });
        });

        
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

