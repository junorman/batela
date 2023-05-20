<?php 
include("../config/db.php");

extract($_POST);

$email = addslashes($email);
$email2 = addslashes($email2);

$sql = "SELECT * FROM users WHERE user_email = '".$email."'  ";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);


if ($row > 0) {
   	
	$sql = "update users set user_email='".$email2."'
        WHERE user_email='".$email."' ";
		if(mysqli_query($db, $sql)){ echo "success";} 
		else{ echo mysqli_error($db);}

}else{
	echo 'error';
}


 ?>