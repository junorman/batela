<?php 
session_start();

include("../config/db.php");
include("../phpqrcode/qrlib.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));
$matricule = trim(strip_tags(addcslashes($matricule, "'")));
$marque = trim(strip_tags(addcslashes($marque, "'")));

$PNG_TEMP_DIR = '../temp/';
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

$filename = $PNG_TEMP_DIR . 'prudence.png';

$filename = $PNG_TEMP_DIR . 'prudence' . md5($matricule) . '.png';
$qrcode = 'prudence' . md5($matricule) . '.png';

QRcode::png($matricule, $filename);

$update = "update vehicules set libelle_ve='".$libelle."', matricule='".$matricule."', marque='".$marque."', nb_place='".$nb_place."', couleur='".$couleur."', qrcode='".$qrcode."'
        WHERE id_ve='".$id."' ";
		if(mysqli_query($db, $update)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>