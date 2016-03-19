<?php
/**
 * @author himanshu
 *
 */
class authorityModel {
	private $id; // int
	private $name; // string
	private $address; // string
	
	public function setName($name) {
		$this->name = $name;
	}
	public function setAddress($address) {
		$this->address = $address;
	}
	public function setId($id) {
		$this->id = intval ( $id );
	}
	
	public function toJson() {
		return get_object_vars ( $this );
	}
}
?>