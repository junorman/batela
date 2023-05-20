<?php 

include("../config/db.php");

extract($_POST);

$update = "update signaler_probleme set statut_no=1 WHERE statut_no=0 ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>