<?php
/**
 * @author himanshu
 *
 */
class loginModel {
	private $id; // int
	private $username; // string
	private $password; // string
	private $type; // string
	public function setUserName($username) {
		$this->username = $username;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function setId($id) {
		$this->id = intval ( $id );
	}
	
	public function setType($type) {
		$this->type = $type;
	}
	
	public function toJson() {
		return get_object_vars ( $this );
	}
}
?>