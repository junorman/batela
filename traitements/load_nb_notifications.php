<?php 

include("../config/db.php");

extract($_POST);
  
$sql = "SELECT * FROM signaler_probleme WHERE statut_no = 0  ";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);

echo $row;

 ?>