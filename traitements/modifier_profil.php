<?php 
session_start();
include("../config/db.php");


$photoname = $_FILES['file']['name'];
$phototmp=$_FILES['file']['tmp_name'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id_user'];

if ($photoname=="") {
        
 }else{

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
              $dossier = '../img/profil/'.$_FILES['file']['name'];
              if (move_uploaded_file($phototmp, $dossier))
                {
                  if ($_SESSION['id'] == $id) {
                    $_SESSION['image'] = $photoname;
                  }
                 $sql = "update users set  user_photo='".$photoname."' WHERE user_id='".$id."'";

					if(mysqli_query($db, $sql))  
					{  
					     echo 'success';  
					   
					} 
					  
					  else{ echo mysqli_error($db);}
                 }
               else{
          	    echo "size";
                 }	
             }
           }
         }  
 }
 ?>