<?php 

include("config/db.php");

$result = array();

$consulter_types_signals = mysqli_query($db, "SELECT * FROM types_signals ORDER BY id_type_si DESC");

while ($row = mysqli_fetch_array($consulter_types_signals)) {
	array_push($result, array('id' => $row['id_type_si'], 'libelle' => $row['libelle_si']));
}

echo json_encode(array("data"=>$result));

 ?>