<?php 

 include("../config/db.php");
 include("../config/styles.php");
 include("../config/statiques.php");
 include("../config/functions.php");
 include("../config/access.php");

 $consulter_users = mysqli_query($db, "SELECT * FROM users WHERE type='CH' ORDER BY user_id DESC ");

 ?>

 <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
    <h4 class="card-title"><i class="bx bx-group"></i> Listes des chauffeurs</h4>
    <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
    <tr>
        <th>Nom & Prénom</th>
        <th>Adresse</th>
        <th>Email</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>


    <tbody>

    <?php while ($row = mysqli_fetch_array($consulter_users)) {?>
    <tr>
        <td>
        	<?php echo $row['user_nom'].' '.$row['user_prenom'] ?>
        </td>
        <td>
        	<?php echo $row['user_adresse'] ?>
        </td>
        <td>
        	<?php echo $row['user_email'] ?>
        </td>
        <td>
        	<?php echo $row['user_datereg'] ?>
        </td>
        <td>

            <div class="btn-group">
                <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="button" class="mode-paie btn btn-primary btn-show_invoice" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Actions <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <button <?php echo deactivate_button($MODIFIER, MODIFIER) ?> data-bs-toggle="modal" data-bs-target="#exampleModal" 

                     onclick="document.location.href='#'
                    document.emp_form.nom2.value='<?php echo $row['user_nom']; ?>'
                    document.emp_form.prenom2.value='<?php echo $row['user_prenom']; ?>'
                    document.emp_form.adresse2.value='<?php echo $row['user_adresse']; ?>'
                    document.emp_form.tel2.value='<?php echo $row['user_phone']; ?>'
                    document.emp_form.sexe2.value='<?php echo addcslashes($row['sexe'], "'"); ?>'
                    document.emp_form.date_nais2.value='<?php echo addcslashes($row['user_birthday'], "'"); ?>'
                    document.emp_form.id.value='<?php echo $row['user_id']; ?>'

                    "
                        class="dropdown-item">
                        <i class="bx bx-edit"></i> Modifier
                    </button>

                    <button <?php echo deactivate_button($SUPPRIMER, SUPPRIMER) ?> id="<?php echo $row['user_id']; ?>" class="dropdown-item btn-delete">
                        <i class="bx bxs-trash"></i> Supprimer
                    </button>
                    <a href="?page=gestions_vehicules&id_user=<?php echo $row['user_id'] ?>" 
                    <?php echo deactivate_button($ACTIVER, ACTIVER) ?> class="dropdown-item" >
                        <i class="fa fa-car"></i> Véhicules
                    </a>
                </div>
            </div>

        </td>
    </tr>

   	<?php } ?>
    </tbody>
</table>



<!-- Required datatable js -->
<!-- JAVASCRIPT -->
       <!--  <script src="assets/libs/jquery/jquery.min.js"></script> -->
       <!--  <script src="assets/libs/jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/libs/jquery/sweetalert.css"> -->
        <script>
            $(document).ready(function(){

                $('#msg-error2').hide();
                $('#msg-nom2').hide();
                $('#msg-prenom2').hide();
                $('#msg-date_nais2').hide();
                $('#msg-tel2').hide();

                $('.btn-edit').click(function(e){
                    e.preventDefault();

                    var nom2 = $('#nom2').val();
                    var prenom2 = $('#prenom2').val();
                    var adresse2 = $('#adresse2').val();
                    var tel2 = $('#tel2').val();
                    var sexe2 = $('#sexe2').val();
                    var date_nais2 = $('#date_nais2').val();
                    var id = $('#id').val();

                    if (nom2.length == '') {
                         $('#msg-nom2').show();
                         $('#msg-nom2').
                         html("Veuillez saisir le nom ***").fadeIn();
                         $('#msg-nom2').focus();
                         $('#msg-nom2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-nom2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (prenom2.length == '') {
                         $('#msg-prenom2').show();
                         $('#msg-prenom2').
                         html("Veuillez saisir le prénom ***").fadeIn();
                         $('#msg-prenom2').focus();
                         $('#msg-prenom2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-prenom2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (tel2.length == '') {
                         $('#msg-tel2').show();
                         $('#msg-tel2').
                         html("Veuillez saisir le numéro ***").fadeIn();
                         $('#msg-tel2').focus();
                         $('#msg-tel2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-tel2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if ($.isNumeric(tel2) == false) {
                         $('#msg-tel2').show();
                         $('#msg-tel2').
                         html("Veuillez saisir le numéro en chiffres et non des lettres ***").fadeIn();
                         $('#msg-tel2').focus();
                         $('#msg-tel2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-tel2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (tel2.length == 1 || tel2.length == 2 || tel2.length == 3 || tel2.length == 4 || tel2.length == 5 || tel2.length == 6 || tel2.length == 7 || tel2.length == 8) {
                         $('#msg-tel2').show();
                         $('#msg-tel2').
                         html("Le numéro doit avoir maximum 9 caractères ***").fadeIn();
                         $('#msg-tel2').focus();
                         $('#msg-tel2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-tel2').fadeOut('slow');
                         },5000);
                         return false;
                    }else if (date_nais2.length == '') {
                         $('#msg-date_nais2').show();
                         $('#msg-date_nais2').
                         html("Veuillez saisir la date  de naissance ***").fadeIn();
                         $('#msg-date_nais2').focus();
                         $('#msg-date_nais2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-date_nais2').fadeOut('slow');
                         },5000);
                         return false;
                    }

                    else{

                    	swal({
		              title: "Modification",
		              text: "Souhaitez vous modifier cette employé?",
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
                        url:"./traitements/modifier_gestions_chauffeurs.php",  
                        method:"POST",  
                        data:{nom:nom2, prenom:prenom2,
                            adresse:adresse2, tel:tel2, sexe:sexe2,
                           date_nais:date_nais2,
                           id:id},  
                        success:function(res)  
                        {     
                            
                            if (res == "success") {

	                              swal({
			                            title: "Chauffeur",
			                            text: "Modification effectuée avec succès",
			                            type: "success"
			                        },function(){
			                            load_gestions_chauffeurs();
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
		                  text: "Souhaitez vous supprimer ce chauffeur?",
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
	                        url:"./traitements/supprimer_gestions_chauffeurs.php",  
	                        method:"POST",  
	                        data:{id:id},  
	                        success:function(res)  
	                        {     
	                            load_gestions_chauffeurs(); 
	                            $('#exampleModal').modal("hide");                             
	                        },
	                        cache: false  
	                    });
	                    } else {
	                    swal("Annuler", "Suppression annuler", "warning");
	                  }
	                });


                });

                function load_gestions_chauffeurs(){

                    $.ajax({  
                        url:"./traitements/load_gestions_chauffeurs.php",  
                        method:"POST",/*  
                        data:{nom:nom},*/  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_chauffeurs').html(res);                              
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