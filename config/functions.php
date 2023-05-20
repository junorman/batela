<?php 

function checkIfDataIsEmpty($val){
	$msg = "";
	if ($val == "") {
		$msg = "hidden";
	}else{
		$msg = "";
	}
	return $msg;
}

function encryptData($val){
	$url =urlencode(base64_encode($val));
	return $url;
}

function decryptData($val){
	$url = base64_decode(urldecode($val));
	return $url;
}

function checkRemise($val){
	$msg = "";

	if ($val == 0) {
		$msg = "hidden";
	}if ($val == 1) {
		$msg = "";
	}

	return $msg;
}

function sixBar($val){
	$msg = "";

	if ($val == 0 || $val < 0) {
		$msg = "-";
	}else{
		$msg = $val;
	}

	return $msg;
}
function sixBarColor($val){
	$msg = "";

	if ($val == 0 || $val < 0) {
		$msg = 'style="background: #e7a854;color:#000000;text-align:center;"';
	}else{
		$msg = '';
	}

	return $msg;
}

function checkCivility($val){
	$msg = "";

	if ($val == "M") {
		$msg = "Monsieur";
	}else{
		$msg = "Madame";
	}

	return $msg;
}


function stateUser($val){
	$msg = "";

	if ($val == 0) {
		$msg = '<span style="color: red;font-weight: bold;">Compte bloqué</span>';
	}else{
		$msg = '<span style="color: green;font-weight: bold;">Compte activé</span>';
	}

	return $msg;
}

function stateNotify($val){
    $msg = "";

    if ($val == 0) {
        $msg = 'style="color: #000000;font-weight: bold;"';
    }else{
        $msg = 'style="color: gray;"';
    }

    return $msg;
}

function timeOfDay(){

		$msg = "";
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        $msg = "Bonjour";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        $msg = "Bon après-midi";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        $msg = "Bonsoir";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        $msg = "Bonne nuit";
    }
    
    return $msg;
}

function reduce_text2($a){
	$b = '';
	if (strlen($a) >  10) {
		$b = substr($a, 0, 10).'...';
	}else{
		$b = $a;
	}
	return $b;
}

function reduce_text3($a){
	$b = '';
	if (strlen($a) >  40) {
		$b = substr($a, 0, 40).'...';
	}else{
		$b = $a;
	}
	return $b;
}

function reduce_text_large($a){
	$b = '';
	if (strlen($a) >  15) {
		$b = substr($a, 0, 15).'...';
	}else{
		$b = $a;
	}
	return $b;
}

function check_access($a){

	$response = "";
	if ($a == 1) {
		$response = '<i class="fa fa-check" style="color:green"></i>';
	}else{
		$response = '<i class="fa fa-remove" style="color:red">X</i>';
	}
	return $response;
}

function check_state($a){

	$response = "";
	if ($a == 1) {
		$response = '<i class="fa fa-check" style="color:green;font-weight:bold;"></i> Oui';
	}else{
		$response = '<i class="fa fa-remove" style="color:red;font-weight:bold;">X</i> Non';
	}
	return $response;
}

function deactivate_button($a, $b){
	$action = '';
	if ($a != $b) {
		$action = 'disabled';
	}

	return $action;
}

function deactivate_table($a, $b){
	$action = '';
	if ($a != $b) {
		$action = 'hidden';
	}

	return $action;
}


function checkParamsUser($db, $id){

   $sql = "SELECT * FROM users WHERE user_id = $id ";
   $result = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result);
   return $row;
}

function checkParamsVehiculeChauffeur($db, $id_chauffeur, $id_ve){

   $sql = "SELECT * FROM users as u, vehicules as ve WHERE u.user_id = '".$id_chauffeur."' and ve.id_ve = '".$id_ve."' AND u.user_id=ve.id_chauffeur ";
   $result = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result);
   return $row;
}

function nb($db, $month, $nb_result){

   $sql = "SELECT * FROM signaler_probleme WHERE EXTRACT(MONTH FROM created_at) = '".$month."' $nb_result ";
   $result = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result);

   return $row;
}

function nb_signal($db, $type_signal, $result_si, $request_sp){

   $sql = "SELECT * FROM signaler_probleme WHERE type_signal = '".$type_signal."' $result_si $request_sp ";
   $result_si = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result_si);

   return $row;
}

function nb_probleme($db, $type_probleme, $result_si, $request_sp){

   $sql = "SELECT * FROM signaler_probleme WHERE type_probleme = '".$type_probleme."' $result_si $request_sp ";
   $result_pro = mysqli_query($db,$sql);
   $row = mysqli_num_rows($result_pro);

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


function asLetters($number,$separateur=",") {
    $convert = explode($separateur, $number);
    $num[17] = array('zero', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit',
                     'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize');
                      
    $num[100] = array(20 => 'vingt', 30 => 'trente', 40 => 'quarante', 50 => 'cinquante',
                      60 => 'soixante', 70 => 'soixante-dix', 80 => 'quatre-vingt', 90 => 'quatre-vingt-dix');
                                      
    if (isset($convert[1]) && $convert[1] != '') {
      return asLetters($convert[0]).' et '.asLetters($convert[1]);
    }
    if ($number < 0) return 'moins '.asLetters(-$number);
    if ($number < 17) {
      return $num[17][$number];
    }
    elseif ($number < 20) {
      return 'dix-'.asLetters($number-10);
    }
    elseif ($number < 100) {
      if ($number%10 == 0) {
        return $num[100][$number];
      }
      elseif (substr($number, -1) == 1) {
        if( ((int)($number/10)*10)<70 ){
          return asLetters((int)($number/10)*10).'-et-un';
        }
        elseif ($number == 71) {
          return 'soixante-et-onze';
        }
        elseif ($number == 81) {
          return 'quatre-vingt-un';
        }
        elseif ($number == 91) {
          return 'quatre-vingt-onze';
        }
      }
      elseif ($number < 70) {
        return asLetters($number-$number%10).'-'.asLetters($number%10);
      }
      elseif ($number < 80) {
        return asLetters(60).'-'.asLetters($number%20);
      }
      else {
        return asLetters(80).'-'.asLetters($number%20);
      }
    }
    elseif ($number == 100) {
      return 'cent';
    }
    elseif ($number < 200) {
      return asLetters(100).' '.asLetters($number%100);
    }
    elseif ($number < 1000) {
      return asLetters((int)($number/100)).' '.asLetters(100).($number%100 > 0 ? ' '.asLetters($number%100): '');
    }
    elseif ($number == 1000){
      return 'mille';
    }
    elseif ($number < 2000) {
      return asLetters(1000).' '.asLetters($number%1000).' ';
    }
    elseif ($number < 1000000) {
      return asLetters((int)($number/1000)).' '.asLetters(1000).($number%1000 > 0 ? ' '.asLetters($number%1000): '');
    }
    elseif ($number == 1000000) {
      return 'millions';
    }
    elseif ($number < 2000000) {
      return asLetters(1000000).' '.asLetters($number%1000000);
    }
    elseif ($number < 1000000000) {
      return asLetters((int)($number/1000000)).' '.asLetters(1000000).($number%1000000 > 0 ? ' '.asLetters($number%1000000): '');
    }
  }


    function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'an',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


 ?> 