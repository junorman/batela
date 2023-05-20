<?php
$db = mysqli_connect("localhost","root","","batela");

// Check connection
if (mysqli_connect_errno()) {
  echo "Echec de connection &agrave; MySQL: " . mysqli_connect_error();
  exit();
}
?>
