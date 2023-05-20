<?php 

 include("../config/db.php");
 include("../config/styles.php");
 include("../config/statiques.php");
 include("../config/functions.php");
 include("../config/access.php");

 extract($_POST);

 $consulter_vehicules = mysqli_query($db, "SELECT * FROM vehicules WHERE id_chauffeur='".$id_user."' ORDER BY id_ve DESC ");

 ?>

 <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
    <h4 class="card-title"><i class="bx bx-group"></i> Listes des véhicules</h4>
    <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
    <tr>
        <th>Véhicule</th>
        <th>Matricule</th>
        <th>Marque</th>
        <th>Nbre place</th>
        <th>Couleur</th>
        <th>Actions</th>
    </tr>
    </thead>


    <tbody>

    <?php while ($row = mysqli_fetch_array($consulter_vehicules)) {?>
    <tr>
        <td>
        	<?php echo $row['libelle_ve'] ?>
        </td>
        <td>
        	<?php echo $row['matricule'] ?>
        </td>
        <td>
        	<?php echo $row['marque'] ?>
        </td>
        <td>
        	<?php echo $row['nb_place'] ?>
        </td>
        <td style="background:<?php echo $row['couleur'] ?>">
        </td>
        <td>

            <div class="btn-group">
                <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="button" class="mode-paie btn btn-primary btn-show_invoice" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Actions <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <button <?php echo deactivate_button($MODIFIER, MODIFIER) ?> data-bs-toggle="modal" data-bs-target="#exampleModal" 

                     onclick="document.location.href='#'
                    document.gestions_vehicules.libelle2.value='<?php echo $row['libelle_ve']; ?>'
                    document.gestions_vehicules.matricule2.value='<?php echo $row['matricule']; ?>'
                    document.gestions_vehicules.marque2.value='<?php echo $row['marque']; ?>'
                    document.gestions_vehicules.nb_place2.value='<?php echo $row['nb_place']; ?>'
                    document.gestions_vehicules.couleur2.value='<?php echo $row['couleur']; ?>'
                   
                    document.gestions_vehicules.id.value='<?php echo $row['id_ve']; ?>'

                    "
                        class="dropdown-item">
                        <i class="bx bx-edit"></i> Modifier
                    </button>

                    <button <?php echo deactivate_button($SUPPRIMER, SUPPRIMER) ?> id="<?php echo $row['id_ve']; ?>" class="dropdown-item btn-delete">
                        <i class="bx bxs-trash"></i> Supprimer
                    </button>
                    <button id="<?php echo $row['id_ve']; ?>" 
                        data-id_chauffeur="<?php echo $row['id_chauffeur'] ?>"
                        class="dropdown-item btn-details">
                        <i class="fa fa-eye"></i> Détails
                    </button>

                    <a href="?page=vignettes&id_ve=<?php echo $row['id_ve']; ?>&id_chauffeur=<?php echo $row['id_chauffeur']; ?>" 
                        data-id_chauffeur="<?php echo $row['id_chauffeur'] ?>"
                        class="dropdown-item">
                        <i class="fa fa-credit-card"></i> Vignette
                    </a>
                    
                </div>
            </div>

        </td>
    </tr>

   	<?php } ?>
    </tbody>
</table>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
            <h5 class="modal-title" id="exampleModalLabel" style="color: <?php echo TD_HEADER_N ?>;"><i class="bx bx-edit-alt"></i> Détails du véhicule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body load_details_vehicules">
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>
</div>

<input type="text" id="id_user" value="<?php echo $id_user ?>">

