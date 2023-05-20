<?php 

session_start();
include("../config/db.php");

extract($_POST);

$sql = "DELETE FROM users WHERE user_id = '".$id."' ";
if(mysqli_query($db, $sql))  
{ }  
else{ echo mysqli_error($db);}

$sql2 = "DELETE FROM vehicules WHERE id_chauffeur = '".$id."' ";
if(mysqli_query($db, $sql2))  
{  echo "success";  }  
else{ echo mysqli_error($db);}


 ?>