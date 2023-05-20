<?php
   include("config/db.php");

   extract($_POST);
   $result2 = array(); 
   //$matricule = "MAT56676";
   $result = mysqli_query($db, "SELECT * FROM vehicules where matricule='".$matricule."' ");
   $row = mysqli_num_rows($result);

   if ($row > 0) {
        echo "success";
   }else{
      echo "error";
   }
   



     
   

?>