<?php 

 include("../config/db.php");
 include("../config/styles.php");
 include("../config/statiques.php");
 include("../config/functions.php");
 include("../config/access.php");

 $consulter_types_conditions = mysqli_query($db, "SELECT * FROM types_conditions ORDER BY id_type_condition DESC ");

 ?>

 <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
    <h4 class="card-title"><i class="bx bx-group"></i> Listes des conditions</h4>
    <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
    <tr>
        <th>Libelle</th>
        <th>Actions</th>
    </tr>
    </thead>


    <tbody>

    <?php while ($row = mysqli_fetch_array($consulter_types_conditions)) {?>
    <tr>
        <td>
        	<?php echo $row['libelle_condition'] ?>
        </td>
        <td>

        	<div class="btn-group">
                <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="button" class="mode-paie btn btn-primary btn-show_invoice" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Actions <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <button <?php echo deactivate_button($MODIFIER, MODIFIER) ?> data-bs-toggle="modal" data-bs-target="#exampleModal" 

	            	 onclick="document.location.href='#'
					document.gestions_conditions.libelle2.value='<?php echo $row['libelle_condition']; ?>'
					document.gestions_conditions.id.value='<?php echo $row['id_type_condition']; ?>'

					" 
                        class="dropdown-item">
                        <i class="bx bx-edit"></i> Modifier
                    </button>

                    <button <?php echo deactivate_button($SUPPRIMER, SUPPRIMER) ?> id="<?php echo $row['id_type_condition']; ?>" class="dropdown-item btn-delete">
                        <i class="bx bxs-trash"></i> Supprimer
                    </button>
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
                $('#msg-libelle2').hide();

                $('.btn-edit').click(function(e){
                    e.preventDefault();

                    var libelle2 = $('#libelle2').val();
                    var id = $('#id').val();

                    if (libelle2.length == '') {
                         $('#msg-libelle2').show();
                         $('#msg-libelle2').
                         html("Veuillez saisir une condition ***").fadeIn();
                         $('#msg-libelle2').focus();
                         $('#msg-libelle2').css("color", "red");
                         setTimeout(function(){
                         $('#msg-libelle2').fadeOut('slow');
                         },5000);
                         return false;
                    }

                    else{

                    	swal({
		              title: "Modification",
		              text: "Souhaitez vous modifier cette information?",
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
                        url:"./traitements/modifier_gestions_conditions.php",  
                        method:"POST",  
                        data:{libelle:libelle2, id:id},  
                        success:function(res)  
                        {     
                            
                            if (res == "success") {

	                              swal({
			                            title: "Condition",
			                            text: "Modification effectuée avec succès",
			                            type: "success"
			                        },function(){
			                            load_gestions_conditions();
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
		                  text: "Souhaitez vous supprimer cette information?",
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
	                        url:"./traitements/supprimer_gestions_conditions.php",  
	                        method:"POST",  
	                        data:{id:id},  
	                        success:function(res)  
	                        {     
	                            load_gestions_conditions(); 
	                            $('#exampleModal').modal("hide");                             
	                        },
	                        cache: false  
	                    });
	                    } else {
	                    swal("Annuler", "Suppression annuler", "warning");
	                  }
	                });


                });

                function load_gestions_conditions(){

                    $.ajax({  
                        url:"./traitements/load_gestions_conditions.php",  
                        method:"POST",/*  
                        data:{nom:nom},*/  
                        success:function(res)  
                        {     
                            
                            $('.load_gestions_conditions').html(res);                              
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