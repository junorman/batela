<?php 

include("../config/db.php");

$result = array();

$consulter_types_conduites = mysqli_query($db, "SELECT * FROM types_conduites ORDER BY id_type_conduite DESC");

while ($row = mysqli_fetch_array($consulter_types_conduites)) {
	array_push($result, array('id' => $row['id_type_conduite'], 'libelle' => $row['libelle_conduite']));
}

echo json_encode(array("data"=>$result));

 ?>