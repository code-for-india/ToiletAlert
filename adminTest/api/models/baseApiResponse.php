<?php 
class baseApiResponse{
	private $statusCode;
	private $statusMessage;
	private $data;
	// ->  for calling
	// => for associative array set value
	public function setStatusCode($statuscode){
		$this->statusCode=$statuscode;
	}
	
	public function setStatusMessage($statusmessage){
		$this->statusMessage=$statusmessage;
	}
	
	public function setData($data){
		$this->data=$data;
	}
	
	public function toJson(){
		return json_encode(get_object_vars($this));
	}
}
?>