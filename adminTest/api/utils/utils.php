<?php
require dirname ( __FILE__ ) . '/../models/baseApiResponse.php';

/*
 * function sendResponse($data,$isError){
 * $response = new baseApiResponse();
 * if($isError){
 * //fail
 * $response->setStatusCode(400);
 * $response->setStatusMessage("fail response");
 * $response->setData(" ");
 * }else{
 * $response->setStatusCode(200);
 * $response->setStatusMessage("successful");
 * $response->setData($data);
 * }
 *
 * echo $response->toJson();
 * }
 */
function getResponseObjectInJson($data, $isError) { // used in PHP file
	$response = new baseApiResponse ();
	if ($isError) {
		// fail
		$response->setStatusCode ( 400 );
		$response->setStatusMessage ( "fail response" );
		$response->setData ( " " );
	} else {
		$response->setStatusCode ( 200 );
		$response->setStatusMessage ( "successful" );
		$response->setData ( $data );
	}
	return $response->toJson ();
	// echo $response->toJson();
}
function sendResponse($responseJson) { // Used in API files
	echo $responseJson;
}

/*
 * Be carefull, when you are using this method. This method is return associative array.
 */

function parseResponse($jsonData) { //used in PHP files
	$params =json_decode($jsonData,true);
// 	echo "jsonparams : ".var_dump($params);
	if (isset ($params) && ($params['statusCode']==200)) {
		return $params['data'];
	} else {
		return null;
	}
}

?>