<?php 
include("../config/db.php");
include("../config/functions.php");

$consulter_result = mysqli_query($db, "SELECT *, sp.id_user as id_chauffeur, sp.created_at as date_not FROM `signaler_probleme` as sp, users as u, types_signals as ts, types_problemes as tp WHERE sp.id_user=u.user_id AND sp.type_signal=ts.id_type_si AND sp.type_probleme=tp.id_type_pro GROUP BY sp.id_sp ORDER BY sp.id_sp DESC ");
while($row = mysqli_fetch_array($consulter_result))
{  ?>

	 <a href="?page=details_notifications&id_no=<?php echo $row['id_sp'] ?>" class="text-reset notification-item">
	    <div class="d-flex">
	        <img src="img/profil/<?php echo $row['user_photo'] ?>"
	            class="me-3 rounded-circle avatar-xs" alt="user-pic">
	        <div class="flex-grow-1">
	            <p <?php echo stateNotify($row['statut_vue']) ?>>
	            	<?php echo $row['user_nom'].' '.$row['user_prenom'] ?>
	            </p>
	            <div class="font-size-12 text-muted">
	                <p class="mb-1" key="t-simplified" <?php echo stateNotify($row['statut_vue']) ?>>Signaler depuis: <?php echo $row['libelle_si'] ?></p>
	                <p class="mb-1" key="t-simplified" <?php echo stateNotify($row['statut_vue']) ?>>Problème causé: <?php echo $row['libelle_pro'] ?></p>
	                <p class="mb-0">
	                	<i class="mdi mdi-clock-outline"></i> 
	                	<span key="t-hours-ago" <?php echo stateNotify($row['statut_vue']) ?>>
	                		<time class="timeago" datetime="<?php echo $row['date_not'] ?>">Dec 18, 1978</time>
	                	</span>
	                </p>
	            </div>
	        </div>
	    </div>
	 </a>

<?php } ?>
<script src="assets/libs/jquery/jquery.timeago.js"></script>
<script src="assets/libs/locales/jquery.timeago.fr.js"></script>
<script>
	$(document).ready(function(){
		$(".timeago").timeago();
	});
</script>