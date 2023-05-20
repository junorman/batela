<?php 
session_start();

include("../config/db.php");

extract($_POST);

$nom = trim(strip_tags(addcslashes($nom, "'")));
$prenom = trim(strip_tags(addcslashes($prenom, "'")));
$tel = trim(strip_tags(addcslashes($tel, "'")));
$adresse = trim(strip_tags(addcslashes($adresse, "'")));

$update = "update users set user_nom='".$nom."', user_prenom='".$prenom."', user_phone='".$tel."', sexe='".$sexe."', user_adresse='".$adresse."', user_birthday='".$date_nais."'
        WHERE user_id='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}

 ?>