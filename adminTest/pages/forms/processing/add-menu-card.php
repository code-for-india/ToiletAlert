<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/admin/system/dbCon.php";
   include_once($path);
?>
<?php 
//check logged in or not!
if(!isset($_SESSION['login_user'])){
header('Location:/admin/login.php?pagename='.basename($_SERVER['PHP_SELF'], ".php"));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding location</title>
<?php 
$hotel=$_POST['hotel'];
$card=$_POST['card'];
$rate=$_POST['rate'];
$valid=$_POST['valid'];	

date_default_timezone_set('Asia/Calcutta');
$date=date('d/m/Y h:i:s A',time());

?>
</head>

<body>
<?php
if($valid=="yes")
{
	mysql_query("INSERT INTO menu_cards VALUES (NULL,'$hotel','$card','$rate','$date')");
	?>
	<meta content="0;../create-menu-card.php" http-equiv="refresh" />
	<?php
}
else
{
	echo "My dear friend, you do not have access to this page directly. Please move back.";
}
?>
</body>
</html>