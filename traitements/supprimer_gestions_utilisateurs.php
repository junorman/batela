<?php 

session_start();
include("../config/db.php");

extract($_POST);

$sql = "DELETE FROM users WHERE user_id = '".$id."' ";
if(mysqli_query($db, $sql))  
{  echo "success";  }  
else{ echo mysqli_error($db);}



 ?>