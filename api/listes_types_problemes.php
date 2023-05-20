<?php 

include("../config/db.php");

$result = array();

$consulter_types_problemes = mysqli_query($db, "SELECT * FROM types_problemes ORDER BY id_type_pro DESC");

while ($row = mysqli_fetch_array($consulter_types_problemes)) {
	array_push($result, array('id' => $row['id_type_pro'], 'libelle' => $row['libelle_pro']));
}

echo json_encode(array("data"=>$result));

 ?>