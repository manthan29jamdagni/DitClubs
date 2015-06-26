<?php 
session_start();
require_once('controllers/dbcontroller.php');
require_once('controllers/oauth.php');
if(isset($authUrl)){
    require_once('front.php');
}else if(isset($_SESSION['access_token']))
{
    echo $userData;
}
?>
