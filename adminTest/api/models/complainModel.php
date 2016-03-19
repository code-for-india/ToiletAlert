<?php
/**
 * @author himanshu
 *
 */
class complainModel {
	private $complainid; // int
	private $loosid;// int
	private $images;
	private $comment;
	private $complaintype;
	private $authorityId;// int
	private $nextcomplainid;// int
	
	
	public function setComplainid($complainid) {
		$this->complainid = intval ( $complainid );
	}
	
	public function setLoosid($loosid) {
		$this->loosid = intval ( $loosid );
	}
	
	public function setAuthorityId($authorityId) {
		$this->authorityId = intval ( $authorityId );
	}
	
	public function setNextcomplainid($nextcomplainid) {
		if(isset($nextcomplainid)){
		$this->nextcomplainid = intval ( $nextcomplainid );
		}else{
			$this->nextcomplainid=0;
		}
	}
	
	public function setImages($images) {
		$this->images = $images;
	}
	
	public function setComment($comment) {
		$this->comment = $comment;
	}
	
	public function setComplaintype($complaintype) {
		$this->complaintype = $complaintype;
	}
	
	public function toJson() {
		return get_object_vars ( $this );
	}
}
?>