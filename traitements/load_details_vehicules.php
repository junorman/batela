<?php 

include("../config/db.php");
include("../config/functions.php");

extract($_POST);

$sql_info_ent = "SELECT * FROM entreprise ";
$result_info_ent = mysqli_query($db,$sql_info_ent);
$row_info_ent = mysqli_num_rows($result_info_ent);
$data_info_ent = mysqli_fetch_array($result_info_ent);
$cachet = $data_info_ent['cachet'];

$result1 = mysqli_query($db, "SELECT * FROM users as u, vehicules as ve WHERE u.user_id = '".$id_chauffeur."' and ve.id_ve = '".$id."' AND u.user_id=ve.id_chauffeur ");
$data = mysqli_fetch_array($result1);


 ?>
<div class="row">
	<div class="col-md-2">
		<img src="img/flag2.jpg" style="width:50px;height:50px">
	</div>
	<div class="col-md-8">
		<h1 style="text-align:center;font-size: 20px;">
			REPUBLIQUE GABONAISE
		</h1>
		<h3 style="text-align:center;font-size: 20px;">Carte de suivi de conduite</h3>
	</div>
	<div class="col-md-2">
		<img src="img/dev2.png" style="width:50px;height:50px">
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<img src="img/profil/<?php echo $data['user_photo'] ?>" style="width:100%;">
	</div>
	<div class="col-md-8">
		<strong>Nom:</strong>&nbsp;&nbsp;
		<span><?php echo strtoupper($data['user_nom']) ?></span><br>

		<strong>Prenom:</strong>&nbsp;&nbsp;
		<span><?php echo strtoupper($data['user_prenom']) ?></span><br>

		<strong>DATE DE NAISSANCE:</strong>&nbsp;&nbsp;
		<span><?php echo $data['user_birthday'] ?></span><br>

		<strong>Tel:</strong>&nbsp;&nbsp;
		<span><?php echo $data['user_phone'] ?></span><br>

		<strong>Sexe:</strong>&nbsp;&nbsp;
		<span><?php echo $data['sexe'] ?></span><br>

		<strong>Adresse:</strong>&nbsp;&nbsp;
		<span><?php echo $data['user_adresse'] ?></span><br>
	</div>
</div>

<div class="row" style="margin-top: 5%;">
	<div class="col-md-4">
		<div class="row">
			<img src="img/carte3.png" style="width:50%;">
		</div>
		<div class="row">
			
		</div>
		<div class="row">
			<img src="temp/<?php echo $data['qrcode'] ?>" style="width:50%;">
		</div>
	</div>
	<div class="col-md-4">
		<h6>N° Carte
			<?php 
				if ($data['id_ve'] >= 1 && $data['id_ve'] <= 9) {
					echo '0000'.$data['id_ve'];
				}if ($data['id_ve'] >= 10 && $data['id_ve'] <= 99) {
					echo '000'.$data['id_ve'];
				}if ($data['id_ve'] >= 100 && $data['id_ve'] <= 999) {
					echo '00-'.$data['id_ve'];
				}if ($data['id_ve'] >= 1000 && $data['id_ve'] <= 9999) {
					echo '0-'.$data['id_ve'];
				}if ($data['id_ve'] >= 10000 && $data['id_ve'] <= 99999) {
					echo $data['id_ve'];
				} 
			?>
		</h6>
	</div>
	<div class="col-md-4">
		<div class="row">
			<strong>
			 <b>Signature</b>
			</strong>
		</div>
		<div class="row">
			<img src="img/cachet/<?php echo $cachet ?>" style="width:50%;">
		</div>
		<div class="row">
			<strong>
			 <b>Chef MALONGA PAUL</b>
			</strong>
		</div>
	</div>
</div>