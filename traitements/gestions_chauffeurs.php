<?php


include("../config/db.php");

extract($_POST);

$nom = trim(strip_tags(addcslashes($nom, "'")));
$prenom = trim(strip_tags(addcslashes($prenom, "'")));
$tel = trim(strip_tags(addcslashes($tel, "'")));
$email = trim(strip_tags(addcslashes($email, "'")));
$adresse = trim(strip_tags(addcslashes($adresse, "'")));

$created_at = date('Y-m-d H:i:s');
$today = date('YmdHi');
$startDate = date('YmdHi', strtotime('Y-m-d H:i:s'));
$range = $today - $startDate;
$rand = 'ikoku'.rand(0, $range);

$sql = "SELECT * FROM users WHERE user_email = '".$email."'  ";
$result = mysqli_query($db,$sql);
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$row = mysqli_num_rows($result);

$date = date('Y-m-d');
$split_data = explode("-", $date);
$jour = $split_data[2];
$mois = $split_data[1];
$annee = $split_data[0];

$pass = "1234";

$avatar = "avatar.png";
      
if ($row == 0) {
    if(mysqli_query($db,"insert into users(user_code, user_nom, user_prenom, user_phone,
                   user_email, user_password, sexe, user_photo, user_adresse, user_datereg, type, user_birthday) 
                   values('$rand', '$nom','$prenom','$tel', '$email', '$pass', '$sexe', '$avatar', '$adresse', '$date', 'CH', '$date_nais')"))
            {echo "success";}
            else{echo mysqli_error($db);}

$sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1 ";
$result = mysqli_query($db,$sql);
$data = mysqli_fetch_array($result);
$id_user = $data['user_id'];

if(mysqli_query($db,"insert into affectations(user_id, id_profil, created_at) 
               values('$id_user', '2','$created_at')"))
{}
else{echo mysqli_error($db);}

}else{
    echo 'error';
}


  ?>