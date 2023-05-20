<?php

//fetch_data.php

include("../config/db.php");

/*if(isset($_POST["action"]))
{*/ 
	$consulter_data = "";
	$url = "";
	$query = "
		SELECT * FROM gestions_appreciations as gap, users as u WHERE gap.id_chauffeur=u.user_id AND gap.status = '1'
	";
	
	if(isset($_POST["conduite"]))
	{
		$conduite_filter = implode("','", $_POST["conduite"]);
		$query .= "
		 AND gap.id_type_conduite IN('".$conduite_filter."')
		";
	}
	if(isset($_POST["dialogue"]))
	{
		$dialogue_filter = implode("','", $_POST["dialogue"]);
		$query .= "
		 AND gap.id_type_di IN('".$dialogue_filter."')
		";
	}
	if(isset($_POST["condition"]))
	{
		$condition_filter = implode("','", $_POST["condition"]);
		$query .= "
		 AND gap.id_type_condition IN('".$condition_filter."')
		";
	}

	if(isset($_POST["vitesse"]))
	{
		$vitesse_filter = implode("','", $_POST["vitesse"]);
		$query .= "
		 AND gap.id_type_vi IN('".$vitesse_filter."')
		";
	}

	if (isset($_POST['jours']) && !empty($_POST['jours'])) {
		$jours = $_POST['jours'];
		$query .= " AND EXTRACT(DAY FROM gap.created_at) = $jours ";
	}if (isset($_POST['semaines']) && !empty($_POST['semaines'])) {
		$semaines = explode(',', $_POST['semaines']);
    	$query .= " AND EXTRACT(DAY FROM created_at) BETWEEN $semaines[0] and $semaines[1]";
	}if (isset($_POST['mois']) && !empty($_POST['mois'])) {
		$mois = $_POST['mois'];
		$query .= " AND EXTRACT(MONTH FROM created_at) = $mois";
	}if (isset($_POST['trimestres']) && !empty($_POST['trimestres'])) {
		$trimestres = $_POST['trimestres'];
		$query .= " AND EXTRACT(MONTH FROM created_at) IN ($trimestres)";
	}if (isset($_POST['annees']) && !empty($_POST['annees'])) {
		$annees = $_POST['annees'];
		$query .= " AND EXTRACT(YEAR FROM gap.created_at) = $annees";
	}else{
		//$query .= " GROUP BY gap.id_chauffeur";
		$consulter_data = mysqli_query($db, $query);	
	}

	$consulter_data = mysqli_query($db, $query." GROUP BY gap.id_chauffeur");

	$output = '';
	/*if($total_row > 0)
	{*/
		
			$output .= '<table class="table align-middle table-nowrap mb-0">
                            <thead style="background: <?php echo TD_HEADER_H ?>;color: <?php echo TD_HEADER_N ?>;">
                                <tr>
                                    <th class="align-middle">Nom & Prénom </th>
                                    <th class="align-middle">Tel</th>
                                    <th class="align-middle">Adresse</th>
                                    <th class="align-middle">Matricule</th>
                                    <th class="align-middle">Details</th>
                                   
                                </tr>
                            </thead>
                            <tbody>';
                            while($row = mysqli_fetch_array($consulter_data)){
                               $output .=' <tr>
                                    
                                    <td>'.$row['user_nom'].' '.$row['user_nom'].'</td>
                                    <td>
                                        '.$row['user_phone'].'
                                    </td>
                                    <td>
                                        '.$row['user_adresse'].'
                                    </td>

                                    <td>
                                        '.$row['matricule'].'
                                    </td>
                                    
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a href="?page=profil&id_profil='.$row['id_chauffeur'].'" style="background: <?php echo MENU_H ?>; border: 1px solid <?php echo BORDER_H ?>;" type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            <i class="fa fa-eye"></i> Détails
                                        </a>
                                    </td>
                                </tr>';
                                }
                           $output .= '</tbody>
                        </table>
			';
		
	/*}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}*/
	echo $output;
//}

?> 