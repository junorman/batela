<?php 
//insert.php
//$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["jours"]))
{
 $framework = '';
 foreach($_POST["jours"] as $row)
 {
  $framework .= $row . ', ';
 }
 echo $framework = substr($framework, 0, -2);
 /*$query = "INSERT INTO like_table(framework) VALUES('".$framework."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }*/
}
?>