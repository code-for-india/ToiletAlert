<?php

ini_set('display_errors', 'Off');
ini_set('display_startup_errors', 'Off');
error_reporting(0);

session_start();


 $dbHost = "localhost";
 $dbUser = "root";
 $dbPass = "";
 $dbDatabase = "craftsTest";			
$conn = mysql_connect("$dbHost","$dbUser","$dbPass") or die ("Error connecting to database.");
				
mysql_select_db("$dbDatabase",$conn) or die("Couldn't select the database.");

// $username = $_SESSION['login_user'];

?>
