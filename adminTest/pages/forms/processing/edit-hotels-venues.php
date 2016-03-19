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
<title>Editing hotels Venues</title>
<?php 
$venuename=$_POST['venuename'];
$description=$_POST['description'];
$hotel=$_POST['hotel'];
$workhours=$_POST['workhours'];
$phone=$_POST['phone'];
$minpax=$_POST['minpax'];
$maxpax=$_POST['maxpax'];
$split=$_POST['split'];
$facilities=$_POST['facilities'];
$tent=$_POST['tent'];
$tent_decoration=$_POST['tent_decoration'];
$thirdparty=$_POST['thirdparty'];
$profitmargin=$_POST['profitmargin'];
$paymentlink=$_POST['paymentlink'];
$website=$_POST['website'];

$hv_id=$_POST['hv_id'];
$valid=$_POST['valid'];
?>
</head>

<body>
<?php
if($valid=="yes")
{
	mysql_query("UPDATE venues SET name='$venuename' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET description='$description' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET hotel_id='$hotel' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET working_hours='$workhours' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET contact='$phone' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET maxpax='$maxpax' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET minpax='$minpax' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET facilities='$facilities' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET tent='$tent' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET tent_decoration='$tent_decoration' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET thirdparty='$thirdparty' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET profit_margin='$profitmargin' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET paymentlink='$paymentlink' WHERE id LIKE '$hv_id'" );
	mysql_query("UPDATE venues SET website='$website' WHERE id LIKE '$hv_id'" );
	?>
	<meta content="0;../../view/hotels-venues.php" http-equiv="refresh" />
	<?php
}
else
{
	echo "My dear friend, you do not have access to this page directly. Please move back.";
}
?>
</body>
</html>