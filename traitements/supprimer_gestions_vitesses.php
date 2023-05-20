<?php 

session_start();
include("../config/db.php");

extract($_POST);

$sql = "DELETE FROM types_vitesses WHERE id_type_vi = '".$id."' ";
if(mysqli_query($db, $sql))  
{  echo "success";  }  
else{ echo mysqli_error($db);}

 ?>