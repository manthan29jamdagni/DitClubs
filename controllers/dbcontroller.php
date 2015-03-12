<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "clubs";
	public $conn;
	
	function __construct() {
		$this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->database) or die("Unable to connect database");
		
	}
	function __destruct() {
		mysqli_close($this->conn);
	}
	
	
	
	function getUserByOAuthId($email) { 
		
		$query = "SELECT * FROM user WHERE email ='{$email}'";
		$result = mysqli_query($this->conn,$query);
		if(!empty($result)) {
			$existing_member = mysqli_fetch_assoc($result);
			return $existing_member;
		}else
			return false;
	}
	
	function insertOAuthUser($userData) {		

		//echo $userData->name;

		$query = "INSERT INTO user(name,email) VALUES('{$userData->name}','{$userData->email}')";
		//$query = "INSERT INTO user(name,email,id) VALUES('".$userData->name."','".$userData->email."','".$id."')"
		$result = mysqli_query($this->conn,$query);
		if(!$result)
			die("Error:".mysqli_error($this->conn));
	}
	function insert_status($uid,$post)
	{
		$query="INSERT INTO posts(uid, post) VALUES($uid,'$post')";
		$result=mysqli_query($this->conn,$query);
		if(!$result)
			die("Error:".mysqli_error($this->conn));
	}
	function fetch_status()
	{
		$query="SELECT * FROM posts ORDER BY pid DESC";
		$result=mysqli_query($this->conn,$query);
		return $result;
	}
	function insert_comment($pid,$uid,$comm)
	{
		$query="INSERT INTO comments(pid,other_id,comment) VALUES($pid,$uid,'$comm')";
		$result=mysqli_query($this->conn,$query);
		if(!$result)
			die("Error:".mysqli_error($this->conn));

	}
	function fetch_comment($pid)
	{
		$query="SELECT * FROM comments where pid=".$pid." ORDER BY pid DESC";
		$result=mysqli_query($this->conn,$query);
		return $result;
	}
}
	
	
?>