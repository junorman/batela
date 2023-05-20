<?php

session_start();

include("../config/db.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));

$id_user = $_SESSION['id'];
$date = date('Y-m-d H:i:s');

$sql = "SELECT * FROM types_problemes WHERE libelle_pro = '".$libelle."'  ";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);
      
if ($row == 0) {
    if(mysqli_query($db,"insert into types_problemes(libelle_pro, id_user, created_at) 
                   values('$libelle', '$id_user', '$date')"))
		{echo "success";}
		else{echo mysqli_error($db);}

}else{
	echo 'error';
}


  ?>