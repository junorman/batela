<?php 

include("../config/db.php");
session_start();

extract($_POST);

$return_arr = array();

 $consulter_affectations = mysqli_query($db, "SELECT * FROM users WHERE user_id!='1' AND user_id in (SELECT user_id FROM affectations WHERE id_profil=0 ORDER BY updated_at DESC)");

while ($row = mysqli_fetch_array($consulter_affectations)) {
    $return_arr[] = array("id" => $row['user_id'],
                          "nom" => $row['user_nom'],
                          "prenom" => $row['user_prenom'],
    );
}


echo json_encode($return_arr);

 ?>


 
    
