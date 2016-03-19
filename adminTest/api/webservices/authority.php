<?php
require dirname(__FILE__).'/../config/dbCon.php';
require dirname(__FILE__).'/../models/authorityModel.php';
require dirname(__FILE__).'/../utils/utils.php';

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	if (empty($_GET)) {
		return;
	}
	$operation = $_GET ['operation'];
	if (!isset($operation))
		return ;
	
	$params = json_decode ( file_get_contents ( "php://input" ) );
	switch ($operation) {
		case "insert" :
			inserData ( $params,null);
			break;
		case "update" :
			updateData($params,null);
			break;
		case "delete" :
			deleteData($params,null);
			break;
		case "fetchall" :
			fetchallData($params,null);
			break;
		default :
			echo "Method name is not found in post parameters";
	}
}
/* 
function deleteData($params,$isForPHPPage){
	$responseJson='';
	
	$userId=$params->id;
	$sql = "delete from login where id=".$userId;
	$result = mysqli_query ( getLink (), $sql );
	$deletedRows =mysqli_affected_rows(getLink ());
	if( $deletedRows >0){
		$data = array("deletedRows"=>$deletedRows);
		$responseJson=getResponseObjectInJson($data, false);
	}else {
		$responseJson=getResponseObjectInJson('', true);
	}
	
	if(isset($isForPHPPage)){
		return $responseJson;
	}else{
		sendResponse($responseJson);
	}
}

function updateData($params,$isForPHPPage){
	$responseJson='';
	
	$sql = "update login set 
			username='".$params->username ."',password='".$params->password."',type='".$params->type."' 
			where id=".$params->id;
	$result = mysqli_query ( getLink (), $sql );
	$updatedRows =mysqli_affected_rows(getLink ());
	if( $updatedRows >0){
// 		$data = array("updatedRows"=>$updatedRows,"key"=>"value");
		$data = array("updatedRows"=>$updatedRows);
		$responseJson=getResponseObjectInJson($data, false);
	}else {
		$responseJson=getResponseObjectInJson('', true);
	}
	
	if(isset($isForPHPPage)){
		return $responseJson;
	}else{
		sendResponse($responseJson);
	}
}
 */

function fetchallData($params,$isForPHPPage) {
	$responseJson='';
	
	$sql = "select * from authority";
	$result = mysqli_query ( getLink (), $sql );
	if (mysqli_num_rows ( $result ) > 0) {
		// Found data
		$arr = array ();
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			
			$authoritymodel = new authorityModel();
			$authoritymodel->setId($row ['id']);
			$authoritymodel->setName($row ['name'] );
			$authoritymodel->setAddress($row ['address'] );
			array_push ( $arr, $authoritymodel->toJson () );
		}
		$responseJson=getResponseObjectInJson($arr, false);
	} else {
		// Not found Data
		$responseJson=getResponseObjectInJson('', true);
	}
	
	
	if(isset($isForPHPPage)){
		return $responseJson;
	}else{
		sendResponse($responseJson);
	}
}
/* 
function inserData($params,$isForPHPPage) {
	$responseJson='';
	
	if (isset ( $params->username) && isset ( $params->password)) {
	} else {
		die ( "Parametes not fount" );
	}
	$username = $params->username;
	$password = $params->password;
	$type=$params->type;
	
	$sql = "insert into login values (NULL,'$username','$password','$type')";
	mysqli_query ( getLink (), $sql );
	if (mysqli_insert_id ( getLink () ) > 0) {
		// success
		$loginmodel = new loginModel();
		$loginmodel->setUserName($username);
		$loginmodel->setPassword ( $password);
		$loginmodel->setType($type);
		$responseJson=getResponseObjectInJson($loginmodel->toJson(), false);
// 		$data = array("userDetails"=>$usermodel->toJson());
// 		sendResponse ( $data, false );
	} else {
		// fail
		$responseJson=getResponseObjectInJson('', true);
	}
	if(isset($isForPHPPage)){
		return $responseJson;
	}else{
		sendResponse($responseJson);
	}
}
 */

?>