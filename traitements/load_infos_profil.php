<?php 

 include("../config/db.php");
 include("../config/styles.php");
 include("../config/functions.php");

 extract($_POST);
 
 $libelle_profil = ""; 

 $sql_info = "SELECT * FROM users WHERE user_id='".$id."' ";
 $result_info = mysqli_query($db,$sql_info);
 $data_info = mysqli_fetch_array($result_info);

 $sql_info_profil = "SELECT * FROM users as u, affectations as af, profil as pro WHERE u.user_id='".$id."' AND u.user_id=af.user_id AND af.id_profil=pro.id_profil ";
 $result_info_profil = mysqli_query($db,$sql_info_profil);
 $row_info_profil = mysqli_num_rows($result_info_profil);
 if($row_info_profil > 0) {
	$data_info_profil = mysqli_fetch_array($result_info_profil);
	$libelle_profil =  $data_info_profil['libelle_profil'];
 }

 ?>
<p class="text-muted mb-4">Je suis <?php echo $libelle_profil ?></p>
<div class="table-responsive">
    <table class="table table-nowrap mb-0">
        <tbody>
			 <tr>
			    <th scope="row">Nom :</th>
			    <td>
			        <?php echo $data_info['user_nom'] ?>
			    </td>
			</tr>
			<tr>
			    <th scope="row">Prénom :</th>
			    <td>
			        <?php echo $data_info['user_prenom'] ?>
			    </td>
			</tr>
			<tr>
			    <th scope="row">E-mail :</th>
			    <td>
			        <?php echo $data_info['user_email'] ?>
			    </td>
			</tr>
			<tr>
			    <th scope="row">Adresse :</th>
			    <td>
			        <?php echo $data_info['user_adresse'] ?>
			    </td>
			</tr>
			<tr>
			    <th scope="row">Tel :</th>
			    <td>
			        <?php echo $data_info['user_phone'] ?>
			    </td>
			</tr>
			<tr>
			    <th scope="row">Sexe :</th>
			    <td>
			        <?php echo $data_info['sexe'] ?>
			    </td>
			</tr>
			<tr>
			    <th scope="row">Etat :</th>
			    <td>
			        <?php echo stateUser($data_info['user_etat']) ?>
			    </td>
			</tr>
       </tbody>
    </table>
</div>