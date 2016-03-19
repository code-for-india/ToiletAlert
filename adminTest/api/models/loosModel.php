<?php
/**
 * @author himanshu
 *
 */
class loosModel {
	private $id; // int
	private $name; // string
	private $address1; // string
	private $address2; // string
	private $city;
	private $distric;
	private $state;
	private $pincode;
	private $lati;
	private $longi;
	
	public function setId($id) {
		$this->id = intval ( $id );
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function setAddress1($address1){
		$this->address1=$address1;
	}
	
	public function setAddress2($address2){
		$this->address2=$address2;
	}
		
	public function setCity($city){
		$this->city=$city;
	}
	
	public function setDistric($distric){
		$this->distric=$distric;
	}
	
	public function setState($state){
		$this->state=$state;
	}
		
	public function setPincode($pincode){
		$this->pincode=$pincode;
	}
	
	public function setLongi($longi){
		$this->longi=$longi;
	}
	
	public function setLati($lati){
		$this->lati=$lati;
	}
	
		
	public function toJson() {
		return get_object_vars ( $this );
	}
}
?>