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
<title>Editing hotels</title>
<?php 
$hotelname=$_POST['hotelname'];
$address=$_POST['address'];
$location_id=$_POST['location'];
$website=$_POST['website'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$hotel_id=$_POST['hotel_id'];
$valid=$_POST['valid'];
?>
</head>

<body>
<?php
if($valid=="yes")
{
	mysql_query("UPDATE hotels SET name='$hotelname' WHERE id LIKE '$hotel_id'" );
	mysql_query("UPDATE hotels SET address='$address' WHERE id LIKE '$hotel_id'" );
	mysql_query("UPDATE hotels SET location_id='$location_id' WHERE id LIKE '$hotel_id'" );
	mysql_query("UPDATE hotels SET website='$website' WHERE id LIKE '$hotel_id'" );
	mysql_query("UPDATE hotels SET phone='$phone' WHERE id LIKE '$hotel_id'" );
	mysql_query("UPDATE hotels SET email='$email' WHERE id LIKE '$hotel_id'" );
	?>
	<meta content="0;../../view/hotels.php" http-equiv="refresh" />
	<?php
}
else
{
	echo "My dear friend, you do not have access to this page directly. Please move back.";
}
?>
</body>
</html>