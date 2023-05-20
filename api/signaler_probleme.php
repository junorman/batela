<?php 

include("../config/db.php");

$id_user = $_POST['id_user'];
$numero = $_POST['numero'];
$matricule = $_POST['matricule'];
$type_signal = $_POST['signal'];
$type_probleme = $_POST['probleme'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$date = date('Y-m-d H:i:s');

if(mysqli_query($db,"insert signaler_probleme (id_user, numero, matricule, type_signal, type_probleme, latitude, longitude, created_at) 
                   values('$id_user','$numero', '$matricule', '$type_signal', '$type_probleme', '$latitude', '$longitude', '$date')"))
                  {echo "success";}
                  else{echo mysqli_error($db);}


 ?>