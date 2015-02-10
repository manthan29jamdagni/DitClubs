<?php
class DBController {
	private $host = "";
	private $user = "";
	private $password = "";
	private $database = "";
	public $conn;
	
	function __construct() {
		$this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->database) or die("Unable to create database");
		
	}
	function __destruct() {
		mysqli_close($this->conn);
	}
	
	
	
	function getUserByOAuthId($id) {
		
		$query = "SELECT * FROM user WHERE email ='{$id}'";
		$result = mysqli_query($this->conn,$query);
		if(!empty($result)) {
			$existing_member = mysqli_fetch_assoc($result);
			return $existing_member;
		}else
			return false;
	}
	
	function insertOAuthUser($userData,$id) {		

		//echo $userData->name;

		$query = "INSERT INTO user(name,email,id) VALUES('{$userData->name}','{$userData->email}',{$id})";
		//$query = "INSERT INTO user(name,email,id) VALUES('".$userData->name."','".$userData->email."','".$id."')"
		$result = mysqli_query($this->conn,$query);
		if(!$result)
			die("Error:".mysqli_error($this->conn));
	}
}
	
	
?>