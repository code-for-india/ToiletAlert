<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/admin/system/dbCon.php";
   include_once($path);
   
   $product=$_POST['product'];
   $image_id=$_POST['image'];
   $ref=$_POST['ref'];
?>
<?php 
//check logged in or not!
if(!isset($_SESSION['login_user'])){
header('Location:/admin/login.php?pagename='.basename($_SERVER['PHP_SELF'], ".php"));
}
?>
<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
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



if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 1000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $xxx=$trans_id.$_FILES["file"]["name"];
    echo "<br>". "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../../crafts/images/content/products/" . $xxx);
      echo "Stored in: " . "../crafts/images/content/products/" . $xxx;
	  mysql_query("Update products set $image_id='$xxx' where id='$product'");
	  //mysql_query("INSERT INTO venue_gallery VALUES (NULL,'$venue_id','$ref','$xxx','$ip','$datetime_info','$username')");
	  
    }
  }
} else {
  echo "Invalid file";
}
?>
<meta http-equiv="refresh" content="2;update-products.php">