<?php
   include("config/db.php");

   extract($_POST);
   $result2 = array(); 
   //$matricule = "MAT56676";
   $result = mysqli_query($db, "SELECT * FROM vehicules where matricule='".$matricule."' ");
   $infos = mysqli_fetch_array($result);

   $result1 = mysqli_query($db, "SELECT * FROM users where user_id='".$infos['id_chauffeur']."' ");
   $data = mysqli_fetch_array($result1);

    array_push($result2, array('id' => $data['user_id'], 'nom' => $data['user_nom'], 'prenom' => $data['user_prenom'], 'tel' => $data['user_phone'], 'adresse' => $data['user_adresse'], 'sexe' => $data['sexe'], 'photo' => $data['user_photo'], 'date' => $data['user_datereg'], 'date_nais' => $data['user_birthday']));

     echo json_encode(array("data"=>$result2));




     
   

?>