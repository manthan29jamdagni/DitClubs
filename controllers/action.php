<?php 
if(isset($_POST['post']) && isset($_POST['submit'])) //Inserting Status In DB
{
  $db->insert_status($event['uid'],$_POST['post']);
  
}

if(isset($_POST['comment']) && isset($_POST['commSubmit']) && isset($_GET['pid']))
{
  $db->insert_comment($_GET['pid'],$event['uid'],$_POST['comment']);
  header("location:http://localhost/digicampus/public_html/index.php");
}

?>