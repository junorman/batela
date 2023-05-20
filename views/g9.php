<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "prudence");

$label_si = '';
$value_si = '';

$result_si = mysqli_query($connect, "SELECT * FROM `signaler_probleme` as sp, types_signals as ts WHERE sp.type_signal=ts.id_type_si GROUP BY sp.type_signal");
while($row = mysqli_fetch_array($result_si))
{
  $type_signal = $row["type_signal"];
  $libelle_si = $row["libelle_si"];

  $label_si .= $row["libelle_si"].',';
  $value_si .= nb_signal($connect, $type_signal).',';

}

echo $label_si = substr($label_si, 0, -1);
echo $value_si = substr($value_si, 0, -1);

function nb_signal($db, $type_signal){

   $sql = "SELECT * FROM signaler_probleme WHERE type_signal = '".$type_signal."' ";
   $result_si = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result_si);

   return $row;
}


?> 


