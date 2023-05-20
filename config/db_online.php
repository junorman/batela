<?php
$db = mysqli_connect("localhost","u483922348_ikoku_tecno","Ikoku@2022","u483922348_ikoku2");

// Check connection
if (mysqli_connect_errno()) {
  echo "Echec de connection &agrave; MySQL: " . mysqli_connect_error();
  exit();
}
?>
