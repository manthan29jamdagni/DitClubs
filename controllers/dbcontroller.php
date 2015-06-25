<?php 
require_once('modals/model_data.php');
class db_controller{
	private $host ="localhost";
	private $user ="root";
	private $password ="mysql";
	private $database = "clubs";
	public $conn;

	function __construct() {
		$this->conn = new mysqli($this->host,$this->user,$this->password,$this->database) ;
		if ($this->conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	}
	function __destruct() {
		$this->conn->close();
	}
	function get_userinfo($id)
	{
		$query="SELECT * from user WHERE uid=$id";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error "+$conn->error;
			return;
		}
		if($result->num_rows>0)
		$row=$result->fetch_assoc();
		$userObj->setUserData($row);
		return $row;
	}
	function insert_status($uid,$post,$priority)
	{
		$post=mysqli_real_escape_string($this->conn,htmlspecialchars($post));
		$priority=mysqli_real_escape_string($this->conn,htmlspecialchars($priority));
		$query="INSERT INTO posts(uid, post,priority) VALUES($uid,'$post',$priority)";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error "+$conn->error;
			return false;
		}
		else
			return true;
	}
	function recent_post($uid)
	{

		$query="SELECT * from posts where uid=$uid ORDER BY pid DESC LIMIT 1";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error "+$conn->error;
			return;
		}
		if($result->num_rows>0)
		$row=$result->fetch_assoc();
		return $row;
	}
	function fetch_status()
	{
		$query="SELECT * FROM posts ORDER BY pid DESC";
		$result=$this->conn->query($query);
		if(!$result)
			echo "Error "+$conn->error;		
		return $result;
	}
	function insert_comment($pid,$uid,$comm)
	{
		$comm=mysqli_real_escape_string($this->conn,htmlspecialchars($comm));
		$query="INSERT INTO comments(pid,cuser_id,comment) VALUES($pid,$uid,'$comm')";
		$result=$this->conn->query($query);
		if(!$result)
			echo "Error "+$conn->error;

	}
	function fetch_comments($status_id)
	{
		$query="SELECT * from comments where pid=$status_id ORDER BY cid";
		$result=$this->conn->query($query);
		if(!$result)
			echo "Error "+$conn->error;
		return $result;
	}
	function fetch_recent_comment($status_id)
	{
		$query="SELECT * from comments where pid=$status_id ORDER BY cid DESC LIMIT 1";
		$result=$this->conn->query($query);
		if(!$result)
			echo "Error "+$conn->error;
		if($result->num_rows>0)
			$row=$result->fetch_assoc();
		return $row;
	}
	function fetch_name($id)
	{
		$query="SELECT name from user where uid=$id";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error "+$conn->error;
			return;
		}
		if($result->num_rows>0)
			$row=$result->fetch_assoc();
		return $row['name'];
	}
	function getId($email)
	{
		$query="SELECT uid from user where email=$email";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error "+$conn->error;
			return;
		}
		$row=$result->fetch_assoc();
		return $row['uid'];
	}
	function insertUser($userData) {		
		$query = "INSERT INTO user(name,email,pic) VALUES($userData->name,$userData->email,$userData->picture)";
		$result = $this->conn->query($query);
		if(!$result)
			die("Error:".mysqli_error($this->conn));
	}

}
$db=new db_controller();

?>