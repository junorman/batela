<?php 
session_start();

include("../config/db.php");

extract($_POST);



$update = "update operations set statut_cachet='".$etat."'
WHERE id_op='".$id."' ";
if(mysqli_query($db, $update)){ } 
else{ echo mysqli_error($db);}

      












 ?>