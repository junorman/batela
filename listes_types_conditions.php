<?php 

include("config/db.php");

$result = array();

$consulter_types_conditions = mysqli_query($db, "SELECT * FROM types_conditions ORDER BY id_type_condition DESC");

while ($row = mysqli_fetch_array($consulter_types_conditions)) {
	array_push($result, array('id' => $row['id_type_condition'], 'libelle' => $row['libelle_condition']));
}

echo json_encode(array("data"=>$result));

 ?>