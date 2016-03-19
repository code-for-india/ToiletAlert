<?php
require dirname(__FILE__).'/../config/dbCon.php';
require dirname(__FILE__).'/../models/complainModel.php';
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
			updateDataNextcomplainid($params,null);
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

function deleteData($params,$isForPHPPage){
	$responseJson='';
	
	$complainid=$params->complainid;
	$sql = "delete from complain where complainid=".$complainid;
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

function updateDataNextcomplainid($params,$isForPHPPage){
	$responseJson='';
	
	$sql = "update complain set 
			nextcomplainid='".$params->nextcomplainid ." 
			where complainid=".$params->complainid;
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

function fetchallData($params,$isForPHPPage) {
	$responseJson='';
	
	$sql = "select * from complain";
	$result = mysqli_query ( getLink (), $sql );
	if (mysqli_num_rows ( $result ) > 0) {
		// Found data
		$arr = array ();
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
		
			$complain = new complainModel();
			$complain->setLoosid($row ['loosid']);
			$complain->setImages($row ['images']);
			$complain->setComment($row ['comment']);
			$complain->setComplaintype($row ['complaintype']);
			$complain->setAuthorityId($row ['authorityId']);
			$complain->setNextcomplainid($row ['nextcomplainid']);
			
			array_push ( $arr, $complain->toJson () );
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
function inserData($params,$isForPHPPage) {
	$responseJson='';
	
	if (isset ( $params->loosid) 
			&& isset ( $params->images)
			&& isset ( $params->comment)
			&& isset ( $params->complaintype)
			&& isset ( $params->authorityId)
			&& isset ( $params->nextcomplainid)
			) {
	} else {
		die ( "Parametes not fount" );
	}
	$nextcomplainid = $params->nextcomplainid;
	if(isset($nextcomplainid)){
		
	}else{
		$nextcomplainid=0;
	}
	$sql = "insert into complain values (NULL,$params->loosid,'$params->images',' $params->comment','$params->complaintype',$params->authorityId,$nextcomplainid)";
	mysqli_query ( getLink (), $sql );
	if (mysqli_insert_id ( getLink () ) > 0) {
		// success
		
		$complain = new complainModel();
		$complain->setLoosid($params->loosid);
		$complain->setImages($params->images);
		$complain->setComment($params->comment);
		$complain->setComplaintype($params->complaintype);
		$complain->setAuthorityId($params->authorityId);
		$complain->setNextcomplainid($nextcomplainid);
		
		$responseJson=getResponseObjectInJson($complain->toJson(), false);
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


?>