<?php


include("../config/db.php");

extract($_POST);

$libelle = trim(strip_tags(addcslashes($libelle, "'")));

$date = date('Y-m-d H:i:s');

$sql = "SELECT * FROM profil WHERE libelle_profil = '".$libelle."'  ";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);
      
if ($row == 0) {
    if(mysqli_query($db,"insert into profil(libelle_profil, created_at) 
                   values('$libelle', '$date')"))
		{echo "success";}
		else{echo mysqli_error($db);}

		$sql = "SELECT * FROM profil ORDER BY id_profil DESC LIMIT 1 ";
		$result = mysqli_query($db,$sql);
		$data = mysqli_fetch_array($result);
		$id_profil = $data['id_profil'];

    if(mysqli_query($db,"insert into fonctionnalites(id_profil, created_at) 
               values('$id_profil', '$date')"))
    {echo "success";}
    else{echo mysqli_error($db);}

    if(mysqli_query($db,"insert into actions_systemes(id_profil, created_at) 
               values('$id_profil', '$date')"))
    {echo "success";}
    else{echo mysqli_error($db);}

}else{
	echo 'error';
}


  ?>