<!-- Required datatable js -->
<!-- JAVASCRIPT -->
       <!--  <script src="assets/libs/jquery/jquery.min.js"></script> -->
       <!--  <script src="assets/libs/jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css"> -->
        <script>
            $(document).ready(function(){

                $('#msg-error2').hide();
                $('#msg-libelle2').hide();
                $('#msg-matricule2').hide();
                $('#msg-marque2').hide();
                $('#msg-nb_place2').hide();

                var id_user = $('#id_user').val();

                $('.btn-details').click(function(e){
                    e.preventDefault();
                    var id = $(this).attr('id');
                    var id_chauffeur = $(this).data('id_chauffeur');
                    
                    $.ajax({  
                        url:"./traitements/load_details_vehicules.php",  
                        method:"POST",  
                        data:{id:id, id_chauffeur:id_chauffeur},  
                        success:function(res)  
                        {     
                            
                            $('#exampleModal2').modal("show");
                            $('.load_details_vehicules').html(res);
                              
                        },
                            cache: true  
                        });
                });

                $('.btn-edit').click(function(e){
                    e.preventDefault();

                    var libelle2 = $('#libelle2').val();
                    var matricule2 = $('#matricule2').val();
                    var marque2 = $('#marque2').val();
                    var nb_place2 = $('#nb_place2').val();
                    var couleur2 = $('#couleur2').val();
                    var id = $('#id').val();

                    if (libelle2.length == '') {
                         $('#msg-libelle2').show();
                         $('#msg-libelle2').
                         html("Veuillez saisir le nom du véhicule ***").fadeIn();
                         $('#msg-libelle2').focus();
                         $('#msg-libelle2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-libelle2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (matricule2.length == '') {
                         $('#msg-matricule2').show();
                         $('#msg-matricule2').
                         html("Veuillez saisir le matricule ***").fadeIn();
                         $('#msg-matricule2').focus();
                         $('#msg-matricule2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-matricule2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (marque2.length == '') {
                         $('#msg-marque2').show();
                         $('#msg-marque2').
                         html("Veuillez saisir la marque ***").fadeIn();
                         $('#msg-marque2').focus();
                         $('#msg-marque2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-marque2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (nb_place2.length == '') {
                         $('#msg-nb_place2').show();
                         $('#msg-nb_place2').
                         html("Veuillez saisir le nombre de place ***").fadeIn();
                         $('#msg-nb_place2').focus();
                         $('#msg-nb_place2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-nb_place2').fadeOut('slow');
                         },5000);
                         return false;
                    }

                    else{

                    	swal({
		              title: "Modification",
		              text: "Souhaitez vous modifier ce véhicule?",
		              type: "warning",
		              showCancelButton: true,
		              confirmButtonColor: "success",
		              confirmButtonText: "Oui modifier",
		              cancelButtonText: "Non, annuler la modification!",
		              closeOnConfirm: false,
		              closeOnCancel: false
		            },
		            function(isConfirm){
		              if (isConfirm) {

                       $.ajax({  
                        url:"./traitements/modifier_gestions_vehicules.php",  
                        method:"POST",  
                        data:{libelle:libelle2, matricule:matricule2, marque:marque2,
                            nb_place:nb_place2, couleur:couleur2,
                           id:id},  
                        success:function(res)  
                        {     
                            
                            if (res == "success") {

	                              swal({
			                            title: "Véhicule",
			                            text: "Modification effectuée avec succès",
			                            type: "success"
			                        },function(){
			                            load_gestions_vehicules(id_user);
			                            $('#exampleModal').modal("hide");
			                        });

	                        }else{

	                              swal({
			                          title: "Une erreur s'est produite",
			                          text: "Cet élément existe déjà",
			                          type: "error",
			                         });
	                        }
                              
	                        },
	                        cache: false  
	                    });
                       } else {
		                    swal("Annuler", "Modification annuler", "error");
		                  }
		                });

                    }
                });
				
				$('.btn-delete').click(function(e){
                    e.preventDefault();

                    var id = $(this).attr('id');

                    swal({
		                  title: "supprimer",
		                  text: "Souhaitez vous supprimer ce véhicule?",
		                  type: "warning",
		                  showCancelButton: true,
		                  confirmButtonColor: "success",
		                  confirmButtonText: "Oui supprimer",
		                  cancelButtonText: "Non, annuler la suppression!",
		                  closeOnConfirm: true,
		                  closeOnCancel: false
		                },
		                function(isConfirm){
		                  if (isConfirm) {

	                    $.ajax({  
	                        url:"./traitements/supprimer_gestions_vehicules.php",  
	                        method:"POST",  
	                        data:{id:id},  
	                        success:function(res)  
	                        {     
	                            load_gestions_vehicules(id_user); 
	                            $('#exampleModal').modal("hide");                             
	                        },
	                        cache: false  
	                    });
	                    } else {
	                    swal("Annuler", "Suppression annuler", "warning");
	                  }
	                });


                });

                function load_gestions_vehicules(id_user){

                    $.ajax({  
                        url:"./traitements/load_gestions_vehicules.php",  
                        method:"POST",  
                        data:{id_user:id_user},  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_vehicules').html(res);                              
                        },
                        cache: false  
                    });
                }

                });
        </script>
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
<!-- <script src="assets/js/pages/datatables.init.js"></script> -->  
<script>
	$(document).ready(function(){$("#datatable").DataTable(
		{
		  "order": [0, 'desc'],
		  'ordering': false
		}
    )});
</script>