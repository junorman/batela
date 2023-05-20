<?php 

 include("../config/db.php");
 include("../config/styles.php");
 include("../config/statiques.php");
 include("../config/functions.php");
 include("../config/access.php");

 $consulter_affectations = mysqli_query($db, "SELECT * FROM users as u, affectations as a, profil as p WHERE a.user_id=u.user_id AND a.id_profil=p.id_profil AND u.user_id!=1 ORDER BY a.updated_at DESC");

 ?>

 <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
    <h4 class="card-title"><i class="bx bx-group"></i> Listes des affectations</h4>
    <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
    <tr>
        <th>Nom & Prénom</th>
        <th>Profil</th>
        <th>Actions</th>
    </tr>
    </thead>


    <tbody>

    <?php while ($row = mysqli_fetch_array($consulter_affectations)) {?>
    <tr>
        <td>
            <?php echo $row['user_nom'].' '.$row['user_prenom'] ?>
        </td>
        <td>
            <?php echo $row['libelle_profil'] ?>
        </td>
        <td>

            <div class="btn-group">
                <button style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="button" class="mode-paie btn btn-primary btn-show_invoice" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Actions <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <button <?php echo deactivate_button($MODIFIER, MODIFIER) ?> data-bs-toggle="modal" data-bs-target="#exampleModal" 

                     onclick="document.location.href='#'
                    document.gestions_affectations_form.id_user2.value='<?php echo $row['user_id']; ?>'
                    document.gestions_affectations_form.id_profil2.value='<?php echo $row['id_profil']; ?>'
                    document.gestions_affectations_form.id.value='<?php echo $row['id_af']; ?>'

                    " 
                        class="dropdown-item">
                        <i class="bx bx-edit"></i> Modifier
                    </button>

                    <button <?php echo deactivate_button($SUPPRIMER, SUPPRIMER) ?> id="<?php echo $row['id_af']; ?>" class="dropdown-item btn-delete">
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
              

                $('.btn-edit').click(function(e){
                    e.preventDefault();

                    var id_user2 = $('#id_user2').val();
                    var id_profil2 = $('#id_profil2').val();
                    var id = $('#id').val();

                        swal({
                      title: "Modification",
                      text: "Souhaitez vous modifier cette affectation?",
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
                        url:"./traitements/modifier_gestions_affectations.php",  
                        method:"POST",  
                        data:{id_user:id_user2, id_profil:id_profil2, id:id},  
                        success:function(res)  
                        {     
                            
                            if (res == "success") {

                                  swal({
                                        title: "Affectations",
                                        text: "Modification effectuée avec succès",
                                        type: "success"
                                    },function(){
                                        load_gestions_affectations();
                                        load_utilisateurs_non_affectes();
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

                });
                
                $('.btn-delete').click(function(e){
                    e.preventDefault();

                    var id = $(this).attr('id');

                    swal({
                          title: "supprimer",
                          text: "Souhaitez vous supprimer cette affectation?",
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
                            url:"./traitements/supprimer_gestions_affectations.php",  
                            method:"POST",  
                            data:{id:id},  
                            success:function(res)  
                            {     
                                load_gestions_affectations(); 
                                load_utilisateurs_non_affectes();
                                $('#exampleModal').modal("hide");                             
                            },
                            cache: false  
                        });
                        } else {
                        swal("Annuler", "Suppression annuler", "warning");
                      }
                    });


                });

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