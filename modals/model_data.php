<?php
class userData{
	private $userObject;
	function setUserData($data)
	{
		$this->userObject=$data;
	}
	function getUserData()
	{
		return $this->userObject;
	}
}
$userObj = new userData();
?>