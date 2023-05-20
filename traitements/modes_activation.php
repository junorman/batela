<?php 

include("../config/db.php");

extract($_POST);

$sql = "update users set  user_etat='".$etat."' 
        WHERE user_id='".$id."' ";
		if(mysqli_query($db, $sql)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>