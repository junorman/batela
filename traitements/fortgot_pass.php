<?php 
include("../config/db.php");

extract($_POST);

$email = addslashes($email);
$pass = addslashes($pass);
$pass2 = addslashes($pass2);

$sql = "SELECT * FROM users WHERE user_email = '".$email."' AND user_password = '".$pass."'  ";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);


if ($row > 0) {
   	
	$sql = "update users set user_password='".$pass2."'
        WHERE user_email='".$email."' AND user_password = '".$pass."' ";
		if(mysqli_query($db, $sql)){ echo "success";} 
		else{ echo mysqli_error($db);}

}else{
	echo 'error';
}


 ?>