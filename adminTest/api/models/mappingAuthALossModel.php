<?php
/**
 * @author himanshu
 *
 */
class mappingAuthALossModel {
	private $mappingId; // int
	private $authorityId; // int
	private $loosId; 
	
	/* public function setMappingId($mappingId) {
		$this->mappingId = $mappingId;
	}
	 */
	public function setAuthorityId($authorityId) {
		$this->authorityId = intval ($authorityId);
	}
	public function setLoosId($loosId) {
		$this->loosId =  $loosId;
	}
	
	public function toJson() {
		return get_object_vars ( $this );
	}
}
?>