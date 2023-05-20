<?php 

include("config/db.php");

$id_user = $_POST['id_user'];
$numero = $_POST['numero'];

$sql = "SELECT * FROM notes WHERE id_user = '".$id_user."' and numero = '".$numero."' ";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);

if ($row == 0) {
    if(mysqli_query($db,"insert notes (id_user, numero) 
       values('$id_user','$numero')"))
      {echo "success";}
      else{echo mysqli_error($db);}
}else{
    echo "error";
}




 ?>