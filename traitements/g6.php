<?php 

include("../config/db.php");
include("../config/functions.php");

//extract($_GET);

/*$query_courses = "";
$query_signaler_probleme = "";
$query_vehicules = "";
$result = "";
$result_si = "";
$result_pro = "";
$result_map = "";

$consulter_result = "";
$consulter_result_si = "";
$consulter_result_pro = "";
$consulter_result_map = "";

$query_courses = " SELECT * FROM `courses` WHERE statut = 1";

$query_signaler_probleme = "SELECT * FROM signaler_probleme WHERE statut = 1";

$query_vehicules = "SELECT * FROM vehicules WHERE statut = 1";

$result = "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` WHERE statut = 1";

//CAMEMBERT SIGNALS
$result_si = "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND sp.statut = 1 ";

//CAMEMBERT PROBLEMES
$result_pro = "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND sp.statut = 1";

//CARTE MAP
$result_map = "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND sp.statut = 1";

if(isset($_GET['jours']) && !empty($_GET['jours']))
{

    $jours = $_GET['jours'];
    $query_courses .= " AND EXTRACT(DAY FROM created_at) = $jours";
    
    $query_signaler_probleme .= " AND EXTRACT(DAY FROM created_at) =$jours";

    $query_vehicules .= " AND EXTRACT(DAY FROM created_at) = $jours";

    $result .= " AND EXTRACT(DAY FROM created_at) = $jours ";

    //CAMEMBERT SIGNALS
    $result_si .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
    //FIN CARTE MAP

}

if(isset($_GET['semaines']) && !empty($_GET['semaines']))
{

    $semaines = explode(',', $_GET['semaines']);
    $query_courses .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";
    
    $query_signaler_probleme .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

    $query_vehicules .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

    $result .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] ";

    //CAMEMBERT SIGNALS
    $result_si .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
    //FIN CARTE MAP

}if(isset($_GET['mois']) && !empty($_GET['mois']))
{

    $mois = $_GET['mois'];
    $query_courses .= " AND EXTRACT(MONTH FROM created_at) = $mois";
    
    $query_signaler_probleme .= " AND EXTRACT(MONTH FROM created_at) = $mois";

    $query_vehicules .= " AND EXTRACT(MONTH FROM created_at) = $mois";

    $result .= " AND EXTRACT(MONTH FROM created_at) = $mois ";

    //CAMEMBERT SIGNALS
    $result_si .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois ";
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois ";
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois";
    //FIN CARTE MAP

}if(isset($_GET['trimestres']) && !empty($_GET['trimestres']))
{

    $trimestres = $_GET['trimestres'];
    $query_courses .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";
    
    $query_signaler_probleme .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

    $query_vehicules .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres)";

    $result .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

    //CAMEMBERT SIGNALS
    $result_si .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
    //FIN CARTE MAP

}if(isset($_GET['annees']) && !empty($_GET['annees']))
{

    $annees = $_GET['annees'];
    $query_courses .= " AND EXTRACT(YEAR FROM created_at) = $annees ";
    
    $query_signaler_probleme .= " AND EXTRACT(YEAR FROM created_at) = $annees ";

    $query_vehicules .= " AND EXTRACT(YEAR FROM created_at) = $annees ";

    $result .= " AND EXTRACT(YEAR FROM created_at) = $annees ";

    //CAMEMBERT SIGNALS
    $result_si .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees ";
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees ";
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees";
    //FIN CARTE MAP

}else{

    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $consulter_result = mysqli_query($db, $result." GROUP BY MONTH(created_at) ");

    //CAMEMBERT SIGNALS
    $consulter_result_si = mysqli_query($db, $result_si." GROUP BY sp.type_signal ");
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $consulter_result_pro = mysqli_query($db, $result_pro." GROUP BY sp.type_probleme ");
    //FIN CAMEMBERT

    //CARTE MAP
    $consulter_result_map = mysqli_query($db, $result_map);
    //FIN CARTE MAP

}

$result_info_courses = mysqli_query($db,$query_courses);
$row_info_courses = mysqli_num_rows($result_info_courses);
if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
else{$data_info_courses = 0;}

$result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
$row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
else{$data_info_signaler_probleme = 0;}

$result_info_vehicules = mysqli_query($db,$query_vehicules);
$row_info_vehicules = mysqli_num_rows($result_info_vehicules);
if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
else{$data_info_veficules = 0;}

$consulter_result = mysqli_query($db, $result." GROUP BY MONTH(created_at) ");
while($row = mysqli_fetch_array($consulter_result))
{
  $months = $row["months"];
  $dataY .= nb($db, $months).',';
  $dataX .= '"'.get_month($months).'",';
}

//CAMEMBERT SIGNALS
$consulter_result_si = mysqli_query($db, $result_si." GROUP BY sp.type_signal ");
while($row = mysqli_fetch_array($consulter_result_si))
{
  $type_signal = $row["type_signal"];
  $label_si .= '"'.$row["libelle_si"].'",';
  $value_si .= nb_signal($db, $type_signal).',';
}
//FIN CAMEMBERT SIGNALS

//CAMEMBERT PROBLEMES
$consulter_result_pro = mysqli_query($db, $result_pro." GROUP BY sp.type_probleme ");
while($row = mysqli_fetch_array($consulter_result_pro))
{
  $type_probleme = $row["type_probleme"];
  $label_pro .= '"'.$row["libelle_pro"].'",';
  $value_pro .= nb_probleme($db, $type_probleme).',';

}
//FIN CAMEMBERT

//CARTE MAP
$consulter_result_map = mysqli_query($db, "SELECT * FROM `gestions_appreciations` as gap, users as u, types_conduites as tc, types_dialogues as td, types_conditions as tco, types_vitesses as tv WHERE gap.id_chauffeur=u.user_id AND gap.id_type_conduite=tc.id_type_conduite AND gap.id_type_di=td.id_type_di AND gap.id_type_condition=tco.id_type_condition AND gap.id_type_vi=tv.id_type_vi AND gap.id_chauffeur=7");
while($row = mysqli_fetch_array($consulter_result_map))
{
  $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
}
//FIN CARTE MAP*/


$consulter_gap = mysqli_query($db, "SELECT * FROM `gestions_appreciations` as gap, users as u, types_conduites as tc, types_dialogues as td, types_conditions as tco, types_vitesses as tv WHERE gap.id_chauffeur=u.user_id AND gap.id_type_conduite=tc.id_type_conduite AND gap.id_type_di=td.id_type_di AND gap.id_type_condition=tco.id_type_condition AND gap.id_type_vi=tv.id_type_vi AND gap.id_chauffeur=7");
while($row = mysqli_fetch_array($consulter_gap))
{
  echo $row['libelle_di'];
}


 ?>










