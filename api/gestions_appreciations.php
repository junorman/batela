<?php 

include("../config/db.php");

$id_user = $_POST['id_user'];
$numero = $_POST['numero'];
$matricule = $_POST['matricule'];
$id_type_conduite = $_POST['conduite'];
$id_type_di = $_POST['dialogue'];
$id_type_condition = $_POST['condition'];
$id_type_vi = $_POST['vitesse'];

if(mysqli_query($db,"insert gestions_appreciations (id_chauffeur, numero, matricule, id_type_conduite, id_type_di, id_type_condition, id_type_vi) 
                   values('$id_user','$numero', '$matricule', '$id_type_conduite', '$id_type_di', '$id_type_condition', '$id_type_vi')"))
                  {echo "success";}
                  else{echo mysqli_error($db);}


 ?>