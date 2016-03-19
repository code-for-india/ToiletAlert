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
echo $id = $_POST['piclink'];            

$select = mysql_query("SELECT * FROM venue_gallery WHERE pic_link = '$id'");
$image  = mysql_fetch_array($select);
@unlink('../../uploads/'.$image['pic_link']);

mysql_query("DELETE FROM venue_gallery WHERE pic_link LIKE '$id'");
?>
<meta http-equiv="refresh" content="0;../view/view-venues-pics.php">