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
<?php
$allowedExts = array("csv");
$temp = explode(".", $_FILES["file"]["name"]);

$extension = end($temp);

	$ip=getenv("REMOTE_ADDR");
	date_default_timezone_set('Asia/Calcutta');
	$datetime_info=date('d/m/Y h:i:s A',time());

	function getRandomString($length = 8) {
    $validCharacters = "01234567899876543210";
    $validCharNumber = strlen($validCharacters);
 
    $result = "";
 
    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
 
    return $result;
	}
 
	$trans_info=getRandomString();
	$trans_id=date('dmYhis',time());
	$trans_id .=$trans_info;

$mimes = array('text/csv');
if(in_array($_FILES['file']['type'],$mimes)){
  // do something
  $csv_file = $_FILES['file']['tmp_name'];
  $csvfile = fopen($csv_file, 'r');
$i=0;
 while (!feof($csvfile)) {
$csv_data[] = fgets($csvfile);
$csv_array = explode(",", $csv_data[$i]);
$insert_csv = array();
 $insert_csv['prod_name'] = $csv_array[0];
    $insert_csv['cat_name'] = $csv_array[1];
   $insert_csv['price'] = $csv_array[2];
   $insert_csv['seller_email'] = "admin";
   $insert_csv['product_weight'] = $csv_array[3];
   $insert_csv['status'] = "Pending";
   if($i > 0 && $insert_csv['prod_name'] != "")
   {
$query = "INSERT INTO products(prod_name,cat_name,price,seller_email,product_weight,status)
VALUES('".$insert_csv['prod_name']."','".$insert_csv['cat_name']."','".$insert_csv['price']."','".$insert_csv['seller_email']."','".$insert_csv['product_weight']."',
  '".$insert_csv['status']."')";
$n=mysql_query($query);
}
$i++;
}

fclose($csvfile);
 } else {
   die("Sorry, File type not allowed");
}
?>
<meta http-equiv="refresh" content="2;update-products.php">