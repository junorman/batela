<?php 
include("../config/db.php");

$photoname = $_FILES['file']['name'];
$phototmp=$_FILES['file']['tmp_name'];

$designation = trim(strip_tags(addcslashes($_POST['designation'], "'")));
$sigle = trim(strip_tags(addcslashes($_POST['sigle'], "'")));
$nif = trim(strip_tags(addcslashes($_POST['nif'], "'")));
$capital_social = trim(strip_tags(addcslashes($_POST['capital_social'], "'")));
$rccm = trim(strip_tags(addcslashes($_POST['rccm'], "'")));
$adresse = trim(strip_tags(addcslashes($_POST['adresse'], "'")));
$bp = trim(strip_tags(addcslashes($_POST['bp'], "'")));
$tel = trim(strip_tags(addcslashes($_POST['tel'], "'")));
$email = trim(strip_tags(addcslashes($_POST['email'], "'")));
$siteweb = trim(strip_tags(addcslashes($_POST['siteweb'], "'")));
$mots = trim(strip_tags(addcslashes($_POST['mots'], "'")));
$chiffre_daffaire = trim(strip_tags(addcslashes($_POST['chiffre_daffaire'], "'")));

$date = date('Y-m-d H:i:s');

if ($photoname=="") {
        
        if(mysqli_query($db,"insert into entreprise(designation, sigle, nif, rccm, capital_social, localisation, bp, telephone, email, site_web, chiffre_affaire, created_at, logo, mots, cachet) 
           values('$designation', '$sigle', '$nif', '$rccm', '$capital_social', '$adresse', '$bp', '$tel', '$email', '$siteweb', '$chiffre_daffaire', '$date', 'batela.png', '$mots', 'cachet.png')"))
		    {echo "success";}
		    else{echo mysqli_error($db);}

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
              $dossier = '../img/logo/'.$_FILES['file']['name'];
              if (move_uploaded_file($phototmp, $dossier))
                {
                  
                  if(mysqli_query($db,"insert into entreprise(designation, sigle, nif, rccm, capital_social, localisation, bp, telephone, email, site_web, logo, chiffre_affaire, created_at, mots, cachet) 
                   values('$designation', '$sigle', '$nif', '$rccm', '$capital_social', '$adresse', '$bp', '$tel', '$email', '$siteweb', '$photoname', '$chiffre_daffaire', '$date', '$mots', 'cachet.png')"))
				    {echo "success";}
				    else{echo mysqli_error($db);}

                 }
               else{
          	    echo "size";
                 }	
             }
           }

         }

 }


 ?>