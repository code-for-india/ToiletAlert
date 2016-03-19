<?php
require dirname(__FILE__).'/../config/dbCon.php';
require dirname(__FILE__).'/../models/loosModel.php';
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
/* 		case "update" :
			updateData($params,null);
			break;
		case "delete" :
			deleteData($params,null);
			break;
 */		case "fetchall" :
			fetchallData($params,null);
			break;
		default :
			echo "Method name is not found in post parameters";
	}
}




function fetchallData($params,$isForPHPPage) {
	$responseJson='';
	$condition="";
	if((isset($params->lati))&&(isset($params->longi))){
		$condition= " where  lati LIKE '".$params->lati."%' and  longi LIKE '".$params->longi."%'";
	}
	
	
	$sql = "select * from loos".$condition;
	
	$result = mysqli_query ( getLink (), $sql );
	if (mysqli_num_rows ( $result ) > 0) {
		// Found data
		$arr = array ();
		while ( $row = mysqli_fetch_assoc ( $result ) ) {

			$loosModel = new loosModel();
			$loosModel->setId( $row ['id'] );
			$loosModel->setName( $row ['name'] );
			$loosModel->setAddress1( $row ['address1'] );
			$loosModel->setAddress2( $row ['address2'] );
			$loosModel->setCity( $row ['city'] );
			$loosModel->setDistric( $row ['distric'] );
			$loosModel->setState( $row ['state'] );
			$loosModel->setPincode( $row ['pincode'] );
			$loosModel->setLati( $row ['lati'] );
			$loosModel->setLongi( $row ['longi'] );
			
			array_push ( $arr, $loosModel->toJson () );
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
	
	if (isset ( $params->name) 
			&& isset ( $params->address1)
			&& isset ( $params->address2)
			&& isset ( $params->city)
			&& isset ( $params->distric)
			&& isset ( $params->state)
			&& isset ( $params->pincode)
			&& isset ( $params->lati)
			&& isset ( $params->longi)
			
			) {
	} else {
		die ( "Parametes not fount" );
	}
	
	$name = $params->name;
	$address1= $params->address1; 
	$address2= $params->address2; 
	$city= $params->city;
	$distric= $params->distric;
	$state= $params->state;
	$pincode= $params->pincode;
	$lati= $params->lati;
	$longi= $params->longi;
	
	$sql = "insert into loos values (NULL,'$name','$address1',
	'$address2','$city','$distric','$state','$pincode','$lati','$longi')";
	
	mysqli_query ( getLink (), $sql );
	if (mysqli_insert_id ( getLink () ) > 0) {
		// success
		$loosModel = new loosModel();
		$loosModel->setName($name);
		$loosModel->setAddress1($address1);
		$loosModel->setAddress2($address2);
		$loosModel->setCity($city);
		$loosModel->setDistric($distric);
		$loosModel->setState($state);
		$loosModel->setPincode($pincode);
		$loosModel->setLati($lati);
		$loosModel->setLongi($longi);
		
		$responseJson=getResponseObjectInJson($loosModel->toJson(), false);
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



?>