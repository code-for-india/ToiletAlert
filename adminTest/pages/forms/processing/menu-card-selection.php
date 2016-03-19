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
<title>Adding Menu Card Selection</title>
<?php 
$food_header=$_POST['food_header'];
$select_any=$_POST['select_any'];
$hotel_id=$_POST['hotel_id'];
$menucard_id=$_POST['menucard_id'];
$valid=$_POST['valid'];
?>
</head>

<body>
<?php
if($valid=="yes")
{
	mysql_query("DELETE FROM card_select WHERE menucard_id = '$menucard_id' && foodheader_id = '$food_header'");	
	mysql_query("INSERT INTO card_select VALUES (NULL,'$menucard_id','$food_header','$select_any')");
	?>
	<meta content="0;../menu-card-selection.php?hotel_id=<?php echo $hotel_id ?>&menucard_id=<?php echo $menucard_id ?>" http-equiv="refresh" />
	<?php
}
else
{
	echo "My dear friend, you do not have access to this page directly. Please move back.";
}
?>
</body>
</html>