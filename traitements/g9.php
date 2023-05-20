<?php 

include("../config/db.php");
include("../config/functions.php");

//extract($_GET);

$query = '';

$query = "SELECT * FROM gestions_appreciations as gap, users as u, types_conduites as tc, types_dialogues as td, types_conditions as tco, types_vitesses as tv WHERE u.user_id=gap.id_chauffeur AND tc.id_type_conduite=gap.id_type_conduite AND td.id_type_di=gap.id_type_di AND tco.id_type_condition=gap.id_type_condition AND tv.id_type_vi=gap.id_type_vi ";
  

if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours";
    $query .= " AND gap.id_chauffeur=".$id_user;
}


else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']) )
{   
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] and $semaines[1]";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{   
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];
    $query .= "AND EXTRACT(MONTH FROM gap.created_at) = $mois";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{   
	$id_user = $_GET['id_user'];
    $trimestres = $_GET['trimestres'];
    $query .= "AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres)";
    $query .= " AND gap.id_chauffeur=".$id_user;

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{   
	$id_user = $_GET['id_user'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(YEAR FROM gap.created_at) = $annees";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1]";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(MONTH FROM gap.created_at) = $mois";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{
   $id_user = $_GET['id_user'];
   $jours = $_GET['jours'];
   $annees = $_GET['annees'];
   $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
   $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $trimestres = $_GET['trimestres'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres)";
    $query .= " AND gap.id_chauffeur=".$id_user;
}


else if(isset($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $mois = $_GET['mois'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) = $mois ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $trimestres = $_GET['trimestres'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];
    $trimestres = $_GET['trimestres'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);
    $mois = $_GET['mois'];
    $trimestres = $_GET['trimestres'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $jours = $_GET['jours'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) = $jours AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(isset($_GET['semaines']) && isset($_GET['mois']) && empty($_GET['jours']) 
&& empty($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) = $mois";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $trimestres = $_GET['trimestres'];    
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres)";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $annees = $_GET['annees'];    
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(YEAR FROM gap.created_at) = $annees";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}


else if(empty($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}


else if(empty($_GET['jours']) && isset($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && isset($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $semaines = explode(',', $_GET['semaines']);    
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(DAY FROM gap.created_at) BETWEEN $semaines[0] AND $semaines[1] AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;

}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && empty($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $query .= "AND  EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}


else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& empty($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];    
    $annees = $_GET['annees'];
    $query .= "AND  EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && isset($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $mois = $_GET['mois'];    
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    $query .= "AND EXTRACT(MONTH FROM gap.created_at) = $mois AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}

else if(empty($_GET['jours']) && empty($_GET['semaines']) && empty($_GET['mois']) 
&& isset($_GET['trimestres']) && isset($_GET['annees']) && isset($_GET['id_user']))
{	
	$id_user = $_GET['id_user'];
    $trimestres = $_GET['trimestres'];
    $annees = $_GET['annees'];
    $query .= " AND EXTRACT(MONTH FROM gap.created_at) IN ($trimestres) AND EXTRACT(YEAR FROM gap.created_at) = $annees ";
    $query .= " AND gap.id_chauffeur=".$id_user;
}




//$query .= " GROUP BY gap.id_chauffeur";






$consulter_data = mysqli_query($db, $query);
while($row = mysqli_fetch_array($consulter_data)){
  echo $row['id_chauffeur'];
}
?>

