<?php 

session_start();
include("../config/db.php");

extract($_POST);

$sql = "DELETE FROM objets WHERE id_obj = '".$id."' ";
if(mysqli_query($db, $sql))  
{  echo "success";  }  
else{ echo mysqli_error($db);}

 ?>