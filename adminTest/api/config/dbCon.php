<?php 
$dbHost="localhost";
$username="root";
$password="";
$databaseName="craftsTest";

$conn= mysqli_connect($dbHost,$username,$password) or die("Sale pahle connection check kar ... C");
mysqli_select_db($conn,$databaseName) or die("Not found Target home (database)");

function getLink(){
	return $GLOBALS['conn'];
}
?>

