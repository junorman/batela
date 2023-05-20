<?php 
session_start();

include("../config/db.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));

$update = "UPDATE types_vitesses SET libelle_vi='".$libelle."'
        WHERE id_type_vi='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>