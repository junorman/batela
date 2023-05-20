<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Accueil</h1>
<br><br>
<h1><?php echo $previous_page.' | '.$_SESSION['current_page'] ?></h1>
<?php $i=0;$url='?';foreach ($_GET as $key => $value) {
	$url .= ($i > 0) ? '&' : '' ;
	$url .= $key.'='.$value;
	$i++;
}echo $url; ?>
<a href="?page=c1">Page1</a>
<a href="?page=c2">Page2</a>
</body>
</html>