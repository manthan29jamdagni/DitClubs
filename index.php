<?php
session_start();
require_once 'dbcontroller.php';

//Google API PHP Library includes
require_once '../api/src/Google/Client.php';
require_once '../api/src/Google/Service/Oauth2.php';

// GSC Members Can ask for CLIENT ID, CLIENT SECRET ID, REDIRECT URI 
 $client_id = '<Your Client ID >';
 $client_secret = '';
 $redirect_uri = '';
 $simple_api_key = '';
 
//Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("PHP Google OAuth Login Example");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

//Send Client Request
$objOAuthService = new Google_Service_Oauth2($client);

//Logout
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
  $client->revokeToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL)); //redirect user back to page
}

//Authenticate code from Google OAuth Flow
//Add Access Token to Session
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

//Set Access Token to make Request
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
}

//Get User Data from Google Plus

if ($client->getAccessToken()) {
  $userData = $objOAuthService->userinfo->get();
  }
  if(empty($userData)) {
	
	$authUrl = $client->createAuthUrl();
} 

require_once("viewlogin.php");
?>