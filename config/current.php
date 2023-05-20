<?php 
//CURRENT
$previous_page = (isset($_SESSION['current_page'])) ? $_SESSION['current_page'] : 'accueil';

$i=0;$url='?';foreach ($_GET as $key => $value) {
	$url .= ($i > 0) ? '&' : '' ;
	$url .= $key.'='.$value;
	$i++;
}


$_SESSION['current_page'] = $url;


 ?>