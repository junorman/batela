<?php 

include("../config/db.php");
include("../config/functions.php");

//extract($_GET);

$request = '';
$data_info_courses = "";
$data_info_signaler_probleme = "";
$data_info_veficules = "";
$dataX = '';
$dataY = '';

//CAMEMBERT SIGNALS
$label_si = '';
$value_si = '';

//CAMEMBERT PROBLEMES
$label_pro = '';
$value_pro = '';

//CARTE MAP
$data_map = '';

$query_courses = '';
$query_signaler_probleme = '';
$query_veficules = '';
$query_stat_signaler_probleme = '';

$consulter_conduite = '';
$consulter_di = '';
$consulter_condition = '';
$consulter_vi = '';

if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) =$jours AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }

    //CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND sp.id_user=$id_user GROUP BY sp.type_signal") ;
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT
    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}


else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{   
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{   
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(MONTH FROM created_at) = $mois AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(MONTH FROM created_at) = $mois AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT


    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(MONTH FROM sp.created_at) = $mois AND id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{   
	$id_user = $_GET['id_user'];
    $trimestres = $_GET['trimestres'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{   
	$id_user = $_GET['id_user'];
    $annees = $_GET['annees'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT


    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT  * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT


    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{
   $id_user = $_GET['id_user'];
   $jours = $_GET['jours'];
   $annees = $_GET['annees'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $trimestres = $_GET['trimestres'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }




//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP
}


else if(isset($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $mois = $_GET['mois'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = " SELECT * FROM `signaler_probleme` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = " SELECT * FROM `vehicules` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT
    

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $trimestres = $_GET['trimestres'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user ";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP
}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $annees = $_GET['annees'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user ";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];
    $annees = $_GET['annees'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user ";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];
    $trimestres = $_GET['trimestres'];
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees  AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT
    

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP
}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $mois = $_GET['mois'];
    $trimestres = $_GET['trimestres'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT


    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user ";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) = $jours AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) = $jours AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(isset($_GET['semaines']) && isset($_GET['mois']) && empty($_GET['jours']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM `signaler_probleme` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM `vehicules` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $trimestres = $_GET['trimestres'];    
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM `signaler_probleme` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM `vehicules` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT


    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $annees = $_GET['annees'];    
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM `signaler_probleme` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM `vehicules` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT


    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = " SELECT * FROM `signaler_probleme` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = " SELECT * FROM `vehicules` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user ";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP
}


else if(empty($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = " SELECT * FROM `signaler_probleme` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = " SELECT * FROM `vehicules` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP
}


else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = " SELECT * FROM `signaler_probleme` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = " SELECT * FROM `vehicules` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user ";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    
    $query_courses = " SELECT * FROM `courses` WHERE  EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user  GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP
}


else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];    
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE  EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(MONTH FROM created_at) = $mois AND EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT


    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(MONTH FROM sp.created_at) = $mois AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']) )
{	
	$id_user = $_GET['id_user'];
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    
    $query_courses = " SELECT * FROM `courses` WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_users=$id_user";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme  WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_chauffeur=$id_user";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $request = "WHERE EXTRACT(MONTH FROM created_at) IN ($trimestres) AND EXTRACT(YEAR FROM created_at) = $annees AND id_user=$id_user";
    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` $request GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }



//CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM sp.created_at) = $annees AND sp.id_user=$id_user");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}

else{

    $query_courses = " SELECT * FROM `courses`";
    $result_info_courses = mysqli_query($db,$query_courses);
    $row_info_courses = mysqli_num_rows($result_info_courses);
    if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
    else{$data_info_courses = 0;}

    $query_signaler_probleme = "SELECT * FROM signaler_probleme ";
    $result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme);
    $row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
    if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
    else{$data_info_signaler_probleme = 0;}

    $query_vehicules = "SELECT * FROM vehicules ";
    $result_info_vehicules = mysqli_query($db,$query_vehicules);
    $row_info_vehicules = mysqli_num_rows($result_info_vehicules);
    if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
    else{$data_info_veficules = 0;}

    $result = mysqli_query($db, "SELECT DISTINCT MONTH(`created_at`) AS 'months' FROM `signaler_probleme`  GROUP BY MONTH(created_at)");
    while($row = mysqli_fetch_array($result))
    {
      $months = $row["months"];
      $dataY .= nb($db, $months).',';
      $dataX .= '"'.get_month($months).'",';
    }

    //CAMEMBERT SIGNALS
    $result_si = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si GROUP BY sp.type_signal");
    while($row = mysqli_fetch_array($result_si))
    {
      $type_signal = $row["type_signal"];
      $label_si .= '"'.$row["libelle_si"].'",';
      $value_si .= nb_signal($db, $type_signal).',';
    }
    //FIN CAMEMBERT SIGNALS

    //CAMEMBERT PROBLEMES
    $result_pro = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro GROUP BY sp.type_probleme");
    while($row = mysqli_fetch_array($result_pro))
    {
      $type_probleme = $row["type_probleme"];
      $label_pro .= '"'.$row["libelle_pro"].'",';
      $value_pro .= nb_probleme($db, $type_probleme).',';

    }
    //FIN CAMEMBERT

    
    //CARTE MAP
    $result_map = mysqli_query($db, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id ");
    while($row = mysqli_fetch_array($result_map))
    {
      $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
    }
    //FIN CARTE MAP

}









echo 'courses: '.$data_info_courses ;
echo 'signal_probleme: '.$data_info_signaler_probleme ;
echo 'véhicule: '.$data_info_veficules ;

echo "<br>";
echo $dataX = substr($dataX, 0, -1);
echo $dataY = substr($dataY, 0, -1);

echo "<br>";
echo $label_si = substr($label_si, 0, -1);
echo $value_si = substr($value_si, 0, -1);

echo "<br>";
echo $label_pro = substr($label_pro, 0, -1);
echo $value_pro = substr($value_pro, 0, -1);

echo "<br>";
echo $data_map = substr($data_map, 0, -1);
?>

