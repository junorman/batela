<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "prudence");

$dataX = '';
$dataY = '';
$query = "SELECT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` GROUP BY MONTH(created_at)";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
  $months = $row["months"];
  echo $dataY .= nb($connect, $months).',';
  $dataX .= '"'.get_month($months).'",';
}

echo $dataX = substr($dataX, 0, -1);
echo $dataY = substr($dataY, 0, -1);

function nb($db, $month){

   $sql = "SELECT * FROM signaler_probleme WHERE EXTRACT(MONTH FROM created_at) = '".$month."' ";
   $result = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result);

   return $row;
}

function get_month($month){
    $val = "";
    if ($month == 1) {
        $val = "Janvier";
    }else if ($month == 2) {
        $val = "Février";
    }else if ($month == 3) {
        $val = "Mars";
    }else if ($month == 4) {
        $val = "Avril";
    }else if ($month == 5) {
        $val = "Mai";
    }else if ($month == 6) {
        $val = "Juin";
    }else if ($month == 7) {
        $val = "Juillet";
    }else if ($month == 8) {
        $val = "Août";
    }else if ($month == 9) {
        $val = "Septembre";
    }else if ($month == 10) {
        $val = "Octobre";
    }else if ($month == 11) {
        $val = "Novembre";
    }else if ($month == 12) {
        $val = "Décembre";
    }

    return $val;
}
?> 


