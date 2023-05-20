<?php 
session_start();

include 'config/db.php';
include 'config/functions.php';
include 'config/styles.php';
include 'config/statiques.php';
include 'config/label.php';
include 'config/current.php';

//WEEK
$firstDate = date("Y-m-d", strtotime("monday this week"));
$lastDate = date("Y-m-d", strtotime("sunday this week"));

//DAYS OF MONTHS
$date = date('Y-m-01');
$end = date('Y-m-') . date('t', strtotime($date)); //get end date of month

//ALL YEAR
$currently_selected = date('Y'); 
$earliest_year = 1984; 
$latest_year = date('Y');

if(isset($_SESSION["id"]))  
  {  	
  		$session = $_SESSION['id'];
		$info_profil = "";
		$libelle_profil = "";

		$cachet = "";
  		//INFO ENTREPRISE
  		$sql_info_ent = "SELECT * FROM entreprise ";
		$result_info_ent = mysqli_query($db,$sql_info_ent);
		$row_info_ent = mysqli_num_rows($result_info_ent);

		if ($row_info_ent > 0) {
			$data_info_ent = mysqli_fetch_array($result_info_ent);
			$cachet = $data_info_ent['cachet'];
		}

  		//ACCES ET DROITS

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



       if(time() > ($_SESSION['last_login_timestamp'] + (60 * 60) )) // 900 = 15 * 60  
       {  
            session_unset();
	        session_destroy();
	        echo "<script>window.location='?page=login';</script>";  
       }  
       else  
       {  
            $_SESSION['last_login_timestamp'] = time();  
          
       }  
  

	if (isset($_GET['page'])) {

		
		if ($_GET['page']=="accueil" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="pages" && isset($_GET['type']) && file_exists('views/'.$_GET["page"].'.php')) {
			$page= $_GET['page'];
			$current_page= $page;
			$type= $_GET['type'];
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="parametrages_droits" && isset($_GET['type']) && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$type=$_GET['type'];
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="parametrages_infos_entreprises" && isset($_GET['type']) && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$type=$_GET['type'];
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_utilisateurs" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_profils" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="login" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="register" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="profil" && isset($_GET['id_profil']) && checkParamsUser($db, $_GET['id_profil']) == 1 && is_numeric($_GET['id_profil']) && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$id_profil = $_GET['id_profil'];

			$jours = "";
			$semaine = "";
			$annees = "";
			if (isset($_GET['semaines'])) {
				$semaine = $_GET['semaines'];
			}else{
				$semaine = "";
			}
			$mois = "";
			$trimestres = "";
			
			if (isset($_GET['annees'])) {
				$annees = $_GET['annees'];
			}else{
				$annees = "";
			}

			$d = date('d');
			$m = date('m');
			$y = date('Y');
			$xday = "";
			$query_courses = "";
			$query_signaler_probleme = "";
			$query_vehicules = "";
			$result = "";
			$result_si = "";
			$result_pro = "";
			$result_map = "";
			$query_gap = "";

			$consulter_result = "";
			$consulter_result_si = "";
			$consulter_result_pro = "";
			$consulter_result_map = "";
			$consulter_gap = "";
			$nb_result = "";
			$request = '';
			$request_sp = "";
			$request_gap = "";
			$request1 = "";
			$request_sp1 = "";
			$request_gap1 = "";
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

			//GAP
			$query_gap = "SELECT * FROM `gestions_appreciations` as gap, users as u, types_conduites as tc, types_dialogues as td, types_conditions as tco, types_vitesses as tv WHERE gap.id_chauffeur=u.user_id AND gap.id_type_conduite=tc.id_type_conduite AND gap.id_type_di=td.id_type_di AND gap.id_type_condition=tco.id_type_condition AND gap.id_type_vi=tv.id_type_vi AND gap.id_chauffeur= $id_profil";

			$request = " AND EXTRACT(DAY FROM created_at) = $d AND EXTRACT(MONTH FROM created_at) = $m AND EXTRACT(YEAR FROM created_at) = $y  ";
			$request_sp = " AND EXTRACT(DAY FROM sp.created_at) = $d AND EXTRACT(MONTH FROM sp.created_at) = $m AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			$request_gap = " AND EXTRACT(DAY FROM gap.created_at) = $d AND EXTRACT(MONTH FROM gap.created_at) = $m AND EXTRACT(YEAR FROM gap.created_at) = $y ";

			$nb_result = " AND EXTRACT(DAY FROM created_at) = $d AND EXTRACT(MONTH FROM created_at) = $m AND EXTRACT(YEAR FROM created_at) = $y  ";
		


			if(isset($_GET['jours']) && !empty($_GET['jours']))
			{

			    $jours = $_GET['jours'];
			    $query_courses .= " AND EXTRACT(DAY FROM created_at) = $jours";
			    
			    $query_signaler_probleme .= " AND EXTRACT(DAY FROM created_at) =$jours";

			    $query_vehicules .= " AND EXTRACT(DAY FROM created_at) = $jours";

			    $result .= " AND EXTRACT(DAY FROM created_at) = $jours ";
			    $nb_result = " AND EXTRACT(DAY FROM created_at) = $jours ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
			    //FIN CARTE MAP

			    //GAP
			    $query_gap .= " AND EXTRACT(DAY FROM gap.created_at) = $jours";
			    //FIN GAP

			    //REQUETE COURANT
			    $request1 = " AND EXTRACT(MONTH FROM created_at) = $m AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(MONTH FROM sp.created_at) = $m AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(MONTH FROM gap.created_at) = $m AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(DAY FROM created_at) = $jours";
			}

			if(isset($_GET['semaines']) && !empty($_GET['semaines']))
			{

			    $semaines = explode(',', $_GET['semaines']);
			    $query_courses .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";
			    
			    $query_signaler_probleme .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

			    $query_vehicules .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

			    $result .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    $nb_result = " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    //FIN CARTE MAP

			    //GAP
			    $query_gap .= " AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    //FIN GAP

			    //REQUETE COURANT
			    $request1 = "AND EXTRACT(MONTH FROM created_at) = $m  AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(MONTH FROM sp.created_at) = $m AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(MONTH FROM gap.created_at) = $m AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

			}if(isset($_GET['mois']) && !empty($_GET['mois']))
			{

			    $mois = $_GET['mois'];
			    $query_courses .= " AND EXTRACT(MONTH FROM created_at) = $mois";
			    
			    $query_signaler_probleme .= " AND EXTRACT(MONTH FROM created_at) = $mois";

			    $query_vehicules .= " AND EXTRACT(MONTH FROM created_at) = $mois";

			    $result .= " AND EXTRACT(MONTH FROM created_at) = $mois ";
			    $nb_result = " AND EXTRACT(MONTH FROM created_at) = $mois ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois";
			    //FIN CARTE MAP

			    //GAP
			    $query_gap .= " AND EXTRACT(MONTH FROM gap.created_at) = $mois";
			    //FIN GAP

			    //REQUETE COURANT
			    $request1 = " AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(MONTH FROM created_at) = $mois";

			}if(isset($_GET['trimestres']) && !empty($_GET['trimestres']))
			{

			    $trimestres = $_GET['trimestres'];
			    $query_courses .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";
			    
			    $query_signaler_probleme .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

			    $query_vehicules .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres)";

			    $result .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";
			    $nb_result = " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
			    //FIN CARTE MAP

			    //GAP
			    $query_gap .= " AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) ";
			    //FIN GAP

			    //REQUETE COURANT
			    $request1 = "AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

			}if(isset($_GET['annees']) && !empty($_GET['annees']))
			{

			    $annees = $_GET['annees'];
			    $query_courses .= " AND EXTRACT(YEAR FROM created_at) = $annees ";
			    
			    $query_signaler_probleme .= " AND EXTRACT(YEAR FROM created_at) = $annees ";

			    $query_vehicules .= " AND EXTRACT(YEAR FROM created_at) = $annees ";

			    $result .= " AND EXTRACT(YEAR FROM created_at) = $annees ";
			    $nb_result = " AND EXTRACT(YEAR FROM created_at) = $annees ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees";
			    //FIN CARTE MAP

			    //GAP
			    $query_gap .= " AND EXTRACT(YEAR FROM gap.created_at) = $annees";
			    //FIN GAP

			    //REQUETE COURANT
			    $request1 = "";
			    $request_sp1 = "";
			    $request_gap1 = "";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(YEAR FROM created_at) = $annees ";

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

				//GAP
				$consulter_gap = mysqli_query($db, $query_gap);
				//FIN GAP

			}

			$result_info_courses = mysqli_query($db,$query_courses." AND id_users=$id_profil $request ");
			$row_info_courses = mysqli_num_rows($result_info_courses);
			if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
			else{$data_info_courses = 0;}

			$result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme." AND id_user=$id_profil $request");
			$row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
			if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
			else{$data_info_signaler_probleme = 0;}

			$result_info_vehicules = mysqli_query($db,$query_vehicules." AND id_chauffeur=$id_profil $request ");
			$row_info_vehicules = mysqli_num_rows($result_info_vehicules);
			if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
			else{$data_info_veficules = 0;}

			$consulter_result = mysqli_query($db, $result." AND id_user=$id_profil $request");
			while($row = mysqli_fetch_array($consulter_result))
			{
			  $months = $row["months"];
			  $dataY .= nb($db, $months, $nb_result).',';
			  $dataX .= '"'.get_month($months).'",';
			}

			//CAMEMBERT SIGNALS
			$consulter_result_si = mysqli_query($db, $result_si." $request_sp AND sp.id_user=$id_profil GROUP BY sp.type_signal");
			while($row = mysqli_fetch_array($consulter_result_si))
			{
			  $type_signal = $row["type_signal"];
			  $label_si .= '"'.$row["libelle_si"].'",';
			  $value_si .= nb_signal($db, $type_signal, $xday, $request).',';
			}
			//FIN CAMEMBERT SIGNALS

			//CAMEMBERT PROBLEMES
			$consulter_result_pro = mysqli_query($db, $result_pro." $request_sp AND sp.id_user=$id_profil GROUP BY sp.type_probleme");
			while($row = mysqli_fetch_array($consulter_result_pro))
			{
			  $type_probleme = $row["type_probleme"];
			  $label_pro .= '"'.$row["libelle_pro"].'",';
			  $value_pro .= nb_probleme($db, $type_probleme, $xday, $request).',';

			}
			//FIN CAMEMBERT

			//CARTE MAP
			$consulter_result_map = mysqli_query($db, $result_map." $request_sp ");
			while($row = mysqli_fetch_array($consulter_result_map))
			{
			  $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
			}
			//FIN CARTE MAP

			//GAP
			$consulter_gap = mysqli_query($db, $query_gap." $request_gap ");
			//FIN GAP

			$sql_info = "SELECT * FROM users WHERE user_id='".$id_profil."' ";
			$result_info = mysqli_query($db,$sql_info);
			$data_info = mysqli_fetch_array($result_info);

			include 'views/'.$page.'.php';
		} else if ($_GET['page']=="gestions_affectations" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$consulter_users = mysqli_query($db, "SELECT * FROM users WHERE user_id!='1' AND user_id in (SELECT user_id FROM affectations WHERE id_profil=0 ORDER BY updated_at DESC)");

			$consulter_users2 = mysqli_query($db, "SELECT * FROM users WHERE user_id!='1' AND user_id in (SELECT user_id FROM affectations ORDER BY updated_at DESC)");

			$consulter_profils2 = mysqli_query($db, "SELECT * FROM profil WHERE id_profil!='1' ");

			$consulter_profils = mysqli_query($db, "SELECT * FROM profil WHERE id_profil!='1' ");
			include 'views/'.$page.'.php';
		}
		else if ($_GET['page']=="gestions_fonctionnalites" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$consulter_profils = mysqli_query($db, "SELECT * FROM profil WHERE id_profil!='1' AND id_profil!='2' ORDER BY id_profil  DESC ");

			include 'views/'.$page.'.php';
		}
		else if ($_GET['page']=="gestions_actions_systemes" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$consulter_profils = mysqli_query($db, "SELECT * FROM profil WHERE id_profil!='1' AND id_profil!='2' ORDER BY id_profil  DESC ");

			include 'views/'.$page.'.php';
		}
		else if ($_GET['page']=="gestion_signalitique" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;

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
			$type_chiffre_daffaire = "";
			$type_activites = "";
			$logo = "";

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
				$type_chiffre_daffaire = $data_info_ent['type_chiffre_affaire'];
				$type_activites = $data_info_ent['type_activite'];
				$logo = $data_info_ent['logo'];

				
			}

			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_activites" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="parametrages_appreciations" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="parametrages_signaler_probleme" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_conduites" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_dialogues" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_conditions" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_vitesses" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_signals" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_problemes" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_vehicules" && isset($_GET['id_user']) && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$id_user = $_GET['id_user'];
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="gestions_chauffeurs" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="tableau_bord" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$jours = "";
			$semaine = "";
			$annees = "";
			if (isset($_GET['semaines'])) {
				$semaine = $_GET['semaines'];
			}else{
				$semaine = "";
			}
			$mois = "";
			$trimestres = "";
			
			if (isset($_GET['annees'])) {
				$annees = $_GET['annees'];
			}else{
				$annees = "";
			}

			$d = date('d');
			$m = date('m');
			$y = date('Y');
			$xday = "";
			$query_courses = "";
			$query_signaler_probleme = "";
			$query_vehicules = "";
			$result = "";
			$result_si = "";
			$result_pro = "";
			$result_map = "";
			$nb_result = "";
			$request = '';
			$request_sp = "";
			$request_gap = "";
			$request1 = "";
			$request_sp1 = "";
			$request_gap1 = "";

			$consulter_result = "";
			$consulter_result_si = "";
			$consulter_result_pro = "";
			$consulter_result_map = "";
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

			$request = " AND EXTRACT(DAY FROM created_at) = $d AND EXTRACT(MONTH FROM created_at) = $m AND EXTRACT(YEAR FROM created_at) = $y  ";
			$request_sp = " AND EXTRACT(DAY FROM sp.created_at) = $d AND EXTRACT(MONTH FROM sp.created_at) = $m AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			$request_gap = " AND EXTRACT(DAY FROM gap.created_at) = $d AND EXTRACT(MONTH FROM gap.created_at) = $m AND EXTRACT(YEAR FROM gap.created_at) = $y ";

			$nb_result = " AND EXTRACT(DAY FROM created_at) = $d AND EXTRACT(MONTH FROM created_at) = $m AND EXTRACT(YEAR FROM created_at) = $y  ";

			if(isset($_GET['jours']) && !empty($_GET['jours']))
			{

			    $jours = $_GET['jours'];
			    $query_courses .= " AND EXTRACT(DAY FROM created_at) = $jours";
			    
			    $query_signaler_probleme .= " AND EXTRACT(DAY FROM created_at) =$jours";

			    $query_vehicules .= " AND EXTRACT(DAY FROM created_at) = $jours";

			    $result .= " AND EXTRACT(DAY FROM created_at) = $jours ";
			    $nb_result = " AND EXTRACT(DAY FROM created_at) = $jours ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(DAY FROM sp.created_at) = $jours";
			    //FIN CARTE MAP

			    //REQUETE COURANT
			    $request1 = " AND EXTRACT(MONTH FROM created_at) = $m AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(MONTH FROM sp.created_at) = $m AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(MONTH FROM gap.created_at) = $m AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(DAY FROM created_at) = $jours";

			}

			if(isset($_GET['semaines']) && !empty($_GET['semaines']))
			{

			    $semaines = explode(',', $_GET['semaines']);
			    $query_courses .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";
			    
			    $query_signaler_probleme .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

			    $query_vehicules .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

			    $result .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    $nb_result = " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1] ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(DAY FROM sp.created_at) BETWEEN $semaines[0] and $semaines[1] ";
			    //FIN CARTE MAP

			    //REQUETE COURANT
			    $request1 = "AND EXTRACT(MONTH FROM created_at) = $m  AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(MONTH FROM sp.created_at) = $m AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(MONTH FROM gap.created_at) = $m AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";

			}if(isset($_GET['mois']) && !empty($_GET['mois']))
			{

			    $mois = $_GET['mois'];
			    $query_courses .= " AND EXTRACT(MONTH FROM created_at) = $mois";
			    
			    $query_signaler_probleme .= " AND EXTRACT(MONTH FROM created_at) = $mois";

			    $query_vehicules .= " AND EXTRACT(MONTH FROM created_at) = $mois";

			    $result .= " AND EXTRACT(MONTH FROM created_at) = $mois ";
			    $nb_result = " AND EXTRACT(MONTH FROM created_at) = $mois ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(MONTH FROM sp.created_at) = $mois";
			    //FIN CARTE MAP

			    //REQUETE COURANT
			    $request1 = " AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(MONTH FROM created_at) = $mois";

			}if(isset($_GET['trimestres']) && !empty($_GET['trimestres']))
			{

			    $trimestres = $_GET['trimestres'];
			    $query_courses .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";
			    
			    $query_signaler_probleme .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

			    $query_vehicules .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres)";

			    $result .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";
			    $nb_result = " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(MONTH FROM sp.created_at) IN ($trimestres) ";
			    //FIN CARTE MAP

			    //REQUETE COURANT
			    $request1 = "AND EXTRACT(YEAR FROM created_at) = $y ";
			    $request_sp1 = " AND EXTRACT(YEAR FROM sp.created_at) = $y ";
			    $request_gap1 = " AND EXTRACT(YEAR FROM gap.created_at) = $y ";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(MONTH FROM created_at) IN ($trimestres) ";

			}if(isset($_GET['annees']) && !empty($_GET['annees']))
			{

			    $annees = $_GET['annees'];
			    $query_courses .= " AND EXTRACT(YEAR FROM created_at) = $annees ";
			    
			    $query_signaler_probleme .= " AND EXTRACT(YEAR FROM created_at) = $annees ";

			    $query_vehicules .= " AND EXTRACT(YEAR FROM created_at) = $annees ";

			    $result .= " AND EXTRACT(YEAR FROM created_at) = $annees ";
			    $nb_result = " AND EXTRACT(YEAR FROM created_at) = $annees ";

			    //CAMEMBERT SIGNALS
			    $result_si .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees ";
			    //FIN CAMEMBERT SIGNALS

			    //CAMEMBERT PROBLEMES
			    $result_pro .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees ";
			    //FIN CAMEMBERT

			    //CARTE MAP
			    $result_map .= " AND EXTRACT(YEAR FROM sp.created_at) = $annees";
			    //FIN CARTE MAP

			    //REQUETE COURANT
			    $request1 = "";
			    $request_sp1 = "";
			    $request_gap1 = "";
			    $request = $request1;
			    $request_sp = $request_sp1;
			    $request_gap = $request_gap1;
			    //FIN REQUETE COURANT
			    $xday = " AND EXTRACT(YEAR FROM created_at) = $annees ";

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

			$result_info_courses = mysqli_query($db,$query_courses." $request ");
			$row_info_courses = mysqli_num_rows($result_info_courses);
			if ($row_info_courses > 0) {$data_info_courses = $row_info_courses;}
			else{$data_info_courses = 0;}

			$result_info_signaler_probleme = mysqli_query($db,$query_signaler_probleme." $request ");
			$row_info_signaler_probleme = mysqli_num_rows($result_info_signaler_probleme);
			if ($row_info_signaler_probleme > 0) {$data_info_signaler_probleme = $row_info_signaler_probleme;}
			else{$data_info_signaler_probleme = 0;}

			$result_info_vehicules = mysqli_query($db,$query_vehicules." $request ");
			$row_info_vehicules = mysqli_num_rows($result_info_vehicules);
			if ($row_info_vehicules > 0) {$data_info_veficules = $row_info_vehicules;}
			else{$data_info_veficules = 0;}

			$consulter_result = mysqli_query($db, $result." $request GROUP BY MONTH(created_at) ");
			while($row = mysqli_fetch_array($consulter_result))
			{
			  $months = $row["months"];
			  $dataY .= nb($db, $months, $nb_result).',';
			  $dataX .= '"'.get_month($months).'",';
			}

			//CAMEMBERT SIGNALS
			$consulter_result_si = mysqli_query($db, $result_si." $request_sp GROUP BY sp.type_signal ");
			while($row = mysqli_fetch_array($consulter_result_si))
			{
			  $type_signal = $row["type_signal"];
			  $label_si .= '"'.$row["libelle_si"].'",';
			  $value_si .= nb_signal($db, $type_signal, $xday, $request).',';
			}
			//FIN CAMEMBERT SIGNALS

			//CAMEMBERT PROBLEMES
			$consulter_result_pro = mysqli_query($db, $result_pro." $request_sp GROUP BY sp.type_probleme ");
			while($row = mysqli_fetch_array($consulter_result_pro))
			{
			  $type_probleme = $row["type_probleme"];
			  $label_pro .= '"'.$row["libelle_pro"].'",';
			  $value_pro .= nb_probleme($db, $type_probleme, $xday, $request).',';

			}
			//FIN CAMEMBERT

			//CARTE MAP
			$consulter_result_map = mysqli_query($db, $result_map." $request_sp ");
			while($row = mysqli_fetch_array($consulter_result_map))
			{
			  $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
			}
			//FIN CARTE MAP



			//FILTRE AVANCER OU PARTICULIER
               $consulter_conduite = mysqli_query($db, "
                    SELECT DISTINCT * FROM types_conduites ORDER BY id_type_conduite DESC");

               $consulter_di = mysqli_query($db, "
                    SELECT DISTINCT * FROM types_dialogues ORDER BY id_type_di DESC");

               $consulter_condition = mysqli_query($db, "
                    SELECT DISTINCT * FROM types_conditions ORDER BY id_type_condition DESC ");

               $consulter_vi = mysqli_query($db, "
                    SELECT DISTINCT * FROM types_vitesses ORDER BY id_type_vi DESC");                    
			//FIN FILTRE AVANCER OU PARTICULIER

			

			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="details_notifications" && isset($_GET['id_no']) && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$id_no = $_GET['id_no'];

			$update = "update signaler_probleme set statut_vue=1 WHERE statut_vue=0 AND id_sp= $id_no ";
			if(mysqli_query($db, $update)){ } 
			else{ echo mysqli_error($db);}

			$result = mysqli_query($db, "SELECT *, sp.id_user as id_chauffeur, sp.created_at as date_not FROM `signaler_probleme` as sp, users as u, types_signals as ts, types_problemes as tp WHERE sp.id_user=u.user_id AND sp.type_signal=ts.id_type_si AND sp.type_probleme=tp.id_type_pro AND sp.id_sp=$id_no");
     		$info_no = mysqli_fetch_array($result);

     		//CARTE MAP
			$result_map = "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id AND sp.statut = 1 AND sp.id_sp=$id_no";

			//CARTE MAP
			$consulter_result_map = mysqli_query($db, $result_map);
			$row = mysqli_fetch_array($consulter_result_map);
			$data_map = '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
			//FIN CARTE MAP

			include 'views/'.$page.'.php';
		}else if ($_GET['page']=="notifications" && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;

			$consulter_notifications = mysqli_query($db, "SELECT *, sp.id_user as id_chauffeur, sp.created_at as date_not FROM `signaler_probleme` as sp, users as u, types_signals as ts, types_problemes as tp WHERE sp.id_user=u.user_id AND sp.type_signal=ts.id_type_si AND sp.type_probleme=tp.id_type_pro ORDER BY sp.id_sp DESC ");

			include 'views/'.$page.'.php';
		}

		//CURRENT
		else if ($_GET['page']=="current" && file_exists('views/'.$_GET["page"].'.php')) {
			var_dump($_GET);
			$page=$_GET['page'];
			$current_page=$page;

			include 'views/'.$page.'.php';
		}

		else if ($_GET['page']=="vignettes" && checkParamsVehiculeChauffeur($db, $_GET['id_chauffeur'], $_GET['id_ve']) >= 1 && isset($_GET['id_ve']) && isset($_GET['id_chauffeur']) && file_exists('views/'.$_GET["page"].'.php')) {
			$page=$_GET['page'];
			$current_page=$page;
			$id_ve = $_GET['id_ve'];
			$id_chauffeur = $_GET['id_chauffeur'];

			$result1 = mysqli_query($db, "SELECT * FROM users as u, vehicules as ve WHERE u.user_id = '".$id_chauffeur."' and ve.id_ve = '".$id_ve."' AND u.user_id=ve.id_chauffeur ");
			$data = mysqli_fetch_array($result1);


			include 'views/'.$page.'.php';
		}


		else if ($_GET['page']=="logout") {
			session_unset();
	        session_destroy();
	        echo "<script>window.location='?page=login';</script>";
		}


	}else{

		$page='login';
		$current_page=$page;
		include 'views/'.$page.'.php';
	}

}  
else  
{  
   
   if (isset($_GET['page']) && $_GET['page']=="login" && file_exists('views/'.$_GET["page"].'.php')) {
	$page=$_GET['page'];
	$current_page=$page;
	include 'views/'.$page.'.php';
   }else if (isset($_GET['page']) && $_GET['page']=="forgot_pass" && file_exists('views/'.$_GET["page"].'.php')) {
	$page=$_GET['page'];
	$current_page=$page;
	include 'views/'.$page.'.php';
   }else if (isset($_GET['page']) && $_GET['page']=="forgot_email" && file_exists('views/'.$_GET["page"].'.php')) {
	$page=$_GET['page'];
	$current_page=$page;
	include 'views/'.$page.'.php';
   }else{
   	$page='login';
     $current_page=$page;
     include 'views/'.$page.'.php';
   }

}

 ?>