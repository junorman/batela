<?php 
include("../config/db.php");

$x = count($_POST["details"]);

$date = date('Y-m-d H:i:s');

for($i=0; $i<$x; $i++)  {
	echo $libelle = trim(strip_tags(addcslashes($_POST["libelle"][$i], "'")));
	echo $details = trim(strip_tags(addcslashes($_POST["details"][$i], "'")));

	if(mysqli_query($db,"insert into objets(libelle_obj, description_obj, created_at) 
       values('$libelle', '$details', '$date')"))
	    {echo "success";}
	    else{echo mysqli_error($db);}
}



 ?>