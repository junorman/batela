<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "prudence");

$data_map = '';
$result_map = mysqli_query($connect, "SELECT * FROM `signaler_probleme` as sp, users as u WHERE sp.id_user=u.user_id ");
while($row = mysqli_fetch_array($result_map))
{
  $data_map .= '['.'"CHAUFFEUR: '.$row["user_nom"].' '.$row["user_prenom"].' VICTIME:'.$row["numero"].'",'.$row["latitude"].','.$row["longitude"].'],';
}

echo $data_map = substr($data_map, 0, -1);


?> 


