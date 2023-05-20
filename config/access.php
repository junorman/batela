<?php 


session_start();

include("../config/db.php");

//ACCES ET DROITS
$session = $_SESSION['id'];
$info_profil = "";
$libelle_profil = "";

$BIB= "";
$INFO_ENT= "";

$USERS= "";
$GESTIONS_USERS= "";$GESTIONS_PRO= "";$DROITS= "";
$GESTIONS_CHAUFFEURS= "";

$AP;
$GESTIONS_CONDUITES = "";
$GESTIONS_DIALOGUES = "";
$GESTIONS_CONDITIONS = "";
$GESTIONS_VITESSES = "";

$SP;
$GESTIONS_SIGNALS = "";
$GESTIONS_PROBLEMES = "";
 
$NOTI = "";

$TB = "";

$AJOUTER= "";$CONSULTER= "";
$MODIFIER= "";$SUPPRIMER= "";$ACTIVER= "";$DESACTIVER= "";

$sql_info_profil = "SELECT * FROM affectations as a, profil as p WHERE a.user_id='".$session."' AND a.id_profil=p.id_profil ";
$result_info_profil = mysqli_query($db,$sql_info_profil);
$row_info_profil = mysqli_num_rows($result_info_profil);

if ($row_info_profil > 0) {
$data_profil = mysqli_fetch_array($result_info_profil);
$info_profil = $data_profil['id_profil'];
$libelle_profil = $data_profil['libelle_profil'];
}else{
$info_profil = 0;
$libelle_profil = "Aucune";
}


$sql_info_fonctions = "SELECT * FROM fonctionnalites as f, profil as p WHERE f.id_profil='".$info_profil."' AND f.id_profil=p.id_profil ";
$result_info_fonctions = mysqli_query($db,$sql_info_fonctions);
$row_info_fonctions = mysqli_num_rows($result_info_fonctions);

if ($row_info_fonctions > 0) {
$data_fonctions = mysqli_fetch_array($result_info_fonctions);

$BIB= $data_fonctions['bib'];
$INFO_ENT= $INFO_ENT= $data_fonctions['info_ent'];

$USERS= $data_fonctions['users'];
$GESTIONS_USERS= $data_fonctions['gestions_users'];
$GESTIONS_PRO= $data_fonctions['gestions_pro'];
$DROITS= $data_fonctions['droits'];
$GESTIONS_CHAUFFEURS= $data_fonctions['gestions_chauffeurs'];

$AP = $data_fonctions['ap'];
$GESTIONS_CONDUITES = $data_fonctions['gestions_conduites'];
$GESTIONS_DIALOGUES = $data_fonctions['gestions_dialogues'];
$GESTIONS_CONDITIONS = $data_fonctions['gestions_conditions'];
$GESTIONS_VITESSES = $data_fonctions['gestions_vitesses'];

$SP = $data_fonctions['sp'];
$GESTIONS_SIGNALS = $data_fonctions['gestions_signals'];
$GESTIONS_PROBLEMES = $data_fonctions['gestions_problemes'];
 
$NOTI = $data_fonctions['noti'];

$TB= $data_fonctions['tb'];

}else{

$BIB= 0;
$INFO_ENT= 0;

$USERS= 0;
$GESTIONS_USERS= 0;$GESTIONS_PRO= 0;$DROITS= 0;
$GESTIONS_CHAUFFEURS = 0;

$AP = 0;
$GESTIONS_CONDUITES = 0;
$GESTIONS_DIALOGUES = 0;
$GESTIONS_CONDITIONS = 0;
$GESTIONS_VITESSES = 0;

$SP = 0;
$GESTIONS_SIGNALS = 0;
$GESTIONS_PROBLEMES = 0;
 
$NOTI = 0;

$TB = 0;
            
}


$sql_info_actions = "SELECT * FROM actions_systemes as ac, profil as p WHERE ac.id_profil='".$info_profil."' AND ac.id_profil=p.id_profil ";
$result_info_actions = mysqli_query($db,$sql_info_actions);
$row_info_actions = mysqli_num_rows($result_info_actions);

if ($row_info_actions > 0) {
$data_actions = mysqli_fetch_array($result_info_actions);

$AJOUTER= $data_actions['ajouter'];$CONSULTER= $data_actions['consulter'];$MODIFIER= $data_actions['modifier'];
$SUPPRIMER= $data_actions['supprimer'];$ACTIVER= $data_actions['activer'];$DESACTIVER= $data_actions['desactiver'];

}else{

$AJOUTER= 0;$CONSULTER= 0;$MODIFIER= 0;
$SUPPRIMER= 0;$ACTIVER= 0;$DESACTIVER= 0;
}
//FIN ACCES ET DROITS




 ?>