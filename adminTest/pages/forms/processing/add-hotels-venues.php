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
<title>Adding hotels venues</title>
<?php 
$venuename=ucwords($_POST['venuename']);
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
$valid=$_POST['valid'];
?>
</head>

<body>
<?php
if($valid=="yes")
{
	mysql_query("INSERT INTO venues VALUES (NULL,'$venuename','$description','$hotel','$workhours','$phone','$minpax','$maxpax','$split','$facilities','$tent','$tent_decoration','$thirdparty','$profitmargin','$paymentlink','$website')");
	?>
	<meta content="0;../add-hotels-venues.php" http-equiv="refresh" />
	<?php
}
else
{
	echo "My dear friend, you do not have access to this page directly. Please move back.";
}
?>
</body>
</html>