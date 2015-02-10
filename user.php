<?php
session_start();

require_once 'C:/wamp/www/api/src/Google/Client.php';
require_once 'C:/wamp/www/api/src/Google/Service/Oauth2.php';
include "dbcontroller.php";

// Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
 $client_id = '';
 $client_secret = '';
 $simple_api_key = '';
 $redirect_uri = '';
 
//Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("PHP Google OAuth Login Example");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");
$objOAuthService = new Google_Service_Oauth2($client);
if(isset($_POST['id']))
{
$id=htmlspecialchars($_POST['id']);


 //echo $_SESSION['access_token'];
if(isset($_SESSION['access_token']))
{
    $client->setAccessToken($_SESSION['access_token']);
}
if ($client->getAccessToken()) {
  $userData = $objOAuthService->userinfo->get();
  }
  	$test= new dbcontroller();
 	$event = $test->getUserByOAuthId($userData->email);
 	if(!$event)
 	{
 		
 		$test->insertOAuthUser($userData,$id);
 		if(mysqli_affected_rows($test->conn)!=1) 
 		{	
 		echo "Error";
 		}
 		 
 	}
 	$query="SELECT * FROM user WHERE email = ".$userData->email;
 	$result = mysqli_query($test->conn,$query);
 	include './views.php';
 
  }else
  {
  	header('location :./index.php');
  }
  


?>