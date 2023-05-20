<?php 
include("../config/db.php");

//$id = $_GET['id'];

$data = array();

$consulter_user = mysqli_query($db, "SELECT * FROM users ");

while ($row = mysqli_fetch_array($consulter_user)) {
	$data[] = $row;
}
echo json_encode($data);
return;





 ?>