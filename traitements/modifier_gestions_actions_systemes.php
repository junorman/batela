<?php 

include("../config/db.php");

extract($_POST);

$date = date('Y-m-d H:i:s');

$sql = "update actions_systemes set  ajouter='".$ajouter."', consulter='".$consulter."', modifier='".$modifier."', supprimer='".$supprimer."', activer='".$activer."', desactiver='".$desactiver."'
        WHERE id_ac='".$id_ac."' ";
		if(mysqli_query($db, $sql)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>