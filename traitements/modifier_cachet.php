<?php 
include("../config/db.php");

$photoname = $_FILES['file']['name'];
$phototmp=$_FILES['file']['tmp_name'];



 	if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0)
      {
       if ($_FILES['file']['size'] <= 9000000000)
        {
          $infosfichier =pathinfo($photoname);
          pathinfo($photoname);
          $extension_upload  = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'jpeg', 'gif','png');
        if (in_array($extension_upload ,$extensions_autorisees))
         {
          $dossier = '../img2/'.$_FILES['file']['name'];
          if (move_uploaded_file($phototmp, $dossier))
            {
              
              $update = "update entreprise set cachet='".$photoname."' ";
                if(mysqli_query($db, $update)){ } 
                else{ echo mysqli_error($db);}  
                echo "success";

            }
           else{
      	    echo "size";
             }	
         }
       }

     }

 


 ?>