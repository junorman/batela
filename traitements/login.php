<?php
   include("../config/db.php");
   session_start();

   extract($_POST);
      
   $sql = "SELECT * FROM users WHERE user_email = '".$email."' and user_password = '".$pass."' and user_etat = '1' ";
   $result = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result);
   
   $count = $row;      
 
   if($count>0) {

   	$result1 = mysqli_query($db, "SELECT * FROM users WHERE user_email = '".$email."' and user_password = '".$pass."' ");
     $data = mysqli_fetch_array($result1);
     $id=$data['user_id'];
     $_SESSION['id']=$data['user_id'];
     $_SESSION['nom']=$data['user_nom'];
     $_SESSION['prenom']=$data['user_prenom'];
     $_SESSION['image']=$data['user_photo'];
     $_SESSION['email']=$data['user_email'];
     $_SESSION['last_login_timestamp'] = time();
     //$_SESSION['logo']=$data_logo['image_logo'];

     echo "success";

   }else{
   	echo "error";
   }

 ?>