<?php
include "system/dbCon.php";

function unconfirmed_users()
{
$result = mysql_query("Select * from sellers where status='Pending'");
	echo mysql_num_rows($result);
}
    
function unconfirmed_products(){
	$result = mysql_query("Select * from products where status='Pending'");
	echo mysql_num_rows($result);
}

function unconfirmed_banking(){
	$result = mysql_query("Select * from seller_banking where status='Pending'");
	echo mysql_num_rows($result);
}


?>