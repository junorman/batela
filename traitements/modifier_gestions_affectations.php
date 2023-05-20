<?php 
session_start();

include("../config/db.php");

extract($_POST);

$date = date('Y-m-d H:i:s');

$update = "update affectations set user_id='".$id_user."', id_profil='".$id_profil."', updated_at='".$date."'
        WHERE id_af='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>