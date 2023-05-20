<?php 

include("config/db.php");

$id_user = $_POST['id_user'];
$numero = $_POST['numero'];
$matricule = $_POST['matricule'];

if(mysqli_query($db,"insert courses (id_users, numero, matricule) 
                   values('$id_user','$numero', '$matricule')"))
		    {echo "success";}
		    else{echo mysqli_error($db);}


 ?>