<?php 

include("config/db.php");

$result = array();

$consulter_types_vitesses = mysqli_query($db, "SELECT * FROM types_vitesses ORDER BY id_type_vi DESC");

while ($row = mysqli_fetch_array($consulter_types_vitesses)) {
	array_push($result, array('id' => $row['id_type_vi'], 'libelle' => $row['libelle_vi']));
}

echo json_encode(array("data"=>$result));

 ?>