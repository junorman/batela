<?php 

include("../config/db.php");
include("../config/styles.php");
session_start();

extract($_POST);

$return_arr = array();

$sql_info_ent = "SELECT * FROM entreprise ";
$result_info_ent = mysqli_query($db,$sql_info_ent);
$row_info_ent = mysqli_num_rows($result_info_ent);

$consulter_objets = mysqli_query($db, "SELECT * FROM objets ORDER BY id_obj  DESC ");

$designation = "";
$sigle = "";
$nif = "";
$rccm = "";
$capital_social = "";
$adresse = "";
$bp = "";
$tel = "";
$email = "";
$siteweb = "";
$mots = "";
$chiffre_daffaire = "";
$type_chiffre_daffaire = "";
$type_activites = "";
$logo = "logo.png";
$date = "";


if ($row_info_ent > 0 ) {
        $data_info_ent = mysqli_fetch_array($result_info_ent);

        $designation = $data_info_ent['designation'];
        $sigle = $data_info_ent['sigle'];
        $nif = $data_info_ent['nif'];
        $rccm = $data_info_ent['rccm'];
        $capital_social = $data_info_ent['capital_social'];
        $adresse = $data_info_ent['localisation'];
        $bp = $data_info_ent['bp'];
        $tel = $data_info_ent['telephone'];
        $email = $data_info_ent['email'];
        $siteweb = $data_info_ent['site_web'];
        $mots = $data_info_ent['mots'];
        $chiffre_daffaire = $data_info_ent['chiffre_affaire'];
        $type_chiffre_daffaire = $data_info_ent['type_chiffre_affaire'];
        $type_activites = $data_info_ent['type_activite'];
        $logo = $data_info_ent['logo'];
        $date = $data_info_ent['created_at'];

        
      }



 ?>

 <div class="card cont">
    <div class="card-body" style="border: 4px solid <?php echo BORDER_H ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <img src="img/logo/<?php echo $logo ?>" alt="" class="avatar-sm" style="width: 100px;height: 100px;">
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">
                            <?php echo $sigle ?>
                        </h5>
                        <p class="text-muted"><?php echo $designation ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <a href="#" style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" class="btn btn-primary btn-print">
                    <i class="fa fa-print"></i> Imprimer
                </a>
            </div>
        </div>
        
        <h5 class="font-size-15 mt-4">A propos :</h5>

        <p class="text-muted"><?php echo $mots ?></p>

        <div class="text-muted mt-4">
        	<h4>Activités</h4>
        	<?php while ($row = mysqli_fetch_array($consulter_objets)) {?>
            <p><i class="mdi mdi-chevron-right text-primary me-1"></i><?php echo $row['libelle_obj'] ?> </p>
            <p><?php echo $row['description_obj'] ?></p>
            <?php } ?>
        </div>
        
        <div class="row task-dates">
            <div class="col-sm-3 col-3">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Créer le</h5>
                    <p class="text-muted mb-0"><?php echo $date ?></p>
                </div>
            </div>
            <div class="col-sm-3 col-3">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="fa fa-globe me-1 text-primary"></i> Site web</h5>
                    <p class="text-muted mb-0"><?php echo $siteweb ?></p>
                </div>
            </div>
            <div class="col-sm-3 col-3">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="fa fa-phone me-1 text-primary"></i> Tel</h5>
                    <p class="text-muted mb-0"><?php echo $tel ?></p>
                </div>
            </div>

            <div class="col-sm-3 col-3">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="fa fa-envelope me-1 text-primary"></i> E-mail</h5>
                    <p class="text-muted mb-0"><?php echo $email ?></p>
                </div>
            </div>
            <div class="col-sm-3 col-3">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="fa fa-map-marker me-1 text-primary"></i> Adresse</h5>
                    <p class="text-muted mb-0"><?php echo $adresse ?></p>
                </div>
            </div>

          
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/libs/jquery/html2canvas.js"></script>
<script type="text/javascript" src="assets/libs/jquery/jsPdf.debug.js"></script>
<script>
    $(document).ready(function(){

        $('#msg-error').hide();
        $('#msg-id_user').hide();

         var element = $(".cont"); // global variable
var getCanvas; // global variable
 
         html2canvas(element, {
         onrendered: function (canvas) {
                getCanvas = canvas;
             }
         });

    $(".btn-print").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/jpg");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
    $(".btn-print").attr("download", "your_pic_name.jpg").attr("href", newData);
    });

    });
</script>