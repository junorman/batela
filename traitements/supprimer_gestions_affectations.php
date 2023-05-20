<?php 
session_start();

include("../config/db.php");

extract($_POST);

$update = "update affectations set id_profil='0'
        WHERE id_af='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>