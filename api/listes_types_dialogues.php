<?php 

include("../config/db.php");

$result = array();

$consulter_types_dialogues = mysqli_query($db, "SELECT * FROM types_dialogues ORDER BY id_type_di DESC");

while ($row = mysqli_fetch_array($consulter_types_dialogues)) {
	array_push($result, array('id' => $row['id_type_di'], 'libelle' => $row['libelle_di']));
}

echo json_encode(array("data"=>$result));

 ?>