<?php 

include("../config/db.php");
session_start();

extract($_POST);

$return_arr = array();

$sql_info_ent = "SELECT * FROM entreprise ";
$result_info_ent = mysqli_query($db,$sql_info_ent);
$row_info_ent = mysqli_num_rows($result_info_ent);

$designation = "";
$sigle = "";
$nif = "";
$rccm = "";
$capital_social = "";
$adresse = "";
$bp = "";
$tel = "";
$email = "";
$siteweb = "";
$mots = "";
$chiffre_daffaire = "";
$logo = "logo.png";


if ($row_info_ent > 0 ) {
        $data_info_ent = mysqli_fetch_array($result_info_ent);

        $designation = $data_info_ent['designation'];
        $sigle = $data_info_ent['sigle'];
        $nif = $data_info_ent['nif'];
        $rccm = $data_info_ent['rccm'];
        $capital_social = $data_info_ent['capital_social'];
        $adresse = $data_info_ent['localisation'];
        $bp = $data_info_ent['bp'];
        $tel = $data_info_ent['telephone'];
        $email = $data_info_ent['email'];
        $siteweb = $data_info_ent['site_web'];
        $mots = $data_info_ent['mots'];
        $chiffre_daffaire = $data_info_ent['chiffre_affaire'];
        $logo = $data_info_ent['logo'];
        $cachet = $data_info_ent['cachet'];

        
      }

   echo $designation.'kata'.$sigle.'kata'.$nif.'kata'.$rccm.'kata'.$capital_social.'kata'.$adresse.'kata'.$bp.'kata'.$tel.'kata'.$email.'kata'.$siteweb.'kata'.$chiffre_daffaire.'kata'.$logo.'kata'.$mots.'kata'.$cachet;

 ?>


 
    
