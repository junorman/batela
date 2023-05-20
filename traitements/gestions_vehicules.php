<?php

session_start();

include("../config/db.php");
include("../phpqrcode/qrlib.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));
$matricule = trim(strip_tags(addcslashes($matricule, "'")));
$marque = trim(strip_tags(addcslashes($marque, "'")));

$id_session = $_SESSION['id'];

$sql = "SELECT * FROM vehicules WHERE matricule = '".$matricule."'  ";
$result = mysqli_query($db,$sql);
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$row = mysqli_num_rows($result);

$PNG_TEMP_DIR = '../temp/';
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

$filename = $PNG_TEMP_DIR . 'prudence.png';

$filename = $PNG_TEMP_DIR . 'prudence' . md5($matricule) . '.png';
$qrcode = 'prudence' . md5($matricule) . '.png';

QRcode::png($matricule, $filename);
      
if ($row == 0) {
    if(mysqli_query($db,"insert into vehicules(libelle_ve, matricule, marque, nb_place,
                   couleur, id_chauffeur, id_user, qrcode) 
                   values('$libelle', '$matricule','$marque','$nb_place', '$couleur', '$id_user', '$id_session', '$qrcode')"))
    {echo "success";}
    else{echo mysqli_error($db);}

}else{
	echo 'error';
}

  ?>