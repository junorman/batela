<?php 
session_start();

include("../config/db.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));

$update = "UPDATE types_conditions SET libelle_condition='".$libelle."'
        WHERE id_type_condition='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>