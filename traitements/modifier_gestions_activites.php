<?php 
session_start();

include("../config/db.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));
$details = trim(strip_tags(addcslashes($details, "'")));

$update = "UPDATE objets SET libelle_obj='".$libelle."', description_obj='".$details."'
        WHERE id_obj='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>