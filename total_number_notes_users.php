<?php 

include("config/db.php");

extract($_POST);

$sql = "SELECT * FROM notes WHERE id_user = '".$id_user."' ";
$result = mysqli_query($db,$sql);
$nb_notes = mysqli_num_rows($result);

echo $nb_notes;
 ?>