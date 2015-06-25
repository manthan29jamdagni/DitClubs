<?php
require_once('./controllers/dbcontroller.php');
$user=$userObj->getUserData();
if(isset($_POST['post']) &&isset($_POST['priority']) ){
	if($_POST['priority']== 'public' )
		$x=1;
	else
		$x=0;
	if($db->insert_status($_COOKIE['xyz'],$_POST['post'],$x))
	{
		$temp=true;
	}	
	if($temp)
	{
		$data=$db->recent_post($_COOKIE['xyz']);
		$data['image']=stripslashes($user['pic']);
		$data['nam']=$user['name'];
		echo json_encode($data);
	}
}

if(isset($_POST['comment']) && isset($_POST['post_id']))
{	
	$db->insert_comment($_POST['post_id'],$user['uid'],$_POST['comment']);
	$data=$db->fetch_recent_comment($_POST['post_id']);
	$data['image']=stripslashes($user['pic']);
	$data['nam']=$user['name'];
	echo json_encode($data);
}


?>
