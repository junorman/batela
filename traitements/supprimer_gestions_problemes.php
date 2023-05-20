<?php 

session_start();
include("../config/db.php");

extract($_POST);

$sql = "DELETE FROM types_problemes WHERE id_type_pro = '".$id."' ";
if(mysqli_query($db, $sql))  
{  echo "success";  }  
else{ echo mysqli_error($db);}

 ?>