<?php 
session_start();

include("../config/db.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));

$update = "update profil set libelle_profil='".$libelle."'
        WHERE id_profil='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>