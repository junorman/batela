<?php 
include("../config/db.php");

$photoname = $_FILES['file2']['name'];
$phototmp=$_FILES['file2']['tmp_name'];

$designation = trim(strip_tags(addcslashes($_POST['designation2'], "'")));
$sigle = trim(strip_tags(addcslashes($_POST['sigle2'], "'")));
$nif = trim(strip_tags(addcslashes($_POST['nif2'], "'")));
$capital_social = trim(strip_tags(addcslashes($_POST['capital_social2'], "'")));
$rccm = trim(strip_tags(addcslashes($_POST['rccm2'], "'")));
$adresse = trim(strip_tags(addcslashes($_POST['adresse2'], "'")));
$bp = trim(strip_tags(addcslashes($_POST['bp2'], "'")));
$tel = trim(strip_tags(addcslashes($_POST['tel2'], "'")));
$email = trim(strip_tags(addcslashes($_POST['email2'], "'")));
$siteweb = trim(strip_tags(addcslashes($_POST['siteweb2'], "'")));
$mots = trim(strip_tags(addcslashes($_POST['mots2'], "'")));
$chiffre_daffaire = trim(strip_tags(addcslashes($_POST['chiffre_daffaire2'], "'")));

if ($photoname=="") {
        $sql = "update entreprise set  designation='".$designation."', sigle='".$sigle."', nif='".$nif."', rccm='".$rccm."', capital_social='".$capital_social."', localisation='".$adresse."', bp='".$bp."', telephone='".$tel."', email='".$email."', site_web='".$siteweb."', chiffre_affaire='".$chiffre_daffaire."', mots='".$mots."' ";
                  if(mysqli_query($db, $sql)){echo 'success';} 
                  else{ echo mysqli_error($db);}
                  
 }else{

 	if (isset($_FILES['file2']) AND $_FILES['file2']['error'] == 0)
          {
           if ($_FILES['file2']['size'] <= 9000000000)
            {
              $infosfichier =pathinfo($photoname);
              pathinfo($photoname);
              $extension_upload  = $infosfichier['extension'];
              $extensions_autorisees = array('jpg', 'jpeg', 'gif','png');
            if (in_array($extension_upload ,$extensions_autorisees))
             {
              $dossier = '../img/logo/'.$_FILES['file2']['name'];
              if (move_uploaded_file($phototmp, $dossier))
                {
                  $sql = "update entreprise set  designation='".$designation."', sigle='".$sigle."', nif='".$nif."', rccm='".$rccm."', capital_social='".$capital_social."', localisation='".$adresse."', bp='".$bp."', telephone='".$tel."', email='".$email."', site_web='".$siteweb."', logo='".$photoname."', chiffre_affaire='".$chiffre_daffaire."', mots='".$mots."' ";
                  if(mysqli_query($db, $sql)){echo 'success';} 
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