<?php 

include("../config/db.php");

extract($_POST);

$date = date('Y-m-d H:i:s');

$sql = "update fonctionnalites set  bib='".$bib."', info_ent='".$info_ent."', users='".$users."', gestions_users='".$gestions_users."', gestions_chauffeurs='".$gestions_chauffeurs."', gestions_pro='".$gestions_pro."', droits='".$droits."', ap='".$ap."', gestions_conduites='".$gestions_conduites."', gestions_dialogues='".$gestions_dialogues."', gestions_conditions='".$gestions_conditions."', gestions_vitesses='".$gestions_vitesses."', sp='".$sp."', gestions_signals='".$gestions_signals."', gestions_problemes='".$gestions_problemes."', noti='".$noti."', tb='".$tb."'
        WHERE id_fonc='".$id_fonc."' ";
		if(mysqli_query($db, $sql)){ echo "success";} 
		else{ echo mysqli_error($db);}


 ?>