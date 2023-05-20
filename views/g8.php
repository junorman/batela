<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "prudence");

$label_pro = '';
$value_pro = '';

$result_pro = mysqli_query($connect, "SELECT * FROM `signaler_probleme` as sp, types_problemes as tp WHERE sp.type_probleme=tp.id_type_pro GROUP BY sp.type_probleme");
while($row = mysqli_fetch_array($result_pro))
{
  $type_probleme = $row["type_probleme"];
  $label_pro .= $row["libelle_pro"].',';
  $value_pro .= nb_probleme($connect, $type_probleme).',';
}

echo $label_pro = substr($label_pro, 0, -1);
echo $value_pro = substr($value_pro, 0, -1);

function nb_probleme($db, $type_probleme){

   $sql = "SELECT * FROM signaler_probleme WHERE type_probleme = '".$type_probleme."' ";
   $result_pro = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result_pro);

   return $row;
}


?> 


