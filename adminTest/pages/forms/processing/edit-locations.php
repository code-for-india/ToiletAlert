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
<title>Editing location</title>
<?php 
$location=$_POST['locationname'];
$pincode=$_POST['pincode'];
$valid=$_POST['valid'];
$location_id=$_POST['lidd'];

$location=ucwords($location);

?>
</head>

<body>
<?php
if($valid=="yes")
{
	mysql_query("UPDATE location SET name='$location' WHERE id LIKE '$location_id'" );
	mysql_query("UPDATE location SET pincode='$pincode' WHERE id LIKE '$location_id'" );
	?>
	<meta content="0;../../view/locations.php" http-equiv="refresh" />
	<?php
}
else
{
	echo "My dear friend, you do not have access to this page directly. Please move back.";
}
?>
</body>
</html>